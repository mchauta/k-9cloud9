<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

$themeDir = get_stylesheet_directory();
?>
<?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- #content -->
    <?php get_template_part( 'footer-widget' ); ?>
	<footer id="colophon" class="site-footer <?php echo wp_bootstrap_starter_bg_class(); ?>" role="contentinfo">
		<div id="footer-paws"><img src="<?php echo $themeDir; ?>/img/paws.svg"></div>
		<div class="container pt-3 pb-3">
			<div class="row">
            <div class="site-info col-sm-8">
              &copy; <?php echo date('Y'); ?> <?php echo '<a href="'.home_url().'">'.get_bloginfo('name').'</a>'; ?>
						</div><!-- close .site-info -->
						<div class="footer-address col-sm-4">
							K-9 Cloud 9</br>
							333 Plaza Dr.</br>
							Lynchburg, VA 24503</br>
							<a href="tel:+14444444444">444-444-4444</a>
						</div>
					</div>
		</div>
	</footer><!-- #colophon -->
<?php endif; ?>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
