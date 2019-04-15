<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Indy
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<!-- RightMessage -->
	<script type="text/javascript">
	(function(p, a, n, d, o, b) {
	    o = n.createElement('script'); o.type = 'text/javascript'; o.async = true; o.src = 'https://tag.rightmessage.com/'+p+'.js';
	    b = n.getElementsByTagName('script')[0]; b.parentNode.insertBefore(o, b);
	    d = function(h, u, i) { var o = n.createElement('style'); o.id = 'rmcloak'+i; o.type = 'text/css';
	        o.appendChild(n.createTextNode('.rmcloak'+h+'{visibility:hidden}.rmcloak'+u+'{display:none}'));
	        b.parentNode.insertBefore(o, b); return o; }; o = d('', '-hidden', ''); d('-stay-invisible', '-stay-hidden', '-stay');
	    setTimeout(function() { o.parentNode && o.parentNode.removeChild(o); }, a);
	})('1440655857', 2500, document);
	</script>
	<script async id="_ck_407191" src="https://forms.convertkit.com/407191?v=7"></script>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link href="https://fonts.googleapis.com/css?family=Bungee+Inline|Bungee+Outline|Fredericka+the+Great|Press+Start+2P" rel="stylesheet">
	<meta name="google-site-verification" content="6m_5qat17m1TlRCBEdqDnUdd-aj2pE6P5XlgPYmYOxc" />

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'indy' ); ?></a>

	<header class="site-header">

		<div class="site-branding">

			<?php the_custom_logo(); ?>

			<?php if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php endif; ?>

			<?php
			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) :
			?>
				<p class="site-description"><?php echo esc_html( $description ); ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<!-- <?php //indy_display_header_button(); ?> -->

		<button type="button" class="off-canvas-open" aria-expanded="false" aria-label="<?php esc_html_e( 'Open Menu', 'indy' ); ?>">
			<span class="hamburger"></span>
		</button>

		<nav id="site-navigation" class="main-navigation">
			<?php
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'menu_id'        => 'primary-menu',
					'menu_class'     => 'menu dropdown',
				) );
			?>
		</nav><!-- #site-navigation -->

	</header><!-- .site-header-->

	<div id="content" class="site-content">
