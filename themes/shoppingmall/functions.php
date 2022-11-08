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
	wp_register_script( 'custom', get_template_directory_uri() . '/assets/js/script.js', '', '', true ); /*custom js */
	wp_register_script( 'weather', get_template_directory_uri() . '/assets/js/weather.js', '', '', true ); /*weather js */

	wp_enqueue_script( 'custom' );
	wp_enqueue_script( 'weather' );
}

	add_action( 'wp_enqueue_scripts', 'scripts', 0 );
	add_action( 'wp_enqueue_scripts', 'styles' );

	//******************** Custom pagination function ********************//
	
    function pagination($pages = '', $range = 4){
        $showitems = ($range * 2)+1;
        global $paged;
        if(empty($paged)) $paged = 1;
        if($pages == ''){
            global $wp_query;
            $pages = $wp_query->max_num_pages;
            if(!$pages){
                $pages = 1;
            }
        }
        if(1 != $pages){
            echo "<nav aria-label='Page navigation example'>  <ul class='pagination justify-content-center'> <span>Page ".$paged." of ".$pages."</span>";
            if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
            if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
            for ($i=1; $i <= $pages; $i++){
                if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
                    echo ($paged == $i)? "<li class=\"page-item active\"><a class='page-link'>".$i."</a></li>":"<li class='page-item'> <a href='".get_pagenum_link($i)."' class=\"page-link\">".$i."</a></li>";
                }
            }
            // if ($paged < $pages && $showitems < $pages) echo " <li class='page-item'><a class='page-link' href=\"".get_pagenum_link($paged + 1)."\">i class='flaticon flaticon-back'></i></a></li>";
            // if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo " <li class='page-item'><a class='page-link' href='".get_pagenum_link($pages)."'><i class='flaticon flaticon-arrow'></i></a></li>";
            // echo "</ul></nav>\n";
        }
  	}

  	//******************** Custom pagination function ********************//
