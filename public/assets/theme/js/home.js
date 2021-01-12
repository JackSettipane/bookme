/* Theme Name: Jobya - Responsive Landing Page Template
   Author: Themesdesign
   Version: 1.0.0
*/


(function ($) {

    'use strict';

    //owlCarousel
    $("#owl-testi").owlCarousel({
        autoPlay: 3000, //Set AutoPlay to 3 seconds
        items: 2,
        itemsDesktop: [1199, 2],
        itemsDesktopSmall: [979, 2]
    });

    jQuery('section.bg-home').css('margin-top',jQuery('header#topnav').height()+'px');

    $(window).scroll(function() {    
        var scroll = $(window).scrollTop();
    
        if (scroll >= 100) {
            $("header#topnav").addClass("scroll");
        } else {
            $("header#topnav").removeClass("scroll");
        }
    });


    setTimeout(function(){
    
        jQuery('.alert').slideUp();
    
    },3000);
 


})(jQuery)