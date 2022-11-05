<?php
remove_action('wp_head', 'wp_generator');
add_filter('show_admin_bar', '__return_false');

add_action('init', 'myoverride', 100);
function myoverride() {
	// remove_action('wp_head', array(visual_composer(), 'addMetaData'));
}

add_theme_support( 'title-tag' );

register_nav_menu('main', 'Main navigation menu');

add_theme_support( 'post-thumbnails' );


register_nav_menus( array(
	'top'    => __( 'Top Menu', 'Main navigation menu' ),
));


register_sidebar( array(
	'name'          => __( 'Contact Details', 'shoppingmall' ),
	'id'            => 'contact-details',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
));

register_sidebar( array(
	'name'          => __( 'Footer Menu', 'shoppingmall' ),
	'id'            => 'footer-menu',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
));

register_sidebar( array(
	'name'          => __( 'Sidebar', 'shoppingmall' ),
	'id'            => 'sidebar-1',
	'description'   => __( 'Add widgets here to appear in your sidebar.', 'shoppingmall' ),
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h2 class="widget-title">',
	'after_title'   => '</h2>',
));



add_action('init', 'add_excerpt_pages');
	function add_excerpt_pages() {
	add_post_type_support( 'page', 'excerpt' );
}

// add_theme_support( 'post-thumbnails' );

/**
 * Style files and script files
*/

function styles(){


	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'theme-ie8', get_template_directory_uri() . '/css/ie8.css', array(), '20160816' );
	// Load the Internet Explorer 9 specific stylesheet.
	wp_enqueue_style( 'theme-ie9', get_template_directory_uri() . '/css/ie9.css', array(), '20160816' );
	wp_register_style( 'style', get_template_directory_uri() . '/style.css', array(), '20160411', 'all'); /*style css*/

	
	
	

	wp_enqueue_style( 'theme-ie8');
	wp_enqueue_style( 'theme-ie9');
	wp_enqueue_style( 'style');
}

function scripts(){ 
	//<!-- captcha js files -->

	// wp_register_script( 'parallax', get_template_directory_uri() . '/assets/js/parallax.min.js', '', '', true ); /*parallax js */
	wp_register_script( 'custom', get_template_directory_uri() . '/assets/js/script.js', '', '', true ); /*custom js */


	// wp_enqueue_script( 'parallax' );
	wp_enqueue_script( 'custom' );
}

	add_action( 'wp_enqueue_scripts', 'scripts', 0 );
	add_action( 'wp_enqueue_scripts', 'styles' );



	

	//******************** Latest News Section ********************//
	function latestnews(){
			$latestnews .= "<div id='news-room-wrapper' class='clearfix'>
				<div id='latest-news-left-section' class='float-l clearfix'>";
					$args = array( 'cat' => 5, 'posts_per_page' => 1, 'post_status'=> 'publish', 'post_type'=> 'post', 'orderby'=> 'post_date');

					$postslist = new WP_Query( $args );

					if ( $postslist->have_posts()) : while ( $postslist->have_posts()) :  $postslist->the_post();
					$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large'); 
					$latestnews .= "<div class='first-news-image-wrapper'>
						<a href=". get_permalink($post->ID) ." class='news-post-image' style='background-image: url(". $src[0] .") !important;background-repeat:no-repeat;background-size: cover;background-position: center;'><div class='hover-wrapper'></div></a>";
						$latestnews .= "<div class='news-details-desc'>
							<a href=". get_permalink($post->ID) .">
								<h2>".get_the_title($post->ID)."</h2>
							</a>
							<div class='news-desc'>".get_the_excerpt($post->ID)."</div>
						</div>
					</div>";

					endwhile; endif;
					wp_reset_postdata();
				$latestnews .= "</div>";


				$latestnews .= "<div id='latest-news-right-section' class='float-l clearfix'>
					<div id='latest-news-wrapper' class='float-l clearfix'>";
						$args = array(
							'cat' => 5, 
							'posts_per_page' => 2, 
							'post_status'=> 'publish', 
							'post_type'=> 'post', 
							'orderby'=> 'post_date',
							'offset' => 1, // excludes the first post in the query
						);

						$postslist = new WP_Query( $args );

						if ( $postslist->have_posts()) : while ( $postslist->have_posts()) :  $postslist->the_post();
							$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large');
							$latestnews .= "<div class='news-post'>
								<a href=". get_permalink($post->ID) ." class='news-post-image' style='background-image: url(". $src[0] .") !important;background-repeat:no-repeat;background-size: cover;background-position: center;'>
									<div class='hover-wrapper'></div>
								</a>";
								$latestnews .= "<div class='news-details-desc'>
									<a href=". get_permalink($post->ID) .">
										<h2>".get_the_title($post->ID)."</h2>
									</a>
									<div class='news-desc'>".get_the_excerpt($post->ID)."</div>
								</div>
							</div>";

						endwhile; endif;
						wp_reset_postdata();
					$latestnews .= "</div>
				</div>
			</div>";
		return $latestnews;
	}

	add_shortcode('News-Room', 'latestnews');
	//******************** EOF Latest News Section ********************//




