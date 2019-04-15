<?php
/**
 * Template Name: Pricing Page
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
$image = get_field('hero_image');
$hero_offset = get_field('hero_offset');
$hero_description = get_field('hero_description');
$show_announce_bar = get_field('show_announce_bar');

if ($image){
?>
<section class="hero hero-image" style="background-image:url('<?php echo $image['url']; ?>'); background-position: 0 <?php echo $hero_offset; ?>%">
<?php
}
else {
?>
<section class="hero">
<?php
}
?>
  <h1 class="hero-title"><?php echo get_the_title(); ?></h1>
    <?php if($hero_description) { ?>
		<span class="hero-description">
			<?php echo $hero_description ?>
		</span>
		<a href="/tour" class="tour-button">Schedule a Tour</a>
		<?php } ?>
</section>
<?php if($show_announce_bar){ ?>
<section class="upcoming-event">
	<span class="upcoming-event-content"><?php the_field('upcoming_events', 'option'); ?></span>
</section>
<?php } ?>
<?php get_template_part( 'template-parts/content-pricing', 'page' ); ?>
<div class="primary content-area">
	<main id="main" class="site-main">
		<article>
			<div class="entry-content">
				<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', 'page' );

					endwhile; // End of the loop.

					wp_reset_postdata();
				?>
			</div>
		</article>
	</main><!-- #main -->
</div><!-- .primary -->

<?php get_footer(); ?>