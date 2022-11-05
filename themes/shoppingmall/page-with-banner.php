<?php
/*
Template Name: With Banner
*/


get_header();
	if ( have_posts() ) : while ( have_posts() ) : the_post();

		global $wp_query; 
		$wp_query->post->ID; 
		$banner_title = get_post_meta ($post->ID, 'Banner title', true);


		$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');

		if ( $banner_title =='' ) { ?>
			<section id="header-banner"  class="topspace" style="background-image: url(<?php echo $src[0]; ?> ) !important;background-repeat:no-repeat;background-size: cover;background-position:center;">
			</section>
		<?php }else{ ?>
			<section id="header-banner" class="topspace"> <?php putRevSlider($banner_title) ?> </section>
		<?php } ?>

		<section class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
			<div class="center-wrapper">
				<?php if(function_exists('bcn_display'))
				{
					bcn_display();
				}?>
			</div>
		</section>
		<section id="inner-pages" class="cms-page clearfix">
			<div class="center-wrapper">
				<div class="center-inner-wrapper">
					<?php if ( $banner_title == '' ) { ?>
						<div class="page-title">
							<h1><?php the_title() ?></h1>
						</div>
					<?php } ?>
					<div class="pages-content-wrapper clearfix">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		</section>	
			<?php
	endwhile;
	endif; ?>

<?php get_footer();
