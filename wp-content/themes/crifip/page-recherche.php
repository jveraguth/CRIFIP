<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the wordpress construct of pages
 * and that other 'pages' on your wordpress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */

get_header(); ?>
<div class="row">
<div class="tencol">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1 class="entry-title"><?php the_title(); ?></h1>
					<div class="entry-content card">
					<?php if ( is_user_logged_in() ) : ?>
				<div id="landNet">
                <h2>Acc&egrave;s &agrave; votre r&eacute;seau</h2>	
				<nav>					
					<ul>
						<li>
							<a href="<?php home_url(); ?>/recherche/activites-reseau/">
								<span class="icon">
									<i aria-hidden="true" class="icon-home"></i>
								</span>
								<span>Home</span>
							</a>
						</li>
						<li>
							<a href="<?php bp_loggedin_user_domain(); ?>profile/">
								<span class="icon"> 
									<i aria-hidden="true" class="icon-services"></i>
								</span>
								<span>Services</span>
							</a>
						</li>
						<li>
							<a href="#">
								<span class="icon">
									<i aria-hidden="true" class="icon-portfolio"></i>
								</span>
								<span>Portfolio</span>
							</a>
						</li>
						<li>
							<a href="#">
								<span class="icon">
									<i aria-hidden="true" class="icon-blog"></i>
								</span>
								<span>Blog</span>
							</a>
						</li>
						<li>
							<a href="#">
								<span class="icon">
									<i aria-hidden="true" class="icon-team"></i>
								</span>
								<span>The team</span>
							</a>
						</li>
						<li>
							<a href="#">
								<span class="icon">
									<i aria-hidden="true" class="icon-contact"></i>
								</span>
								<span>Contact</span>
							</a>
						</li>
					</ul>
				</nav>
                </div>
                <div>
                <h2>Tableau de bord</h2>	
				<?php bp_total_site_member_count() ?>
                </div>

					<?php endif; ?>

					<?php if ( !is_user_logged_in() ) : ?>

					<?php	wp_login_form( $args ); ?>

					<?php endif; ?>
       				<div class="clearfix"></div>				
					</div><!-- .entry-content -->
				</article><!-- #post-## -->
<?php endwhile; ?>
    </div>
<div class="twocol last">
<?php get_sidebar(); ?>
    </div>
<?php get_footer(); ?>
    </div>
