<?php
/**
 * The template used for displaying a recent posts block.
 *
 * This block will either display all recent posts or posts
 * from a specific category. The amount of posts can be
 * limited through the admin.
 *
 * @package Indy
 */

// Set up fields.
$title           = get_sub_field( 'title' );
$post_count      = get_sub_field( 'number_of_posts' );
$categories      = get_sub_field( 'categories' );
$tags            = get_sub_field( 'tags' );
$animation_class = indy_get_animation_class();

// Variable to hold query args.
$args = array();

// Only if there are either categories or tags.
if ( $categories || $tags ) {
	$args = indy_get_recent_posts_query_arguments( $categories, $tags );
}

// Always merge in the number of posts.
$args['posts_per_page'] = is_numeric( $post_count ) ? $post_count : 3;

// Get the recent posts.
$recent_posts = indy_get_recent_posts( $args );

// Display section if we have any posts.
if ( $recent_posts->have_posts() ) :

	// Start a <container> with possible block options.
	indy_display_block_options(
		array(
			'container' => 'section', // Any HTML5 container: section, div, etc...
			'class'     => 'content-block grid-container recent-posts', // Container class.
		)
	);
	?>

	<div class="grid-x">
	<?php if ( $title ) : ?>
	<h2 class="content-block-title"><?php echo esc_html( $title ); ?></h2>
	<?php endif; ?>
	</div>

	<div class="grid-x <?php echo esc_attr( $animation_class ); ?>">

		<?php
		// Loop through recent posts.
		while ( $recent_posts->have_posts() ) :
			$recent_posts->the_post();

			// Display a card.
			indy_display_card( array(
				'title' => get_the_title(),
				'image' => indy_get_post_image_url( 'medium' ),
				'text'  => indy_get_the_excerpt( array(
					'length' => 20,
					'more'   => '...',
				) ),
				'url'   => get_the_permalink(),
				'class' => 'cell',
			) );
		endwhile;
		wp_reset_postdata();
	?>
	</div><!-- .grid-x -->
</section><!-- .recent-posts -->
<?php endif; ?>
