<?php
/*
  Plugin Name: WP Summary
  Plugin URI: http://enpause.fr/plugins-wordpress/wp-summary
  Description: Adds a summary at the beginning of every post. Uses H2 and H3 tags to find sections.
  Version: 1.5
  Author: Didier Sampaolo
  Author URI: http://www.didcode.com/
  Text Domain: wp-summary
 */

$sum = new Wp_Summary();

class Wp_Summary {

    function Wp_Summary() {
        add_shortcode('summary', array(&$this, 'shortcode_wp_summary'));
        add_filter('the_content', array(&$this, 'wp_summary_content'), 9999);
        add_action('admin_menu', array(&$this, 'action_AdminMenu'));
        register_activation_hook(__FILE__, array(&$this, 'do_Activate'));

        if (get_option('summary_showlink') == 'true') {
            add_action('wp_footer', array(&$this, 'showFooterLink'));
        }
    }

    public function do_Activate() {
        add_option('summary_showlink', 'false');
        add_option('summary_head', __('Sommaire de cet article :', 'wp-summary'));
        add_option('summary_listtype', '1');
    }

    public function showFooterLink() {
        echo '<p><a href="http://wordpress.org/extend/plugins/wp-summary/">Plugin WP Summary</a> by <a href="http://www.didcode.com/">DSampaolo</a></p>';
    }

    /**
     * Register l'action qui ajoute la page d'amin
     */
    public function action_AdminMenu() {
        add_options_page("Wp Summary Settings", "Summary", 'manage_options', "Summary", array(&$this, "do_AdminMenu"));
    }

    /**
     * Appel du code de la page d'admin
     */
    public function do_AdminMenu() {
        include("wp_summary_admin.php");
    }

    function shortcode_wp_summary($param) {
        global $post;
        $content = get_the_content();
        $summary = wp_summarize($content);
        return $summary;
    }

    function wp_summary_content($content) {
        if (!is_single()) {
            return $content;
        }
        $summary_elts = $this->wp_summarize($content);
        $summary = $summary_elts['summary'];
        $content = $summary_elts['content'];

        if (strpos($content, '[summary]') !== false) {
            return str_replace('[summary]', $summary, $content);
        } else {
            return $summary . $content;
        }
    }

    private function wp_summarize($content) {
        $align = get_option('summary_align');
        $depth = 2;
        
        $style = '';
        if ($align == 'left') {
            $style = ' style="float:left;"';
        } elseif($align == 'right') {
            $style = ' style="float:right;"';
        }
        
        $summary = "<div$style class=\"sumarry\">";
        $pattern = '/\<h([1-3]).*?\>(.*?)\<\/h[1-3]\>/i';
        preg_match_all($pattern, $content, $matches);

       if (isset($matches[0]) && is_array($matches[0]) && !empty($matches[0])) {
            $summary .= get_option('summary_head');
            $listtype = get_option('summary_listtype');

            if ($listtype == '1') {
                $openTag = '<ul class="summary_ul_'.$depth.'">' . "\n";
                $closeTag = '</ul>' . "\n";
            } else {
                $openTag = '<ol class="summary_ol_'.$depth.'">' . "\n";
                $closeTag = '</ol>' . "\n";
            }

            $sum = $matches[1];
            $max = count($matches[1]);
            $prevDepth = $matches[1][0];
            $summary .= $openTag;

            for ($i = 0; $i < $max; $i++) {
                $depth = $matches[1][$i];
                
                if ($listtype == '1') {
                    $openTag = '<ul class="summary_ul_'.$depth.'">' . "\n";
                    $closeTag = '</ul>' . "\n";
                } else {
                    $openTag = '<ol class="summary_ol_'.$depth.'">' . "\n";
                    $closeTag = '</ol>' . "\n";
                }

                if ($prevDepth - $depth == 1) { // si on monte d'un cran (h3->h2), on monte d'un </ul>
                    $summary .= $closeTag;
                } elseif ($prevDepth - $depth == -1) { // si on descend d'un cran (h2->h3), on descend d'un <ul>
                    $summary .= $openTag;
                }

                $text = strip_tags($matches[2][$i]);
                // on créé un slug pour l'ancre
                $name = sanitize_title_with_dashes($text);

                // on ajoute le lien dans le sommaire
                $class = "summary_li_$depth";
                $summary .= '<li class="'.$class.'"><a href="#' . $name . '">' . $text . '</a></li>' . "\n";

                // on ajoute l'ancre nommée dans le <hX>	
                $hLink = '<h' . $depth . '><a name="' . $name . '">' . $text . '</a></h' . $depth . '>';
                $content = str_replace($matches[0][$i], $hLink, $content);

                $prevDepth = $depth;
            }
            // on referme chaque niveau ouvert
            for ($i = 0; $i < $depth; $i++) {
                $summary .= $closeTag;
            }
        }
        $summary .= '</div>';
        return array('summary' => $summary, 'content' => $content);
    }
}