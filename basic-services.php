<?php
/**
* Template Name: Services
 */

 $has_banner = get_field('has_top_banner');
 $subHeading = get_field('sub_heading');
 $thumb = get_the_post_thumbnail_url();
 $args = array (
   'post_type' => 'services',
   'posts_per_page' => -1,
   'order' => 'ASC',

 );
 $queryServ = new WP_Query($args);
 if ( class_exists( 'PC' ) ) { PC::debug($queryServ, "");}

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
 					<?php
 						the_content();

 						wp_link_pages( array(
 							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wp-bootstrap-starter' ),
 							'after'  => '</div>',
 						) );
 					?>
          <?php if ($queryServ->have_posts()):
                  while ($queryServ->have_posts()): $queryServ->the_post();?>
                  <?php $unit = get_field('fee_unit'); ?>
                  <?php $fee = get_field('fee'); ?>
                  <div class="service">
                    <div class="row">
                      <div class="col-sm-10">
                        <h3><?php the_title(); ?></h3>
                        <p><?php the_content(); ?></p>
                      </div>
                      <div class="col-sm-2">
                        <?php if ($fee): ?>
                        <div class="serv-fee"><span class="fee-symbol">$</span><?php the_field('fee'); if ($unit) : echo '<span class="serve-fee-unit">' . '/' . $unit . '</span'; endif;?></div>
                        <div class="serv-fee-desc"><?php the_field('fee_description'); ?></div>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>

            <?php endwhile; endif; wp_reset_postdata(); ?>

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
