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

 


    jQuery('.counter').counterUp({
        delay: 10,
        time: 1000
    });

    jQuery(".find-submit").click(function(){
    		jQuery(".close-submit").show();
    		jQuery(".find-submit").hide();
        jQuery(".search-form-container").toggle(1000);
    });

    jQuery(".close-submit").click(function(){
    		jQuery(".close-submit").hide();
    		jQuery(".find-submit").show();
        jQuery(".search-form-container").toggle(1000);
    });



    // jQuery('.scroll-pane').jScrollPane({
    //     showArrows: true
    // });

});



