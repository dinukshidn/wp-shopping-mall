<?php
/**
 * The template for displaying archive pages
 */

get_header();
	$current_category = single_cat_title("", false); ?>

	<main id="header-banner" class="topspace parallax-window" data-parallax="scroll" data-image-src="<?php if (function_exists('z_taxonomy_image_url')) echo z_taxonomy_image_url(); ?>"></main>

	<section class='cms-page cms-content-top'>
		<div class='container'>
			<div class="row desc-container page-title">
				<h1><?php  echo($current_category); ?></h1>
			</div>
		</div>
	</section>

	<div id="inner-pages" class="container">
		<div class="row">

			<div class="post-wrapper col-lg-8">
				<?php if (have_posts()) : while (have_posts()) : the_post();
				$addclass ='';?>
				<div class="post-items row">
					<?php if(has_post_thumbnail()) { ?>

					<div class="post-image-wrapper col-lg-5">
						<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full'); ?>
						<a class="post-image" href="<?php the_permalink() ?>" style="background-image: url(<?php echo $src[0]; ?> ) !important;background-repeat:no-repeat;background-size: cover;background-position:center;">
						</a>
					</div>
					<?php }else{ ?>
						<?php $addclass = 'col-lg-12'; ?>
					<?php } ?>

					<div class="post-details col-lg-7 <?php  echo $addclass; ?> ">
						<div class="post-details-wrapper">
							<div class="post-title-wrapper">
								<h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
							</div>
							<div class="date-and-formats">
								<div class="date-box updated"><?php the_time('dS F Y'); ?></div>
							</div>
							<div class="post-details-desc-wrap">
								<?php echo get_the_excerpt(); ?>
							</div>
						</div>
					</div>
					<div class="post-bottom">
						<div class="share-icon float-start">
							<?php echo do_shortcode('[addthis tool="addthis_inline_share_toolbox_714f"]'); ?>
						</div>
						<div class="read-more-btn float-end">
							<a class="btn btn-primary " role="button" href="<?php the_permalink() ?>">Continue Reading</a>
						</div>
					</div>
				</div>
				<?php 	endwhile; endif;
				wp_reset_postdata(); ?>
			</div>
			<div class="post-side-bar col-lg-4">
				<div id="post-sidebar"><?php get_sidebar('news'); ?></div>
			</div>

		</div>	
	</div>

<?php get_footer();
