<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Indy
 */

?>

	</div><!-- #content -->

	<footer class="site-footer">
		<div class="footer-widgets">
			<?php dynamic_sidebar( 'footer_1' ); ?>
			<?php dynamic_sidebar( 'footer_2' ); ?>
		</div>

		<div class="site-info">
			<?php indy_display_copyright_text(); ?>
			<?php indy_display_social_network_links(); ?>
			<hr/>
			<p>
				<small>site design by <a href="https://amethyst.design/">Amethyst Design</a>
				<span class="sep"> | </span>
					&copy; <?php echo date("Y"); ?> Indy Hall
					<br/>
					photo credits <a href="http://www.cjdawsonphoto.com/" target="_none">CJDawson Photo</a>, <a href="https://www.samabramsphotography.com/" target="_none">Sam Abrams Photography</a>. instagram photos owned by the respective posters
					<br/>thanks for making us look so good, y'all</small>
			</p>
		</div><!-- .site-info -->
	</footer><!-- .site-footer container-->
</div><!-- #page -->

<?php wp_footer(); ?>

<nav class="off-canvas-container" aria-hidden="true">
	<button type="button" class="off-canvas-close" aria-label="<?php esc_html_e( 'Close Menu', 'indy' ); ?>">
		<span class="close"></span>
	</button>
	<?php
		// Mobile menu args.
		$mobile_args = array(
			'theme_location'  => 'mobile',
			'container'       => 'div',
			'container_class' => 'off-canvas-content',
			'container_id'    => '',
			'menu_id'         => 'mobile-menu',
			'menu_class'      => 'mobile-menu',
		);

		// Display the mobile menu.
		wp_nav_menu( $mobile_args );
	?>
</nav>
<div class="off-canvas-screen"></div>
<script type="text/javascript">
	function getQueryVariable(variable)
	{
	       var query = window.location.search.substring(1);
	       var vars = query.split("&");
	       for (var i=0;i<vars.length;i++) {
	               var pair = vars[i].split("=");
	               if(pair[0] == variable){return pair[1];}
	       }
	       return(false);
	}

	var quantity = getQueryVariable('qty');

	if(document.getElementById('simpay-639-number-5')){
		document.getElementById('simpay-639-number-5').value = quantity;
	}
</script>
</body>
</html>

