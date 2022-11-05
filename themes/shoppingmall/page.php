<?php
/**
 * The template for displaying all pages
 *
 */

get_header();
	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
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
					<div class="page-title">
						<h1><?php the_title() ?></h1>
					</div>
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
