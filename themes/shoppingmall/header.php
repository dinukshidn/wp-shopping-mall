<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">

<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />

<meta name="description" itemprop="description" content="" />
<meta name="keywords" itemprop="keywords" content="" />

<link href="https://fonts.googleapis.com/css?family=Lato:300i,400,400i,700,700i,900%7CMontserrat:300,300i,400,400i,500,500i,600,600i,700,700i,800" rel="stylesheet"> 
<!-- <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&display=swap" rel="stylesheet"> 

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">



<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<header class="header-wrapper ">
		<section class="container">
			<div class="header-inner-wrap row">
				<!-- main logo -->
				<div id="main-logo" class="col">

					<a title="<?php bloginfo('name');?>"  href="<?php bloginfo('url');?>">
						<img class="logo" title="<?php bloginfo('name');?>" alt="<?php bloginfo('name');?>-logo" width="316" height="86" src="<?php bloginfo('template_url');?>/assets/images/shoppingMall-logo.png">

						<img class="mini-logo" title="<?php bloginfo('name');?>" alt="<?php bloginfo('name');?>-logo" width="108" height="50" src="<?php bloginfo('template_url');?>/assets/images/logo.png">

					</a>
				</div>
				<!-- EOF main logo -->
				<!-- Main menu -->
				<div class="menu-wrapper col">
					<nav class="header-menu">
						<?php  wp_nav_menu( array('menu' => 'Main menu', 'container' => ''));?>
						<!-- Search Option start -->
						<!-- <div id="serach-wrapper" class="clearfix">
							<div class="cg-search-container">
								<button type="submit" class="find-submit"><i class="fa fa-search"></i></button>
								<button type="submit" class="close-submit"><i class="fa fa-times"></i></button>
								<?php //get_search_form(); ?>
							</div>
							<a class="cg-search-btn float-l clearfix" href="#"></a>
						</div> -->
						<!-- Search Option end -->
					</nav>
				</div>
				<!-- EOF main menu -->
			</div>
		</section>
	</header>