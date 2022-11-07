<?php
/*
Template Name: Home Page
*/

get_header();
	$current_page_id = get_the_ID();
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
	endif; ?>

	<section id="filter-row">
		<div class='container'>	
			<div class="filter-wrapper row"></div>
		</div>
	</section>


	<section id="listing-shop-wrapper">
		<div class='container'>	
			<div class="listing-shop-wrapper row">
				<?php 
					// $args = array(
					// 	'child_of' => 11, 
					// 	'orderby' => 'term_id'
					// );
					// $categories = get_categories( $args );
					// foreach($categories as $category){ 
					// $cat_id= $category->term_id;
				?>
				<?php 

				//$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
				elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
				else { $paged = 1; }

				$args = array(
					'post_type' => 'post',
					'orderby' => 'name', 
					'order' => 'ASC',
					'cat' => 11,
					'posts_per_page' => 5,
        			'paged' => $paged,

				);

				$posts = new WP_Query( $args ); ?>

				<?php if ( $posts->have_posts()) : while ( $posts->have_posts()) :  $posts->the_post();
					//foreach ( $posts as $post ) : setup_postdata( $post ); 
					//global $post;
					$postID = $post->ID;
					$shopLogo = get_post_meta($postID, 'Shop Logo', true); 
					$location = get_post_meta($postID, 'Location', true); 
					$operatingHours = get_post_meta($postID, 'Operating Hours', true); ?>


				<?php //$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large'); ?>
					<div class="listing-shop-boxs col-md-6 col-lg-3">	
						<a class="shops-box" href="<?php the_permalink() ?>">
							<div class="shops-logo-wrapper">
								<img class="shops-logo" alt="<?php the_title() ?>" src="<?php echo $shopLogo;?>" width="600" height="450">
							</div>

							<div class="shops-name">
								<h4><?php the_title() ?></h4>
							</div>

							<div class="shops-details-wrap">
								<p class="shops-details shops-location"><?php echo $location; ?></p>
								<p class="shops-details shops-operatinghr"><?php echo $operatingHours; ?></p>
							</div>
						</a>
					</div>

				<?php //endforeach; 
				endwhile; 
			endif; ?>
				<div id="pagination">
					<?php if (function_exists("pagination")) {
						pagination($posts->max_num_pages); 
					} ?>
				</div>
				<?php wp_reset_postdata(); ?>
				<?php // } ?>
			</div>

		</div>
	</section>


<?php get_footer();
