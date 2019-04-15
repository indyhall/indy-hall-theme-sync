<?php
/**
 * Template Name: Display All Articles
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Indy
 */


get_header();
?>
<section class="hero">
  <h1 class="hero-title">All Articles</h1>
  <span class="newsletter">
  	<?php echo do_shortcode("[convertkit form=5178127]"); ?>
  </span>
</section>
<?php if($show_announce_bar){ ?>
<section class="upcoming-event">
	<span class="upcoming-event-content"><?php the_field('upcoming_events', 'option'); ?></span>
</section>
<?php } ?>
<div class="primary content-area">
	<main id="main" class="site-main">
		<article>
			<div class="entry-content">
				<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', 'page' );

					endwhile; // End of the loop.

					$wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1)); ?>

					<?php if ( $wpb_all_query->have_posts() ) : ?>
					<ul>
					<!-- the loop -->
					<?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
					<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
					<?php endwhile; ?>
					<!-- end of the loop -->
					</ul>
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>
			</div>
		</article>
	</main><!-- #main -->
</div><!-- .primary -->

<?php get_footer(); ?>