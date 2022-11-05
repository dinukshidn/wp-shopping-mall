	<div id="news-top-sm-icons">
		<h2>Connect with us</h2>
		<ul class="unstyled-list">
			<li class="sm-icon facebook-icon">
				<a href="<?php echo stripslashes(get_option('fb_link')); ?>" target="_blank" class="fb"><i class="fa fa-facebook fa-2" aria-hidden="true"></i></a>
			</li>

			<li class="sm-icon twitter-icon">
				<a href="<?php echo stripslashes(get_option('twitter')); ?>" target="_blank" class="twitter"><i class="fa fa-twitter fa-2" aria-hidden="true"></i></a>
			</li>

			<li class="sm-icon linkedin-icon">
				<a href="<?php echo stripslashes(get_option('linkedIn')); ?>" target="_blank" class="linkedIn"><i class="fa fa-linkedin fa-2" aria-hidden="true"></i></a>
			</li>

			<li class="sm-icon youtube-icon">
				<a href="<?php echo stripslashes(get_option('youTube')); ?>" target="_blank" class="youTube"><i class="fa fa-youtube fa-2" aria-hidden="true"></i></a>
			</li>
			
		</ul>
	</div>

	<div id="recent-post">
		<div class="side-bar">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div>

	</div>		