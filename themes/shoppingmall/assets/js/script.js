function isMobile() {
    return /Android|webOS|iPhone|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
}

jQuery(document).ready(function() {

	jQuery(window).scroll(function() { 
		if (jQuery(this).scrollTop() > 1){
			jQuery('.header-wrapper').addClass('sticky'); 
			jQuery('#responsive-menu-button').addClass('sticky'); 
		}else{ 
			jQuery('.header-wrapper').removeClass('sticky'); 
			jQuery('#responsive-menu-button').removeClass('sticky'); 
		} 

	}); 

    jQuery('.parallax-window').parallax();
});



