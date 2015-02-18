<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */

get_header(); ?>
<div class="row">
<div class="ninecol">
				<h1 id="catH1"><?php
					printf( __( '%s', 'boilerplate' ), '' . single_cat_title( '', false ) . '' );
				?></h1>
				<?php
					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo '' . $category_description . '';

				/* Run the loop for the category page to output the posts.
				 * If you want to overload this in a child theme then include a file
				 * called loop-category.php and that will be used instead.
				 */
				?>
                <div class="gutterXL b-red filter">
                <?php add_filtering_bar(); ?>
	<?php while ( have_posts() ) : the_post(); ?>
    	<?php if(is_category('8' )){ echo "<div class=\"ff-items\">"; } else { echo "<div class=\"cat-post gutter\">"; } ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    	<div class="<?php if(is_category('8' )){ echo get_post_meta($post->ID,'attribute',true); } else {} ?>">
			<span class="entry-title-border"><div class="<?php meta_form_class(); ?>"><?php if(is_category('50')){ echo the_meta(); } else {} ?></div><h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'boilerplate' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2></span>

			<div class="entry-meta">
				<?php boilerplate_posted_on(); ?>
			</div><!-- .entry-meta -->
			<div class="entry-content">
<?php
if ( has_post_thumbnail() ) {
the_post_thumbnail( 'thumbnail' );
}
?>            
<?php if ( post_password_required() ) : ?>

				<?php the_content(); ?>
<?php else : ?>			
						<?php if(!is_category('8' )){ the_excerpt(); } else {} ?>
<?php endif; ?>
			</div><!-- .entry-content -->
            <div class="clearfix"></div>

			<footer class="entry-utility">
				<?php if ( count( get_the_category() ) ) : ?>
					<?php printf( __( 'Post&eacute; dans %2$s', 'boilerplate' ), 'entry-utility-prep entry-utility-prep-cat-links', get_the_category_list( ', ' ) ); ?>
					|
				<?php endif; ?>
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
    	</div>

<?php endwhile; ?>
<?php if(is_category('8' )){ echo "<div class=\"clearfix\"></div>"; } else {} ?>
</div>
</div>
<div class="threecol last">
<?php get_sidebar(); ?>
</div>
</div><!--end row-->
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
