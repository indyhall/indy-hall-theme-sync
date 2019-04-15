<?php
/* Template Name: Home */
/*
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Indy
 */

get_header();

$image = get_field('hero_image');
$hero_offset = get_field('hero_offset');

?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">
    <section class="hero hero-image" style="background-image:url('<?php echo $image['url']; ?>'); background-position: 0 <?php echo $hero_offset; ?>%">
      <h1 class="hero-title"><?php the_field('hero_title'); ?></h1>
			<span class="hero-description"><?php the_field('hero_description'); ?></span>
			<a href="/tour" class="tour-button">Schedule a Tour</a>
			<div class="member-login">
				<a href="https://members.indyhall.org/">Member Login</a>
			</div>
  	</section>

	  <section class="upcoming-event">
			<span class="upcoming-event-content"><?php the_field('upcoming_events', 'option'); ?></span>
	  </section>

	  <section class="text-and-image" style="background: url('<?php the_field('image_1'); ?>');">
		  <h2><?php the_field('sub_heading_1'); ?></h2>
		  <hr>
		  <p><?php the_field('text_block_1'); ?></p>
	  </section>

	  <section class="image-and-text" style="background: url('<?php the_field('image_2'); ?>');">
		  <h2><?php the_field('sub_heading_2'); ?></h2>
		  <hr>
		  <p><?php the_field('text_block_2'); ?></p>
	  </section>

	  <section class="instagram-widget">
	  	<div class="inner-wrap">
	  		<h2>What's Happening in our Community</h2>
	  		<hr>
				<div class="instagram-feed">
					<?php echo do_shortcode("[instagram-feed]"); ?>
				</div>
			</div>
	  </section>
	</main><!-- #main -->
</div><!-- #primary -->
<?php get_template_part( 'template-parts/content-newsletter' ); ?>
<?php
get_footer();
