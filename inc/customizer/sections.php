<?php
/**
 * Customizer sections.
 *
 * @package Indy
 */

/**
 * Register the section sections.
 *
 * @param object $wp_customize Instance of WP_Customize_Class.
 */
function indy_customize_sections( $wp_customize ) {

	// Register additional scripts section.
	$wp_customize->add_section(
		'indy_additional_scripts_section',
		array(
			'title'    => esc_html__( 'Additional Scripts', 'indy' ),
			'priority' => 10,
			'panel'    => 'site-options',
		)
	);

	// Register a social links section.
	$wp_customize->add_section(
		'indy_social_links_section',
		array(
			'title'       => esc_html__( 'Social Media', 'indy' ),
			'description' => esc_html__( 'Links here power the display_social_network_links() template tag.', 'indy' ),
			'priority'    => 90,
			'panel'       => 'site-options',
		)
	);

	// Register a header section.
	$wp_customize->add_section(
		'indy_header_section',
		array(
			'title'    => esc_html__( 'Header Customizations', 'indy' ),
			'priority' => 90,
			'panel'    => 'site-options',
		)
	);

	// Register a footer section.
	$wp_customize->add_section(
		'indy_footer_section',
		array(
			'title'    => esc_html__( 'Footer Customizations', 'indy' ),
			'priority' => 90,
			'panel'    => 'site-options',
		)
	);
}
add_action( 'customize_register', 'indy_customize_sections' );
