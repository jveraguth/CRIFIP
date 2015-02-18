<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */

get_header(); ?>
<style>
	.fourcol a{ display: block; position: relative; width: 95%; margin: 5px auto; padding: 5px; background: rgb(247, 247, 247); text-decoration: none; }
	.fourcol a:hover{ background: rgb(243, 243, 243);}
</style>
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
	//Se realiza la busqueda de post por categoria para sacar los tags
	$args = Array(
	    "category_name"=>"documents-mediatheque"			   
	);
	query_posts($args); 
	if ( have_posts() ) :
	    while ( have_posts() ) : the_post();  
			$posttags = get_the_tags();
			if ($posttags) {
				foreach($posttags as $tag) {
					$all_tags[] = $tag->name;
				}
			}
	    endwhile;
	endif;	
	$tags_arr = array_unique($all_tags);
	//Se muestra en links los tags y se cambia los espacios por "-"" para la busqueda
	foreach ($tags_arr as &$valor) {
	   echo '<a href="?filter='.str_replace(" ","-",$valor).'">'.$valor.'</a>';
	}

?>
</div>
<div class="eightcol card last">	


<h2 id="mediaVideo">Nouveaut&eacute;</h2>
<p>Texte explicatif sur les dernieres sorties de tous les types de medias</p>
<div>
<?php
//Si se detecta la variable filter en la url se agrega la variable a la busqueda para filtrar los resultados y se configura los parametros de busqueda
if(isset($_GET["filter"])){
	$args = Array("cat"=>8,"orderby"=>"ID", "order"=>"DESC","posts_per_page" => 10,"tag"=> $_GET["filter"] ,"paged" =>(get_query_var('paged') ? get_query_var('paged') : 1)	);
}else{
	$args = Array("cat"=>8,"orderby"=>"ID", "order"=>"DESC","posts_per_page" => 10, "paged" =>(get_query_var('paged') ? get_query_var('paged') : 1)	);
}


query_posts($args);
//Se muestran los resultados 
if ( have_posts() ) :
    while ( have_posts() ) : the_post();  
		the_title();
		echo '<br>';
		$tags_list = get_the_tag_list( '', ', ' );
		if ( $tags_list ):
			printf( __( 'Tags %2$s', 'boilerplate' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list );
		endif; 
 		echo '<hr/>';
    endwhile;
else :
    echo wpautop( 'Lo siento, no se han encontrado entradas.' );
endif;

?>

<div class="navigation">
  <div class="alignleft"><?php previous_posts_link('&laquo; Prev') ?></div>
  <div class="alignright"><?php next_posts_link('Next &raquo;') ?></div>
</div>
<br>
</div>



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
