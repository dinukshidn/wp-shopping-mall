 <div class="search-form-container">
	<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<div class="search-lbl">
			<!--span class="screen-reader-text"><?php //echo _x( 'Search for:', 'label', 'jetwingtravels' ); ?></span-->
			<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'jetwingtravels' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'jetwingtravels' ); ?>" />
			<button type="submit" class="find search-submit"><i class="fa fa-search"></i></button>
		</div>
	</form>
</div>
