<?php
add_theme_support( 'post-thumbnails' ); 
add_image_size( 'homepage-thumb', 250, 180 );
add_image_size( 'myfeature-thumb', 450, 280 );
add_image_size( 'myfeature2-thumb', 280, 450 );
add_image_size( 'myfeature3-thumb', 550, 150, true );
add_image_size( 'mediacat-thumb', 150, 150 );
add_image_size( 'myfeature4-thumb', 150, 300, true );
add_theme_support( 'menus' );

if ( ! function_exists( 'boilerplate_continue_reading_link' ) ) :
	/**
	 * Returns a "Continue Reading" link for excerpts
	 *
	 * @since Twenty Ten 1.0
	 * @return string "Continue Reading" link
	 */
	function boilerplate_continue_reading_link() {
		return ' <div class="clearfix"></div><a class="reading" href="'. get_permalink() . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'boilerplate' ) . '</a>';
	}
endif;


//***Fil d'Arianne

function myget_category_parents($id, $link = false,$separator = '/',$nicename = false,$visited = array()) {

    $chain = '';$parent = &get_category($id);

        if (is_wp_error($parent))return $parent;

        if ($nicename)$name = $parent->name;

        else $name = $parent->cat_name;

        if ($parent->parent && ($parent->parent != $parent->term_id ) && !in_array($parent->parent, $visited)) {

                $visited[] = $parent->parent;$chain .= myget_category_parents( $parent->parent, $link, $separator, $nicename, $visited );}

        if ($link) $chain .= '<span typeof="v:Breadcrumb"><a href="' . get_category_link( $parent->term_id ) . '" title="Voir tous les articles de '.$parent->cat_name.'" rel="v:url" property="v:title">'.$name.'</a></span>' . $separator;

        else $chain .= $name.$separator;

        return $chain;}

function mybread() {

    global $wp_query;$ped=get_query_var('paged');$rendu = '<div xmlns:v="http://rdf.data-vocabulary.org/#">';

    if ( !is_home() ) {$rendu .= '<span id="breadex">Vous &ecirc;tes ici :</span> <span typeof="v:Breadcrumb"><a title="'. get_bloginfo('name') .'" id="breadh" href="'.home_url().'" rel="v:url" property="v:title">'. get_bloginfo('name') .'</a></span>';}

    elseif ( is_home() ) {$rendu .= '<span id="breadex">Vous &ecirc;tes ici :</span> <span typeof="v:Breadcrumb">Accueil de '. get_bloginfo('name') .'</span>';}

    if ( is_category() ) {

        $cat_obj = $wp_query->get_queried_object();$thisCat = $cat_obj->term_id;$thisCat = get_category($thisCat);$parentCat = get_category($thisCat->parent);

        if ($thisCat->parent != 0) $rendu .= " / ".myget_category_parents($parentCat, true, " / ", true);

        if ($thisCat->parent == 0) {$rendu .= " / ";}

        if ( $ped <= 1 ) {$rendu .= single_cat_title("", false);}

        elseif ( $ped > 1 ) {

            $rendu .= '<span typeof="v:Breadcrumb"><a href="' . get_category_link( $thisCat ) . '" title="Voir tous les articles de '.single_cat_title("", false).'" rel="v:url" property="v:title">'.single_cat_title("", false).'</a></span>';}}

    elseif ( is_author()){

        global $author;$user_info = get_userdata($author);$rendu .= " / Articles de l'auteur ".$user_info->display_name."</span>";}

    elseif ( is_tag()){

        $tag=single_tag_title("",FALSE);$rendu .= " / Articles sur le th&egrave;me <span>".$tag."</span>";}

        elseif ( is_date() ) {

                if ( is_day() ) {

                        global $wp_locale;

                        $rendu .= '<span typeof="v:Breadcrumb"><a href="'.get_month_link( get_query_var('year'), get_query_var('monthnum') ).'" rel="v:url" property="v:title">'.$wp_locale->get_month( get_query_var('monthnum') ).' '.get_query_var('year').'</a></span> ';

                        $rendu .= " / Archives pour ".get_the_date();}

        else if ( is_month() ) {

                        $rendu .= " / Archives pour ".single_month_title(' ',false);}

        else if ( is_year() ) {

                        $rendu .= " / Archives pour ".get_query_var('year');}}

    elseif ( is_archive() && !is_category()){

                $posttype = get_post_type();

        $tata = get_post_type_object( $posttype );

        $var = '';

        $the_tax = get_taxonomy( get_query_var( 'taxonomy' ) );

        $titrearchive = $tata->labels->menu_name;

        if (!empty($the_tax)){$var = $the_tax->labels->name.' ';}

                if (empty($the_tax)){$var = $titrearchive;}

        $rendu .= ' / Archives sur "'.$var.'"';}

    elseif ( is_search()) {

        $rendu .= " / R&eacute;sultats de votre recherche <span>/ ".get_search_query()."</span>";}

    elseif ( is_404()){

        $rendu .= " / 404 Page non trouv&eacute;e";}

    elseif ( is_single()){

        $category = get_the_category();

        $category_id = get_cat_ID( $category[0]->cat_name );

        if ($category_id != 0) {

            $rendu .= " / ".myget_category_parents($category_id,TRUE,' / ')."<span>".the_title('','',FALSE)."</span>";}

        elseif ($category_id == 0) {

                $post_type = get_post_type();

            $tata = get_post_type_object( $post_type );

                $titrearchive = $tata->labels->menu_name;

                $urlarchive = get_post_type_archive_link( $post_type );

            $rendu .= ' / <span typeof="v:Breadcrumb"><a class="breadl" href="'.$urlarchive.'" title="'.$titrearchive.'" rel="v:url" property="v:title">'.$titrearchive.'</a></span> / <span>'.the_title('','',FALSE).'</span>';}}

    elseif ( is_page()) {

        $post = $wp_query->get_queried_object();

        if ( $post->post_parent == 0 ){$rendu .= " / ".the_title('','',FALSE)."";}

        elseif ( $post->post_parent != 0 ) {

            $title = the_title('','',FALSE);$ancestors = array_reverse(get_post_ancestors($post->ID));array_push($ancestors, $post->ID);

            foreach ( $ancestors as $ancestor ){

                if( $ancestor != end($ancestors) ){$rendu .= '/ <span typeof="v:Breadcrumb"><a href="'. get_permalink($ancestor) .'" rel="v:url" property="v:title">'. strip_tags( apply_filters( 'single_post_title', get_the_title( $ancestor ) ) ) .'</a></span>';}

else {$rendu .= ' / '.strip_tags(apply_filters('single_post_title',get_the_title($ancestor))).'';}}}}

    if ( $ped >= 1 ) {$rendu .= ' (Page '.$ped.')';}

    $rendu .= '</div>';

    echo $rendu;

}





