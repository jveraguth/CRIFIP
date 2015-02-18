<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */
get_header(); ?>

<div class="row">
	<section id="content" role="main">
	<!--<div class="gutterDouble">--><?php /*?><?php if($_COOKIE['profil'] == "medic"){ echo "Profil: Medic";} else { echo "Profil:General"; } ?><?php */?><!--</div>-->
		<div class="twelvecol">
			<div class="fivecol card">
				<h1 id="homeTitle">Centre de recherches internationales et de formation sur l'inceste et la p&eacute;docriminalit&eacute;</h1>
				<!--<a id="startButton" class="" href="javascript:void(0);">?</a>-->
				<div class="gutter barre">
					<h2>Acc&egrave;s rapides:</h2>
					<nav class="block">
						<ul id="square">
							<li><a class="sq1" href="#">Que faire ?</a></li>
							<li><a class="sq2" href="#">S'informer</a></li>
							<li><a class="sq3" href="#">Premiers soins</a></li>
							<li><a class="sq4" href="#">D&eacute;couvrez nos dessinateurs</a></li>
							<li><a class="sq5" href="#">Num&eacute;ros d'urgence</a></li>
						</ul>
					</nav>
				</div>
				<div class="clearfix"></div>
			<div class="sixcol gutter barre">
				<h2>Statistiques du site:</h2>
					<?php
					function wp_get_cat_postcount($id) {
						$cat = get_category($id);
						$count = (int) $cat->count;
						$taxonomy = 'category';
						$args = array(
						  'child_of' => $id,
						);
						$tax_terms = get_terms($taxonomy,$args);
						return $count;
					}
					?>
					<ul id="counter">
						<li class="b-orange"><span><?php echo wp_get_cat_postcount(3); ?></span> Articles</li>
						<li><span><?php echo wp_get_cat_postcount(4); ?></span> &Eacute;tudes</li>
						<li><span><?php echo wp_get_cat_postcount(5); ?></span> T&eacute;moignages</li>
					</ul>

			</div>
			<div class="sixcol last">
				<div id="navM">
					<?php if ( is_user_logged_in() ) { 
						/*echo '<ul id=\'\' class=\'\'>';
						echo '<li><a href=\''.home_url().'/recherche/activites-reseau/\' title=\'Activit&eacute;s du r&eacute;seau\'><span class=\'icon\'><i aria-hidden=\'true\' class=\'icon-activity\'></i></span><span>Activit&eacute;s du r&eacute;seau</span></a></li>';
						echo '<li><a class=\'icon\' href=\''.bp_loggedin_user_domain().'profile/\' title=\'Mon espace membre\'>Mon espace membre</a></li>';
						echo '<li><a class=\'icon\' href=\''.bp_loggedin_user_domain().'messages/\' title=\'Mes messages\'>Mes messages</a></li>';
						echo '<li><a class=\'icon\' href=\''.bp_loggedin_user_domain().'groups/\' title=\'Mes groupes\'>Mes groupes</a></li>';
						echo '<li><a class=\'icon\' href=\''.home_url().'/recherche/group/\' title=\'Liste des groupes\'>Liste des groupes</a></li>';
						echo '</ul>';*/

					} 
					else {	
							echo "<p>En tant que professionnel, vous pouvez acc&eacute;der &agrave; notre r&eacute;seau de travail.</p>";
							echo "<p><a class=\"cta\" href=\"\" title=\"En apprendre plus sur le r&eacute;seau CRIFIP\">En apprendre plus sur le r&eacute;seau CRIFIP</a></p>";
					} ?> 
				</div>
			</div>
			<div id="homeEvent" class="twelvecol">
				<?php dynamic_sidebar( 'secondary-widget-area' ); ?>
			</div>
			</div>
			<div class="sevencol marge-cover last"><?php /*?><?php echo $wp_query->found_posts ; ?><?php */?>
				<div class="b-orange cover">L'actualité</div>
				<div class="card notopmargin c-orange">
				<?php query_posts('showposts=2&cat=3,4');?>

				<?php while ( have_posts() ) : the_post(); ?>
				<div class="mid-actu-post">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<span class="entry-title-border"><h2 class="entry-title displayLeft"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'boilerplate' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2></span>
					<div class="block-info">
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
					</div>
				</article><!-- #post-## -->
				</div>
				<?php comments_template( '', true ); ?>

		<?php endwhile; // End the loop. Whew. ?>
				<div class="clearfix"></div>
				<div class="encart">
		<?php query_posts('showposts=5&offset=2&cat=3,4');?>

		<?php while ( have_posts() ) : the_post(); ?>
				<div class="small-post">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<span class="entry-title-border"><h2 class="entry-title bouh"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'boilerplate' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2></span>

					<div class="entry-meta">
						<?php boilerplate_posted_on(); ?>
					</div><!-- .entry-meta -->
					<div class="entry-content">
		<?php if ( post_password_required() ) : ?>
						<?php the_content(); ?>
		<?php else : ?>			
		<?php endif; ?>
					</div><!-- .entry-content -->

				</article><!-- #post-## -->
				</div><!-- end small-post-->
				<?php comments_template( '', true ); ?>
		<?php endwhile; // End the loop. Whew. ?>
			</div><!-- end encart-->
				<?php query_posts('showposts=1&offset=3&cat=3,4');?>
				<div class="mid-post gutter">
		<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<span class="entry-title-border"><h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'boilerplate' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2></span>

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
				<?php comments_template( '', true ); ?>

		<?php endwhile; // End the loop. Whew. ?>

		</div>
		
		<div class="clearfix"></div>

		<a class="allEntries" href="">Voir toute l'actualit&eacute;</a>
		</div>

        </div>
		<div class="clearfix"></div>
        <!-- START COL LEFT -->
        <!-- STATS -->
		<div class="sevencol">
				<div class="b-blue cover">Quelques chiffres sur l'inceste et la pédocriminalité</div>
		<div id="charty" class="card notopmargin">
		<article class="chart gutter">
			<div class="canvasWrapper1 numStats sevencol">
				<img src="images/statistique-victimes-inceste.png" width="390" height="197" alt=""/>				
			</div>
			<div class="canvasWrapper1 fivecol last">
				<h2>Taux d'agressions</h2>
				<p>1 fille/8 et 1 garçon/10 ont subi des agressions sexuelles avant 18 ans, âge moyen de survenue 9-12 ans, 70% à 80% par des proches</p>
			</div>
		</article>
		<hr>
		<article id="barChart" class="chart gutter">
			<div class="canvasWrapper3 fourcol">
				<h2>Syndrôme post-traumatique</h2>
				<p>Parmi une population américaine d’hommes adultes faisant une demande de soins et ayant révélé un historique d’abus sexuel durant l’enfance ou l’adolescence, 55 % ont présenté un PTSD à un moment de leur vie. Ils souffrent par ailleurs de dépression (60 %), de troubles psychosomatiques (60 %), de dépendance à l’alcool (60 %) et de phobies sociales (45 %).</p>
			</div>
			<div class="eightcol last">
		<div id="donutchart" style="width: 100%; height: 300px;"></div>
			</div>
		</article>
		<hr>
		<article id="pieChart" class="chart gutter">
			<div class="canvasWrapper1 sixcol">
				<h2>Fibryomalgie</h2>
				<p><strong>90 % des femmes atteintes de fibromyalgie</strong> auraient subi des agressions sexuelles pendant leur enfance, leur adolescence ou au début de leur vie adulte.</p>
			</div>
			<div class="sixcol last">
				<h2>Inceste, p&eacute;docriminalit&eacute; et prostitution.</h2>
				<p><strong>Entre 76 % et 90 % des femmes et des hommes prostitués</strong> ont des antécédents d'agressions sexuelles pendant leur enfance. La plupart du temps, il s'agit d'inceste.</p>
			</div>
		</article>
		<div class="clearfix"></div>
		</div>

		</div>
        <!-- ARTICLES ETUDES -->
		<div class="fivecol last">
			<div class="b-orange cover">Articles</div>
			<div class="card notopmargin c-orange">

		<?php query_posts('showposts=4&cat=3,4');?>

		<?php while ( have_posts() ) : the_post(); ?>
				<div class="small-post3">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<span class="entry-title-border"><h2 class="entry-title bouh"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'boilerplate' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2></span>

					<div class="entry-meta">
						<?php boilerplate_posted_on(); ?>
					</div><!-- .entry-meta -->
					<div class="entry-content">
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
				</div><!-- end small-post-->
				<?php comments_template( '', true ); ?>
		<?php endwhile; // End the loop. Whew. ?>
		
		<div class="clearfix"></div>

		<a class="allEntries" href="">Voir tous les articles</a>
		</div>
		</div>
		<div class="clearfix"></div>
		<div class="sixcol">
        <!-- ARTICLES ETUDES -->
			<div class="b-orange cover">&Eacute;tudes</div>
			<div class="card notopmargin c-orange">

		<?php query_posts('showposts=1&cat=3,4');?>

		<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<span class="entry-title-border"><h2 class="entry-title displayLeft"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'boilerplate' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2></span>
					<div class="block-info">
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
					</div>
				</article><!-- #post-## -->
				<?php comments_template( '', true ); ?>

		<?php endwhile; // End the loop. Whew. ?>
		<!--<div class="sameSubject">Dans le m&ecirc;me sujet</div>-->       
		<?php query_posts('showposts=4&offset=1&cat=3,4');?>

		<?php while ( have_posts() ) : the_post(); ?>
				<div class="small-post2">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<span class="entry-title-border"><h2 class="entry-title bouh"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'boilerplate' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2></span>

					<div class="entry-meta">
						<?php boilerplate_posted_on(); ?>
					</div><!-- .entry-meta -->
					<div class="entry-content">
		<?php if ( post_password_required() ) : ?>
						<?php the_content(); ?>
		<?php else : ?>			
		<?php endif; ?>
					</div><!-- .entry-content -->

				</article><!-- #post-## -->
				</div><!-- end small-post-->
				<?php comments_template( '', true ); ?>
		<?php endwhile; // End the loop. Whew. ?>

		</div>
		
		<div class="clearfix"></div>

		<a class="allEntries" href="">Voir tous les articles & &eacute;tudes</a>
		</div>
        <!-- END COL LEFT -->
		<div class="sixcol last">
		        <!-- TEMOIGNAGES -->
			<div class="b-blue cover">T&eacute;moignages</div>

				<div class="card notopmargin half-small-post c-blue">

		<?php query_posts('showposts=1&cat=5');?>

		<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<span class="entry-title-border"><h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'boilerplate' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2></span>

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
				<?php comments_template( '', true ); ?>

		<?php endwhile; ?>
		<?php query_posts('showposts=4&offset=1&cat=5');?>

		<?php while ( have_posts() ) : the_post(); ?>
				<div class="small-post2">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<span class="entry-title-border"><h2 class="entry-title bouh"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'boilerplate' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2></span>

					<div class="entry-meta">
						<?php boilerplate_posted_on(); ?>
					</div><!-- .entry-meta -->
					<div class="entry-content">
		<?php if ( post_password_required() ) : ?>
						<?php the_content(); ?>
		<?php else : ?>			
		<?php endif; ?>
					</div><!-- .entry-content -->

				</article><!-- #post-## -->
				</div><!-- end small-post-->
				<?php comments_template( '', true ); ?>
		<?php endwhile; // End the loop. Whew. ?>

		<div class="clearfix"></div>
		<a class="allEntries" href="">Lire tous les t&eacute;moignages</a>
		</div>

		</div>
        <!-- START COL RIGHT -->
		<div class="twelvecol"><!--Start info block-->
                 <!-- MEDIA -->
        <div class="b-red cover">Derniers M&eacute;dias ajout&eacute;s</div>
		<div id="mediaHomePost" class="card notopmargin c-red">
   		<?php query_posts('showposts=4&cat=8');?>
		<?php while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="block-info">
		<div class="entry-content">
		<?php
		if ( has_post_thumbnail() ) {
		the_post_thumbnail( 'homepage-thumb' );
		}
		?>   
		</div><!-- .entry-content -->
		<span class="entry-title-border"><h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'boilerplate' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2></span>
		</div>

		</article><!-- #post-## -->
		<?php endwhile; // End the loop. Whew. ?>
        <div class="clearfix"></div>
		</div>
		</div>


</section><!-- #main --> 
</div>
</div><!--end row-->
</div>
<div id="superFooter">
<div class="container">
<div class="row"><!--ligne-->
<?php get_footer(); ?>
