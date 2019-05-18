<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Shoreditch
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-footer-wrapper">

      <!-- Footer menu-->
      <?php if ( has_nav_menu( 'secondary' ) ) : ?>

				<div id="footer-menu" class="footer-menu">
					<nav id="footer-navigation" class="footer-navigation" role="navigation" aria-label="<?php esc_html_e( 'Footer Menu', 'shoreditch' ); ?>">
						<?php
						wp_nav_menu( array(
							'theme_location' => 'secondary',
							'menu_class'     => 'secondary-menu',
              				'depth'          => 1
						 ) );
						?>
					</nav><!-- .main-navigation -->
				</div><!-- .site-menu -->
			<?php endif; ?>

			<?php if ( has_nav_menu( 'social' ) ) : ?>

				<div id="footer-menu" class="footer-menu">
					<nav id="footer-navigation" class="social-menu" role="navigation" aria-label="<?php esc_html_e( 'Footer Menu', 'shoreditch' ); ?>">
						<?php
						wp_nav_menu( array(
							'theme_location' => 'social',
							'menu_class'     => 'secondary-menu',
              				'depth'          => 1
						 ) );
						?>
					</nav><!-- .main-navigation -->
				</div><!-- .site-menu -->
			<?php endif; ?>

			<?php if ( has_nav_menu( 'map' ) ) : ?>

				<div id="footer-menu" class="footer-menu">
					<div class="address-menu">
						<p>336 Saint Asaph Street</p>
						<p>Christchurch</p>
						<p>New Zealand</p>
					</div>
					<nav id="footer-navigation" class="map-menu" role="navigation" aria-label="<?php esc_html_e( 'Footer Menu', 'shoreditch' ); ?>">
						<?php
						wp_nav_menu( array(
							'theme_location' => 'map',
							'menu_class'     => 'secondary-menu',
							'depth'          => 1
						 ) );
						?>
					</nav><!-- .main-navigation -->
				</div><!-- .site-menu -->
			<?php endif; ?>

			

			<div id="footer-menu" class="footer-menu">
				<div class="contact-menu">
					<div class="contact-menu-email">
						<a href="mailto:nextgallery336@gmail.com"><i class="fa fa-envelope-o"></i> Email</a>
					</div>
					<div class="contact-menu-phone">
						<p><i class="fa fa-mobile"></i> +64 27 404 1580</p>
					</div>
				</div>
			</div><!-- .contact info -->
			


			<?php shoreditch_social_menu(); ?>








		</div><!-- .site-footer-wrapper -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
