<?php
/*
Template Name: work-site
*/


get_header();
	if ( have_posts() ) : while ( have_posts() ) : the_post();

		global $wp_query; 
		$wp_query->post->ID; 
		$banner_title = get_post_meta ($post->ID, 'Banner title', true);


		$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');

		 if ( $banner_title == '' ) { ?>
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
				<?php if ( $banner_title =='' ) { ?>
						<div class="page-title">
							<h1><?php the_title() ?></h1>
						</div>
					<?php } ?>
				<div class="pages-content-wrapper clearfix">
						<?php //the_content(); ?>
					<div id='projects-section' class='clearfix'>
						<?php $args = array( 
							'post_parent'=> 385,
							'post_status'=>'publish', 
							'post_type'=>'page',
							'orderby'=> 'Date', 
							'order'=>"ASC"
							
						);
						$postslist = get_posts( $args );
						foreach ($postslist as $post) :  setup_postdata($post); ?>

						<div  class='work-site-row-wrapper clearfix'>
							<div class='work-site-image-wrapper clearfix'>
								<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full'); ?>
								<a href="<?php the_permalink() ?>" class='work-site-image' style='background-image: url(<?php echo $src[0]; ?>) !important; background-repeat:no-repeat; background-size: cover; background-position:center;'><div class='hover-wrapper'></div>
								</a>
							</div> 

							<div class='work-site-details-wrapper clearfix'>
								<a class="work-site-title-wrap" href="<?php the_permalink() ?>">
									<h2 class='work-site-title'><?php echo the_title(); ?></h2>
								</a>

								<div class='work-site-short-desc'>
									<?php echo get_the_excerpt(); ?>
								</div>

								<div class='work-site-location'>
									<?php echo do_shortcode('[location-Section]');?>
								</div>

								<div class='read-more-btn'>
									<a href="<?php the_permalink() ?>">Look Inside</a>
								</div>
							</div>

						</div>

							<?php	endforeach; wp_reset_postdata(); ?>

					</div>
				</div>
			</div>
		</section>	
			<?php
	endwhile;
	endif; ?>

<?php get_footer();
