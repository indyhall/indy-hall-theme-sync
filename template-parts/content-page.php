<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Indy
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<!-- <header class="entry-header">
		<?php //the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header>.entry-header -->

	<div class="entry-content">
		<?php

			if(empty(get_the_content())) {
				echo '<img class="aligncenter" style="width:25%;margin:0 auto;" src="https://www.codeschool.com/assets/custom/geocities/underconstruction-72327f17c652569bab9a33536622841bf905d145ee673a3e9d065fae9cabfe4f.gif" alt="Under Construction" />';
			}
			else {
				the_content();
			}


			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'indy' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<div class="post-item-divider post-bottom"></div>
	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'indy' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->
