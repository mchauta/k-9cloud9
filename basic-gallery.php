<?php
/**
* Template Name: Basic Gallery
 */

 $has_banner = get_field('has_top_banner');
 $subHeading = get_field('sub_heading');
 $thumb = get_the_post_thumbnail_url();

 $phoneFormat = get_option('phone_number');
 $phone = str_replace('-', '', $phoneFormat);

 $args = array (
   'post_type' => 'dogs',
   'posts_per_page' => 1,
   'order' => 'ASC',

 );
 $queryDogs = new WP_Query($args);

 get_header(); ?>


 <?php while ( have_posts() ) : the_post(); ?>
 	<?php if ($has_banner): ?>
 		<div id="page-sub-header" style="background-image:url(<?php if ($thumb) : echo $thumb; else :  img_path('pattern.svg') ; endif;?>)">
 				<div class="container">
          <div class="header-title">
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
          </div>
            <div class="cta-container">
              <?php if (get_field('has_phone')): ?><a href="tel:+1<?php echo $phone; ?>" class="cta-button"><?php echo $phoneFormat; ?></a><?php endif; ?>
              <?php if (get_field('has_book')): ?><a href="<?php echo get_option('book_url'); ?>" class="cta-button">Book Now</a><?php endif; ?>
            </div>
 						<a href="#content" class="page-scroller"><i class="fa fa-fw fa-angle-down"></i></a>
 				</div>
 		</div>
 	<?php endif; ?>
	<div id="content" class="site-content">
		<div class="container">
			<div class="row">
 	<section id="primary" class="content-area col-sm-12">
 		<main id="main" class="site-main" role="main">

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
          <?php if ($queryDogs->have_posts()):
                  while ($queryDogs->have_posts()): $queryDogs->the_post();?>
                  <h2>Dog of the Week</h2>
                    <div class="dow-cont row top-section" style="border-bottom: 1px solid #efefef;">

                      <div class="col-sm-12 col-md-4 dow-left">
                        <div class="dow-img" style="width: 100%;">
                          <?php echo get_the_post_thumbnail(get_the_ID(), 'large'); ?>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-8 dow-right">
                        <h3><?php the_title(); ?></h3>
                        <p><?php the_content(); ?> </p>
                      </div>
                    </div>
                  </hr>
          <?php endwhile; endif; wp_reset_postdata(); ?>
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
