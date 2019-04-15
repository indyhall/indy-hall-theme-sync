<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Indy
 */


get_header();

$image = get_field('hero_image');
$hero_offset = get_field('hero_offset');
$hero_description = get_field('hero_description');

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
	<span class="hero-description"><?php echo $hero_description ?></span>
	<?php } ?>
</section>


<div class="primary content-area">
	<main id="main" class="site-main">
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_format() );


		endwhile; // End of the loop.
		?>

		<section class="instagram-widget">
	  	<div class="inner-wrap">
	  		<h2>What's Happening in our Community</h2>
	  		<hr>
				<div class="instagram-feed">
					<?php echo do_shortcode("[instagram-feed]"); ?>
				</div>
			</div>
	  </section>
	  <?php get_template_part( 'template-parts/content-newsletter' ); ?>
		</main><!-- #main -->
	</div><!-- .primary -->
<?php get_footer(); ?>
