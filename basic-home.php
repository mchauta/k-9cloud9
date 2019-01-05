<?php
/**
* Template Name: Basic Home
 */

 $has_banner = get_field('has_top_banner');
 $subHeading = get_field('sub_heading');
 $blurb1 = get_field('blurb_1');
 $blurb2 = get_field('blurb_2');
 $blurb3 = get_field('blurb_3');
 get_header(); ?>

 	<?php if ($has_banner): ?>
 		<div id="page-sub-header" style="background-image:url(<?php echo get_the_post_thumbnail_url();?>)">
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
    <div class="container mid-section pattern">
			<div class="row">
        <h3>Section 2</h3>
      </div>
    </div>
    <div class="container mid-section">
			<div class="row">
        <h3>Section 3</h3>
      </div>
    </div>
    <div class="container bottom-section">
			<div class="row">
        <h3>Section 4</h3>
      </div>
    </div>
</div>


 <?php
 get_footer();
