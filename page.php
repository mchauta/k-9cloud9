<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */


$has_banner = get_field('has_top_banner');
$subHeading = get_field('sub_heading');
get_header(); ?>


<?php while ( have_posts() ) : the_post(); ?>
	<?php if (get_field('has_top_banner')): ?>
		<div id="page-sub-header">
				<div class="container">
						<h1>
								<?php
								the_title();
								?>
						</h1>
						<p>
								<?php
								echo $subHeading;
								?>
						</p>
						<a href="#content" class="page-scroller"><i class="fa fa-fw fa-angle-down"></i></a>
				</div>
		</div>
	<?php endif; ?>
	<section id="primary" class="content-area col-sm-12 col-lg-8">
		<main id="main" class="site-main" role="main">

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php
					$enable_vc = get_post_meta(get_the_ID(), '_wpb_vc_js_status', true);
					if(!$enable_vc ) {
					?>
					<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->
					<?php } ?>

				<div class="entry-content">
					<?php
						the_content();

						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wp-bootstrap-starter' ),
							'after'  => '</div>',
						) );
					?>
				</div><!-- .entry-content -->

				<?php if ( get_edit_post_link() && !$enable_vc ) : ?>
					<footer class="entry-footer">
						<?php
							edit_post_link(
								sprintf(
									/* translators: %s: Name of current post */
									esc_html__( 'Edit %s', 'wp-bootstrap-starter' ),
									the_title( '<span class="screen-reader-text">"', '"</span>', false )
								),
								'<span class="edit-link">',
								'</span>'
							);
						?>
					</footer><!-- .entry-footer -->
				<?php endif; ?>
			</article><!-- #post-## -->
		<?php endwhile; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
