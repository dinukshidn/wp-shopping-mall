<?php
/**
 * The template for displaying archive pages
 */

get_header();
	$current_category = single_cat_title("", false); ?>
	<div id="inner-pages" class="center-wrapper clearfix topspace">
		<div class="inner-wrapper">
			<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
				<?php if(function_exists('bcn_display'))
				{
				bcn_display();
				}?>
			</div>
			<div class="page-title">
				<h1><?php echo ($current_category); ?></h1>
			</div>
			<div class="pages-content-wrapper cms-page clearfix">
				<div class="news-wrapper float-l clearfix">
					<?php if (have_posts()) : while (have_posts()) : the_post();
						$addclass ='';?>
						<div class="news-items clearfix">
							<?php if(has_post_thumbnail()) { ?>

								<div class="news-image-wrapper float-l clearfix">
									<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full'); ?>
									<a class="news-image" href="<?php the_permalink() ?>" style="background-image: url(<?php echo $src[0]; ?> ) !important;background-repeat:no-repeat;background-size: cover;background-position:center;">
									</a>
								</div>
							<?php }else{ ?>
								<?php $addclass = 'full-width-row'; 
								?>
							<?php } ?>
							<div class="news-details clearfix <?php  echo $addclass; ?> ">
								<div class="news-details-wrapper">
									<div class="news-title-wrapper">
										<h2>
											<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
										</h2>
									</div>
									<div class="date-and-formats">
										<div class="date-box updated"><?php the_time('dS F Y'); ?></div>
									</div>
									<div class="news-details-desc-wrap">
										<?php echo get_the_excerpt(); ?>
									</div>
								</div>
							</div>
							<div class="news-bottom-row float-l clearfix">
								<div class="share-icon float-l clearfix">
									<?php echo do_shortcode('[addthis tool="addthis_inline_share_toolbox_eiti"]'); ?>
								</div>
								<div class="read-more-btn float-r clearfix">
									<a href="<?php the_permalink() ?>">Continue Reading</a>
								</div>
							</div>
						</div>
					<?php 	endwhile; endif;
						wp_reset_postdata(); ?>
				</div>
				<div class="news-side-bar float-l clearfix">
					<div id="news-sidebar"><?php get_sidebar('news'); ?></div>
				</div>
			</div>
		</div>	
	</div>

<?php get_footer();