if ( ! function_exists( 'boilerplate_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post—date/time and author.
	 *
	 * @since Twenty Ten 1.0
	 */
	function boilerplate_posted_on() {
		// BP: slight modification to Twenty Ten function, converting single permalink to multi-archival link
		// Y = 2012
		// F = September
		// m = 01–12
		// j = 1–31
		// d = 01–31
		printf( __( '<span class="%1$s">Publi&eacute; le</span> <span class="entry-date">%3$s %2$s %4$s</span> <span class="meta-sep">par</span> %5$s', 'boilerplate' ),
			// %1$s = container class
			'meta-prep meta-prep-author',
			// %2$s = month: /yyyy/mm/
			sprintf( '<a href="%1$s" title="%2$s" rel="bookmark">%3$s</a>',
				home_url() . '/' . get_the_date( 'Y' ) . '/' . get_the_date( 'm' ) . '/',
				esc_attr( 'View Archives for ' . get_the_date( 'F' ) . ' ' . get_the_date( 'Y' ) ),
				get_the_date( 'F' )
			),
			// %3$s = day: /yyyy/mm/dd/
			sprintf( '<a href="%1$s" title="%2$s" rel="bookmark">%3$s</a>',
				home_url() . '/' . get_the_date( 'Y' ) . '/' . get_the_date( 'm' ) . '/' . get_the_date( 'd' ) . '/',
				esc_attr( 'View Archives for ' . get_the_date( 'F' ) . ' ' . get_the_date( 'j' ) . ' ' . get_the_date( 'Y' ) ),
				get_the_date( 'j' )
			),
			// %4$s = year: /yyyy/
			sprintf( '<a href="%1$s" title="%2$s" rel="bookmark">%3$s</a>',
				home_url() . '/' . get_the_date( 'Y' ) . '/',
				esc_attr( 'View Archives for ' . get_the_date( 'Y' ) ),
				get_the_date( 'Y' )
			),
			// %5$s = author vcard
			sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
				get_author_posts_url( get_the_author_meta( 'ID' ) ),
				sprintf( esc_attr__( 'View all posts by %s', 'boilerplate' ), get_the_author() ),
				get_the_author()
			)
		);
	}
endif;


// Drop this in functions.php or your theme
if( !is_admin()){
	wp_deregister_script('jquery');
	wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"), false, '1.10.2');
	wp_enqueue_script('jquery');
}





?>
