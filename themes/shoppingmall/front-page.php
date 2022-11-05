<?php
/*
Template Name: Home Page
*/

get_header();
	//$current_page_id = get_the_ID();
	if ( have_posts() ) : 
		while ( have_posts() ) : the_post(); 
			$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full'); ?>
			<main id="header-banner"  class="topspace" style="background-image: url(<?php echo $src[0]; ?> ) !important;background-repeat:no-repeat;background-size: cover;background-position:center;">

				<div class="banner-content">
					<div class="container">
						<div class="row page-title">
							<h1><?php the_title() ?></h1>
						</div>
					</div>
				</div>
			</main>

			<section class='cms-page'>
				<div class='container'>
					<div class="desc-container">
						<?php the_content(); ?>
					</div>
				</div>
			</section>

		<?php	
		endwhile;
	endif; 
get_footer();
