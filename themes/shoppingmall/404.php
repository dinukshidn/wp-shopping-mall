<?php
/**
 * The template for displaying 404 pages (not found)
 *

 */

get_header(); ?>
	<section id="inner-pages" class="without-banner cms-page clearfix">
		<div class="container">
			<div class="row">
				<div class="page-title">
						<h1>404, Page not found</h1>
				</div>
				<div class="pages-content-wrapper clearfix">
					<p style="text-align: center";>You might want to check that URL again or head over to our <a href="<?php bloginfo('url');?>">homepage.</a></p>
				</div>
			</div>
		</div>	
	</section>	

<?php get_footer();

