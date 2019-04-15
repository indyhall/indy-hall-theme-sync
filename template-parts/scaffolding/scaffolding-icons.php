<?php
/**
 * The template used for displaying icons in the scaffolding library.
 *
 * @package Indy
 */

?>

<section class="section-scaffolding">

	<h2 class="scaffolding-heading"><?php esc_html_e( 'Icons', 'indy' ); ?></h2>

	<?php
	// SVG Icon.
	indy_display_scaffolding_section( array(
		'title'       => 'SVG',
		'description' => 'Display inline SVGs.',
		'usage'       => '<?php indy_display_svg( array( \'icon\' => \'facebook-square\' ) ); ?>',
		'parameters'  => array(
			'$args' => '(required) Configuration arguments.',
		),
		'arguments'   => array(
			'icon'   => '(required) The SVG icon file name. Default none',
			'title'  => '(optional) The title of the icon. Default: none',
			'desc'   => '(optional) The description of the icon. Default: none',
			'fill'   => '(optional) The fill color of the icon. Default: none',
			'height' => '(optional) The height of the icon. Default: none',
			'width'  => '(optional) The width of the icon. Default: none',
		),
		'output'      => indy_display_svg( array(
			'icon' => 'facebook-square',
		) ),
	) );
	?>
</section>
