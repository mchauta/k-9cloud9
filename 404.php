<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WP_Bootstrap_Starter
 */

$has_banner = true;
$thumb = false;

get_header(); ?>

 	<?php if ($has_banner): ?>
 		<div id="page-sub-header" style="background-image:url(<?php if ($thumb) : echo $thumb; else :  img_path('pattern.svg') ; endif;?>)">
 				<div class="container">
          <div class="header-title">
 						<h1>404 - ?</h1>
 						<p>
							That page doesn't exist, try something else.
 						</p>
          </div>
            <div class="cta-container">
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

 				<div class="entry-content">
 					?
 				</div><!-- .entry-content -->


 			</article><!-- #post-## -->

 		</main><!-- #main -->
 	</section><!-- #primary -->

 <?php
 get_footer();
