<?php
/**
* Template Name: Contact Us
 */

 $has_banner = get_field('has_top_banner');
 $subHeading = get_field('sub_heading');
 $thumb = get_the_post_thumbnail_url();

 get_header(); ?>


 <?php while ( have_posts() ) : the_post(); ?>
 	<?php if ($has_banner): ?>
 		<div id="page-sub-header" style="background-image:url(<?php if ($thumb) : echo $thumb; else :  img_path('pattern.svg') ; endif;?>)">
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
	<div id="content" class="site-content">
		<div class="container">
			<div class="row">

      <div class="content-area col-sm-6">

 			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
 				<?php
 					$enable_vc = get_post_meta(get_the_ID(), '_wpb_vc_js_status', true);
 					if(!$enable_vc ) {
 					?>
					<?php if (!$has_banner): ?>
	 					<header class="entry-header">
	 						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	 					</header><!-- .entry-header -->
					<?php endif; ?>
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
      </div>
      <div class="content-area col-sm-6">
        <?php the_field('right_column'); ?>å
      </div>
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

 <?php
 get_footer();
