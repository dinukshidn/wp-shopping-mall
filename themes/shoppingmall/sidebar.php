<?php

$postID = $post->ID;
$shopLogo = get_post_meta($postID, 'Shop Logo', true); 
$location = get_post_meta($postID, 'Location', true); 
$operatingHours = get_post_meta($postID, 'Operating Hours', true);


$categories = get_the_category();
$category_id = $categories[0]->cat_ID; 		

if(in_category('11')){  ?>

<div id="shops-sidebar">
	<div class="sidebar-section">
		<div class="sidebar-inner-txt">
			<?php if($location != ''){ ?>
			    <h4>Location</h4>
			    <p class="shops-location"><?php echo $location; ?></p>
			<?php } ?>
		</div>
		<div class="sidebar-inner-txt">
			<?php if($operatingHours != ''){ ?>
			    <h4>Operating Hours</h4>
			    <p class="shops-operatingHours"><?php echo $operatingHours; ?></p>
			<?php } ?>
		</div>
		<div class="sidebar-inner-txt">
			<div class="contact-details">
				<?php if ( is_active_sidebar( 'contact-details' )):
				dynamic_sidebar( 'contact-details' );
				endif; ?>
			</div>			
		</div>
	</div>
</div>
<?php }else{ ?>
	<div id="recent-post">
		<div class="side-bar">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div>
	</div>
<?php } ?>

