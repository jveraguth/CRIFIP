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
<div class="card twelvecol">
	<div class="twelvecol">
        <h1><?php printf( '' . single_cat_title( '', false ) . '' );?></h1>
		<?php
			$category_description = category_description();
			if ( ! empty( $category_description ) )
			echo '' . $category_description . ''; 
		?>
    </div>
<div class="sixcol card">	
<?php query_posts('showposts=2&cat=76');?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="card">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<span class="entry-title-border"><h2 class="entry-title displayLeft"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'boilerplate' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2></span>
			<div class="entry-meta">
				<?php boilerplate_posted_on(); ?>
			</div><!-- .entry-meta -->
			<div class="entry-content">
				<?php
				if ( has_post_thumbnail() ) {
				the_post_thumbnail( 'myfeature3-thumb' );
				}
				?>            
				<?php if ( post_password_required() ) : ?>
					<?php the_content(); ?>
				<?php else : ?>			
					<?php the_excerpt(); ?>
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
		</div>
	<?php endwhile; // End the loop. Whew. ?>



</div>
<div class="sixcol card last">	
<?php query_posts('showposts=2&cat=72');?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="card">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<span class="entry-title-border"><h2 class="entry-title displayLeft"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'boilerplate' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2></span>
			<div class="entry-meta">
				<?php boilerplate_posted_on(); ?>
			</div><!-- .entry-meta -->
			<div class="entry-content">
				<?php
				if ( has_post_thumbnail() ) {
				the_post_thumbnail( 'myfeature3-thumb' );
				}
				?>            
				<?php if ( post_password_required() ) : ?>
					<?php the_content(); ?>
				<?php else : ?>			
					<?php the_excerpt(); ?>
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
		</div>
	<?php endwhile; // End the loop. Whew. ?>



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
</div>

</div>
</div>

<div class="row">		
<?php get_footer(); ?>
</div>
