jQuery('.callback .callback_form').click(function(e){
		e.preventDefault();

		if(jQuery('.callback .callback_form').hasClass('active')){
			jQuery('.callback_box').slideUp();
			jQuery('.callback .callback_form').removeClass('active');
		}else{
			jQuery('.callback_box').slideDown();
			jQuery('.callback .callback_form').addClass('active');
		}
	})

jQuery('#menu-item-357 a').click(function(){
		if(jQuery('#menu-item-357 a').hasClass('active')){
			jQuery('.callback_box').slideUp();
			jQuery('#menu-item-357 a').removeClass('active');
		}else{
			jQuery('.callback_box').slideDown();
			jQuery('#menu-item-357 a').addClass('active');
		}
	})

jQuery(document).ready(function () {
   jQuery('.menu nav').meanmenu();
   // jQuery('.product_list .postww:nth-child(5)').addClass('last')
    jQuery('.product_list .postww:nth-child(6n)').addClass('last1dff')
   // jQuery('.product_list .postww:nth-child(6n)').addClass('last')
   // jQuery('.product_list .postww:nth-child(2n-1)').addClass('last_mob')
   // jQuery('.product_list .postww:nth-child(3)').addClass('last_mob1')
   // jQuery('#menu-main-menu li a:last-child').addClass('nav_slide')
   jQuery('.closebox').click(function(e){
		e.preventDefault();
		jQuery('.callback_box').slideUp();
		jQuery('.callback_form').removeClass('active');
	})
   jQuery('input[type="radio"]').uniform();
  

});

/*jQuery(document).ready(function () {
jQuery('.nav_slide').click(function(e){
		e.preventDefault();
	
		jQuery('.contact_box').slideDown();
	})
jQuery('.slide_up').click(function(e){
		e.preventDefault();
		jQuery('.contact_box').slideUp();
	})
});
*/
// jQuery('.nav_slide a').click(function(e){
// 		e.preventDefault();

// 		if(jQuery('.nav_slide a').hasClass('active')){
// 			jQuery('.contact_box').slideUp();
// 			jQuery('.nav_slide a').removeClass('active');
// 		}else{
// 			jQuery('.contact_box').slideDown();
// 			jQuery('.nav_slide a').addClass('active');
// 		}
// 	})

//var varHeight;
//varHeight=window.height();
//jQuery(".page_inner>div").css({ 'height':varHeight});

jQuery(document).ready(function () {
jQuery('.nav_slide').click(function(e){
		e.preventDefault();
	
		jQuery('.contact_box').slideDown();
	})

jQuery('.call_in').click(function(e){
		e.preventDefault();
	
		jQuery('.callback_box').slideDown();
		jQuery('.callback_form').addClass('active');

		  jQuery('.closebox').click(function(e){
		jQuery('.callback_form').removeClass('active');
		jQuery('.mean-bar .meanmenu-reveal').removeClass("meanclose");
	})
		

	})
jQuery('.slide_up').click(function(e){
		e.preventDefault();
		jQuery('.contact_box').slideUp();
		jQuery('.mean-nav #menu-main-menu').slideUp();
		jQuery('.mean-bar .meanmenu-reveal').removeClass("meanclose");
							
							

	})
});


var winHeight=jQuery(window).height();

var actualHeight = winHeight -73 + 'px'; 
//var blockHeight = actualHeight / 2;
//jQuery(".page_inner div").css( 'height',blockHeight);
jQuery('.inner_content').css('height',actualHeight);
jQuery('.home_content').css('height',winHeight);


// jQuery('#slider').flexslider({
//         animation: "slide",
//         controlNav: false,
//         animationLoop: false,
//         slideshow: false,
//         start: function(){
//             jQuery('#sliderNext').on('click', function(e){
//                 jQuery('.flex-next').trigger('click');
//             });
//             jQuery('#sliderPrev').on('click', function(e){
//                 jQuery('.flex-prev').trigger('click');
//             });
//         }
//     });

