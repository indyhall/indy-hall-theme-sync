<?php
/**
 * Customizer panels.
 *
 * @package Indy
 */

/**
 * Add a custom panels to attach sections too.
 *
 * @param object $wp_customize Instance of WP_Customize_Class.
 */
function indy_customize_panels( $wp_customize ) {

	// Register a new panel.
	$wp_customize->add_panel(
		'site-options', array(
			'priority'       => 10,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => esc_html__( 'Site Options', 'indy' ),
			'description'    => esc_html__( 'Other theme options.', 'indy' ),
		)
	);
}
add_action( 'customize_register', 'indy_customize_panels' );
