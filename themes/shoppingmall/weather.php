<?php
/*
Template Name: Weather Page
*/

get_header();
	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<section class='cms-page cms-content-top topspace'>
			<div class='container'>
				<div class="row">
					<div class="col-md-12 col-lg-12">
						<div class="row page-title">
							<h1><?php the_title() ?></h1>
						</div>
						<div id="map"></div>
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		</section>	
	<?php endwhile; endif; ?>

<?php get_footer();