//****Location Section****//

function locationSection(){
	$current_id= get_the_ID();
	$longitude_latitude = get_post_meta($current_id, 'Longitude & Latitude', true); 

	$locationSection .= "<div id='map-container".$current_id."' class='map-container-wrapper'></div>";  
	$locationSection .="<script type='text/javascript'>

	var map".$current_id.";";

	$locationSection .= "function initialize".$current_id."() { ";

	$locationSection .= "var assetsPath = ' ".get_template_directory_uri()."/assets/images/'; ";

	$locationSection .= "

	var options".$current_id." = {
		center: new google.maps.LatLng(". $longitude_latitude."),

		zoom: 9,
		disableDefaultUI: false,
		scrollwheel: false,
		zoomControl: false,
		mapTypeControl: false,  

		styles: [{'featureType': 'water','elementType': 'geometry','stylers': [{'color': '#e9e9e9' },{'lightness': 17}]},{'featureType': 'landscape','elementType': 'geometry','stylers': [{'color': '#f5f5f5'},{'lightness': 20}]},{'featureType': 'road.highway','elementType': 'geometry.fill','stylers': [{'color': '#ffffff'},{'lightness': 17}]},{'featureType': 'road.highway','elementType': 'geometry.stroke','stylers': [{'color': '#ffffff'},{'lightness': 29},{'weight': 0.2}]},{'featureType': 'road.arterial','elementType': 'geometry','stylers': [{'color': '#ffffff'},{'lightness': 18}]},{'featureType': 'road.local','elementType': 'geometry','stylers': [{'color': '#ffffff'},{'lightness': 16}]},{'featureType': 'poi','elementType': 'geometry','stylers': [{'color': '#f5f5f5'},{'lightness': 21}]},{'featureType': 'poi.park','elementType': 'geometry','stylers': [{'color': '#dedede'},{'lightness': 21}]},{'elementType': 'labels.text.stroke','stylers': [{'visibility': 'on'},{'color': '#ffffff'},{'lightness': 16}]},{'elementType': 'labels.text.fill','stylers': [{'saturation': 36},{'color': '#333333'},{'lightness': 40}]},{'elementType': 'labels.icon','stylers': [{'visibility': 'off'}]},{'featureType': 'transit','elementType': 'geometry','stylers': [{'color': '#f2f2f2'},{'lightness': 19}]},{'featureType': 'administrative','elementType': 'geometry.fill','stylers': [{'color': '#fefefe'},{'lightness': 20}]},{'featureType': 'administrative','elementType': 'geometry.stroke','stylers': [{'color': '#fefefe'},{'lightness': 17},{'weight': 1.2}]}],

		mapTypeControlOptions: {
			style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
			position: google.maps.ControlPosition.TOP_CENTER
		},

		zoomControl: true,
		zoomControlOptions: {
			position: google.maps.ControlPosition.LEFT_CENTER
		},

		scaleControl: true,
		streetViewControl: true,
		streetViewControlOptions: {
			position: google.maps.ControlPosition.LEFT_TOP
		},

		fullscreenControl: true

	};

	map".$current_id." = new google.maps.Map(document.getElementById('map-container".$current_id."'),options".$current_id.");

	marker".$current_id." = new google.maps.Marker({
		map:map".$current_id.",
		animation: google.maps.Animation.DROP,
		position: new google.maps.LatLng(". $longitude_latitude."),
		icon: assetsPath + 'map-icon.png'
	}); 

		
	}
	setTimeout(function() { initialize".$current_id."(); }, 5000);
	
	";
	$locationSection .="</script>";

	return $locationSection;
}

add_shortcode('location-Section', 'locationSection');

//****EOF Location Section****//
