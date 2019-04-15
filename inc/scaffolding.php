<?php
/**
 * Custom scaffolding Library functions.
 *
 * File for custom scaffolding Library functionality.
 *
 * @package Indy
 */

/**
 * Build a scaffolding section.
 *
 * @param array $args The scaffolding defaults.
 * @author Greg Rickaby Carrie Forde
 */
function indy_display_scaffolding_section( $args = array() ) {

	// Set defaults.
	$defaults = array(
		'title'       => '',       // The scaffolding title.
		'description' => '',       // The scaffolding description.
		'usage'       => '',       // The template tag or markup needed to display the scaffolding.
		'parameters'  => array(),  // Does the scaffolding have params? Like $args?
		'arguments'   => array(),  // If the scaffolding has params, what are the $args?
		'output'      => '',       // Use the template tag or scaffolding HTML markup here. It will be sanitized displayed.
	);

	// Parse arguments.
	$args = wp_parse_args( $args, $defaults );

	// Grab our allowed tags.
	$allowed_tags = indy_scaffolding_allowed_html();

	// Add a unique class to the wrapper.
	$class = 'scaffolding-' . str_replace( ' ', '-', strtolower( $args['title'] ) ); ?>

	<div class="scaffolding-document <?php echo esc_attr( $class ); ?>">

		<?php if ( $args['title'] ) : ?>
		<header class="scaffolding-document-header">
			<h2 class="scaffolding-document-title"><?php echo esc_html( $args['title'] ); ?></h2>
			<button type="button" class="scaffolding-button"><?php esc_html_e( 'Details', 'indy' ); ?></button>
		</header><!-- .scaffolding-document-header -->
		<?php endif; ?>

		<div class="scaffolding-document-content">

			<div class="scaffolding-document-details">

			<?php if ( $args['description'] ) : ?>
				<p><strong><?php esc_html_e( 'Description', 'indy' ); ?>:</strong></p>
				<p class="scaffolding-document-description"><?php echo esc_html( $args['description'] ); ?></p>
			<?php endif; ?>

			<?php if ( $args['parameters'] ) : ?>
				<p><strong><?php esc_html_e( 'Parameters', 'indy' ); ?>:</strong></p>
				<?php foreach ( $args['parameters'] as $key => $value ) : ?>
					<p><code><?php echo esc_html( $key ); ?></code> <?php echo esc_html( $value ); ?></p>
				<?php endforeach; ?>
			<?php endif; ?>

			<?php if ( $args['arguments'] ) : ?>
				<p><strong><?php esc_html_e( 'Arguments', 'indy' ); ?>:</strong></p>
				<?php foreach ( $args['arguments'] as $key => $value ) : ?>
					<p><code><?php echo esc_html( $key ); ?></code> <?php echo esc_html( $value ); ?></p>
				<?php endforeach; ?>
			<?php endif; ?>

			</div><!-- .scaffolding-document-details -->

			<div class="scaffolding-document-usage">

			<?php if ( $args['usage'] ) : ?>
				<p><strong><?php esc_html_e( 'Usage', 'indy' ); ?>:</strong></p>
				<pre><?php echo esc_html( $args['usage'] ); ?></pre>
			<?php endif; ?>

			<?php if ( $args['output'] ) : ?>
				<p><strong><?php esc_html_e( 'HTML Output', 'indy' ); ?>:</strong></p>
				<pre><?php echo esc_html( $args['output'] ); ?></pre>
			<?php endif; ?>

			</div><!-- .scaffolding-document-usage -->
		</div><!-- .scaffolding-document-content -->

		<div class="scaffolding-document-live">

		<?php if ( $args['output'] ) : ?>
			<?php echo wp_kses( $args['output'], $allowed_tags ); ?>
		<?php endif; ?>

		</div><!-- .scaffolding-document-live -->
	</div><!-- .scaffolding-document -->

	<?php
}

/**
 * Declare HTML tags allowed for scaffolding.
 *
 * @return array The allowed tags and attributes.
 * @author Carrie Forde
 */
function indy_scaffolding_allowed_html() {

	// Add additional HTML tags to the wp_kses() allowed html filter.
	$allowed_tags = array_merge( wp_kses_allowed_html( 'post' ), array(
		'svg'   => array(
			'aria-hidden' => true,
			'class'       => true,
			'id'          => true,
			'role'        => true,
			'title'       => true,
		),
		'use'   => array(
			'xlink:href' => true,
		),
		'input' => array(
			'type'        => true,
			'name'        => true,
			'value'       => true,
			'placeholder' => true,
			'class'       => true,
		),
	) );
	return $allowed_tags;
}

/**
 * Build a global scaffolding element.
 *
 * @param array $args The array of colors or fonts.
 * @author Carrie Forde
 */
function indy_display_global_scaffolding_section( $args = array() ) {

	// Set defaults.
	$defaults = array(
		'global_type' => '',      // Can be 'colors' or 'fonts'.
		'title'       => '',      // Give the section a title.
		'arguments'   => array(), // Use key => value pairs to pass colors or fonts.
	);

	// Parse args.
	$args = wp_parse_args( $args, $defaults );

	// Add a unique class to the wrapper.
	$class = 'scaffolding-' . str_replace( ' ', '-', strtolower( $args['title'] ) );
	?>

	<div class="scaffolding-document <?php echo esc_attr( $class ); ?>">
		<header class="scaffolding-document-header">
			<h2 class="scaffolding-document-title"><?php echo esc_html( $args['title'] ); ?></h2>
		</header>

		<div class="scaffolding-document-content">

			<?php
			// We'll alter the output slightly depending upon the global type.
			switch ( $args['global_type'] ) :

				case 'colors':
				?>

					<div class="swatch-container">

					<?php
					// Grab the array of colors.
					$colors = $args['arguments'];

					foreach ( $colors as $name => $hex ) :
						$color_var = '$color-' . str_replace( ' ', '-', strtolower( $name ) );
					?>

						<div class="swatch" style="background-color: <?php echo esc_attr( $hex ); ?>;">
							<header><?php echo esc_html( $name ); ?></header>
							<footer><?php echo esc_html( $color_var ); ?></footer>
						</div><!-- .swatch -->

					<?php endforeach; ?>
					</div>
				<?php
					break;
				case 'fonts':
				?>

					<div class="font-container">

					<?php
					// Grab the array of fonts.
					$fonts = $args['arguments'];

					foreach ( $fonts as $name => $family ) :
						$font_var = '$font-' . str_replace( ' ', '-', strtolower( $name ) );
					?>

						<p><strong><?php echo esc_html( $font_var ); ?>:</strong> <span style="font-family: <?php echo esc_attr( $family ); ?>"><?php echo esc_html( $family ); ?></span></p>
					<?php endforeach; ?>
					</div>
				<?php break; ?>
			<?php endswitch; ?>
		</div>
	</div>
	<?php
}

/**
 * Hook the theme's scaffolding template parts into the scaffolding template.
 *
 * @author Carrie Forde
 */
function indy_hook_theme_scaffolding() {

	$template_dir = 'template-parts/scaffolding/scaffolding';

	get_template_part( $template_dir, 'globals' );
	get_template_part( $template_dir, 'typography' );
	get_template_part( $template_dir, 'icons' );
	get_template_part( $template_dir, 'buttons' );
	get_template_part( $template_dir, 'forms' );
}
add_action( 'indy_scaffolding_content', 'indy_hook_theme_scaffolding' );
