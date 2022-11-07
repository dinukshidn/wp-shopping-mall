<?php
/**
 * The template for displaying all pages
 *
 */

get_header();
	if ( have_posts() ) : while ( have_posts() ) : the_post(); 
		$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full'); ?>
		<main id="header-banner" class="topspace parallax-window" data-parallax="scroll" data-image-src="<?php echo $src[0]; ?>">
				<div class="banner-content">
					<div class="container">
						<div class="row page-title">
							<h1><?php the_title() ?></h1>
						</div>
					</div>
				</div>
			</main>

			<section class='cms-page cms-content-top'>
				<div class='container '>
					<div class="desc-container">
						<?php the_content(); ?>
					</div>
				</div>
			</section>	
			<?php
	endwhile;
	endif; ?>

<?php get_footer();
