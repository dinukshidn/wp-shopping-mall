<?php get_header();?>
	<section class="breadcrumbs topspace" typeof="BreadcrumbList" vocab="http://schema.org/">
		<div class="center-wrapper">
			<div class="center-inner-wrapper">
				<?php if(function_exists('bcn_display'))
				{
				bcn_display();
				}?>
			</div>
		</div>
	</section>
		<section id="inner-pages" class="without-banner cms-page clearfix">
			<div class="center-wrapper">
				<div class="center-inner-wrapper">
				<div class="pages-content-wrapper clearfix">
					<div class="page-title">
						<h1><?php printf( __( 'Search Results for &quot;%s&quot;', '' ), '' . get_search_query() . '' ); ?></h1>
					</div>

				<div class="search_form_wrapper">
					<h5><?php _e( 'New Search', THEMEDOMAIN ); ?></h5>
				<?php _e( "If you didn't find what you were looking for, try a new search.", THEMEDOMAIN ); ?><br/><br/>

					<form class="searchform" role="search" method="get" action="<?php echo home_url(); ?>">
						<input type="text" class="field searchform-s" name="s" value="<?php the_search_query(); ?>" title="<?php _e( 'Type and hit enter', THEMEDOMAIN ); ?>">
						<button type="submit" id="searchsubmit" class="button submit">
						<i class="fa fa-search"></i>
					</button>
					</form>
				</div>
						
		<!-- Begin each blog post -->
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<div class="search-post-item-wrap float-l clearfix">
				<div id="search-post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="search_wrapper">
						<div class="search_content_wrapper">
							<?php
							$post_type = get_post_type();
							$post_type_class = 'fa-file-text-o';
							$post_type_title = '';
							//echo $post_type;

							switch($post_type){
							case 'page':
							default:
								$post_type_class = 'fa fa-file-o';
								$post_type_title = __( 'Page', THEMEDOMAIN );
							break;
							case 'post':
								$post_type_class = 'fa-file-text-o';
								$post_type_title = __( 'News', THEMEDOMAIN );
							break;
							}
							?>
							<div class="post_type_icon">
								<a href="<?php the_permalink(); ?>" title="<?php echo $post_type_title; ?>" class="tooltip">
								<i class="fa <?php echo $post_type_class; ?>"></i>
								</a>
							</div>
							<div class="post_header">
								<h6><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h6>
								<?php the_excerpt(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>

		<?php endwhile; endif; ?>
		<!-- End each blog post -->
			</div>
		</div>
	</div>
		</section>	
<?php get_footer();
