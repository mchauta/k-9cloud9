<?php
/**
* Template Name: Basic Home
 */

 $has_banner = get_field('has_top_banner');
 $subHeading = get_field('sub_heading');
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
 						<a href="#content" class="page-scroller"><i class="fa fa-fw fa-angle-down"></i></a>
 				</div>
 		</div>
 	<?php endif; ?>

	<div id="content" class="site-content">
		<div class="container top-section">
			<div class="row">
        <h3>Why Choose Us?</h3>
      </div>
    </div>
    <div class="container mid-section">
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
