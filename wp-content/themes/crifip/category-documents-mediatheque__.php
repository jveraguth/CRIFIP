<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */

get_header(); ?>
<div class="row entete">
				<div class="eightcol card">
                	<h1><?php printf( '' . single_cat_title( '', false ) . '' );?></h1>
				<?php
					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo '' . $category_description . ''; ?>
                </div>
</div>
                <div class="clearfix"></div>
				<div class="row">
<div id="mediaFrame" class="twelvecol">		
<div class="fourcol card">	
<h2 id="mediaBooks">Mots-cl&eacute;s</h2>
<p>Texte explicatif sur les dernieres sorties de tous les types de medias</p>
<?php
$custom_query = new WP_Query('posts_per_page=-1&category_name=documents-mediatheque');
if ($custom_query->have_posts()) :
	while ($custom_query->have_posts()) : $custom_query->the_post();
		$posttags = get_the_tags();
		if ($posttags) {
			foreach($posttags as $tag) {
				$all_tags[] = $tag->term_id;
			}
		}
	endwhile;
endif;

$tags_arr = array_unique($all_tags);
$tags_str = implode(",", $tags_arr);

$args = array(
'smallest'  => 1,
'largest'   => 5,
'unit'      => 'em',
'number'    => 0,
'format'    => 'list',
'include'   => $tags_str,
'order'		=> 'RAND'
);
wp_tag_cloud($args);
?>



</div>
<div class="eightcol card last">	
<h2 id="mediaVideo">Nouveaut&eacute;</h2>
<p>Texte explicatif sur les dernieres sorties de tous les types de medias</p>
<span>Derni&egrave;res parutions</span>	
		<div class="clearfix"></div>
		<?php query_posts('showposts=2&cat=8');?>
		<?php while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<div class="entry-content">
		<?php
		if ( has_post_thumbnail() ) {
		the_post_thumbnail( 'mediacat-thumb' );
		}
		?>            
					<span class="entry-title-border"><h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'boilerplate' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3></span>
					</div><!-- .entry-content -->
		<div class="clearfix"></div>
					<footer class="entry-utility">
						<?php
							$tags_list = get_the_tag_list( '', ', ' );
							if ( $tags_list ):
						?>
							<?php printf( __( 'Tags %2$s', 'boilerplate' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
						<?php endif; ?>
						<?php edit_post_link( __( 'Edit', 'boilerplate' ), '| ', '' ); ?>
					</footer><!-- .entry-utility -->
				</article><!-- #post-## -->
				<?php comments_template( '', true ); ?>


		<?php endwhile; // End the loop. Whew. ?>
</div>

</div>
			<?php if ( is_user_logged_in() ) { 
					echo '<ul id=\'navS\' class=\'cbp-vimenu card\'>';
					echo '<li><a href=\''.home_url().'/recherche/activites-reseau/\' title=\'Activit&eacute;s du r&eacute;seau\'><span class=\'icon\'><i aria-hidden=\'true\' class=\'icon-activity\'></i></span><span>Activit&eacute;s du r&eacute;seau</span></a></li>';
					echo '<li><a class=\'icon\' href=\''.bp_loggedin_user_domain().'profile/\' title=\'Mon espace membre\'>Mon espace membre</a></li>';
					echo '<li><a class=\'icon\' href=\''.bp_loggedin_user_domain().'messages/\' title=\'Mes messages\'>Mes messages</a></li>';
					echo '<li><a class=\'icon\' href=\''.bp_loggedin_user_domain().'groups/\' title=\'Mes groupes\'>Mes groupes</a></li>';
					echo '<li><a class=\'icon\' href=\''.home_url().'/recherche/group/\' title=\'Liste des groupes\'>Liste des groupes</a></li>';
					echo '</ul>';
			} 
			else {	
					return;
			} ?> 
<div class="row">		
<?php get_footer(); ?>
</div>
