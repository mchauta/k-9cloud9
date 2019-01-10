<?php
/**
* Template Name: Basic Home
 */

 $has_banner = get_field('has_top_banner');
 $subHeading = get_field('sub_heading');
 $blurb1 = get_field('blurb_1');
 $blurb2 = get_field('blurb_2');
 $blurb3 = get_field('blurb_3');
 $args = array(
    'post_type' => 'reviews',
    'orderby'   => 'rand',
    'posts_per_page' => 1,
    );

$the_query = new WP_Query( $args );
if ( class_exists( 'PC' ) ) { PC::debug($the_query, "query");}
 get_header(); ?>

 	<?php if ($has_banner): ?>
 		<div id="page-sub-header" style="background-image:url(<?php echo get_the_post_thumbnail_url();?>)">
 				<div class="container">
          <div class="header-title">
 						<h1>
 								 Dog Heaven
 						</h1>
 						<p>
 								<?php
 								echo $subHeading;
 								?>
 						</p>
          </div>
            <div class="cta-container">
              <a href="" class="cta-button">444-444-4444</a>
              <a href="" class="cta-button">Book Now</a>
            </div>
 						<a href="#content" class="page-scroller"><i class="fa fa-fw fa-angle-down"></i></a>
 				</div>
 		</div>
 	<?php endif; ?>

	<div id="content" class="site-content">
		<div class="container top-section">
      <div class="divider-dog-right"><img src="<?php img_path('tan1.svg'); ?>"></div>
			<div class="row mid-header">
        <h3>Why Choose Us?</h3>
        <div class="col-sm-4 blurb">
          <div class="blurb-img blue"><img src="<?php img_path('house.svg');?>"/></div>
          <h4><?php echo $blurb1['title'] ;?></h4>
          <div class="copy">
            <?php echo $blurb1['copy'] ;?>
          </div>
        </div>
        <div class="col-sm-4 blurb">
          <div class="blurb-img green"><img src="<?php img_path('bone.svg');?>"/></div>
          <h4><?php echo $blurb2['title'] ;?></h4>
          <div class="copy">
            <?php echo $blurb2['copy'] ;?>
          </div>
        </div>
        <div class="col-sm-4 blurb">
          <div class="blurb-img blue"><img src="<?php img_path('award.svg');?>"/></div>
          <h4><?php echo $blurb3['title'] ;?></h4>
          <div class="copy">
            <?php echo $blurb3['copy'] ;?>
          </div>
        </div>
      </div>
    </div>
    <div class="pattern">
      <div class="container mid-section">
        <div class="divider-dog-left"><img src="<?php img_path('brown1.svg'); ?>"></div>
  			<div class="row">
          <?php if ( $the_query->have_posts() ) :
              while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
          <div class="home-review">
            <div class="stars">
              <?php $stars = get_field('stars'); ?>
              <?php for ($i=0; $i < $stars; $i++) {
                  echo '<i class="fas fa-star"></i>';
                }
              ?>

            </div>
            <div class="review">
              <?php the_content(); ?>
            </div>
            <div class="review-name">
              - <?php the_field('name'); ?>
            </div>
          </div>
        <?php endwhile; endif; wp_reset_postdata();?>
        </div>
        </div>
      </div>
    <div class="container mid-section">
			<div class="row">
          <div class="col-sm-6 gallery-cta">
            <a href="/gallery/">
              <h3>Image Gallery <i class="far fa-images"></i></h3> 
              <p><?php the_field('gallery_copy'); ?> </p>
            </a>
          </div>
          <div class="col-sm-6 gallery-img">
            <a href="/gallery/">
              <img src="<?php img_path('dog-photos.png');?>"/>
            </a>

          </div>

      </div>
    </div>

</div>


 <?php
 get_footer();
