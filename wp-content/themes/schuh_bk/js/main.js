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
   jQuery('body').on("click",".closebox",function(e){
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
jQuery('.nav_slide').click(function(e){
			e.preventDefault();

			if(jQuery('.nav_slide').hasClass('active')){
				jQuery('.contact_box').slideUp();
				jQuery('.nav_slide').removeClass('active');
			}else{
				jQuery('.contact_box').slideDown();
				jQuery('.nav_slide').addClass('active');
			}
		})

jQuery(document).ready(function () {
jQuery('.call_in').click(function(e){
		e.preventDefault();
	
		jQuery('.callback_box').slideDown();
		jQuery('.callback_form').addClass('active');

		  jQuery('.closebox').click(function(e){
		jQuery('.callback_form').removeClass('active');
	})
		

	})
jQuery('.slide_up').click(function(e){
		e.preventDefault();
		jQuery('.contact_box').slideUp();
		jQuery('.nav_slide').removeClass('active');
		jQuery('.mean-nav #menu-main-menu').slideUp();
		jQuery('.mean-bar .meanmenu-reveal').removeClass("meanclose");
							
							

	})
//jQuery('.flex-active-slide').parent().parent().parent().css('backgroundColor',jQuery('.flex-active-slide').css('backgroundColor'));
jQuery(".slider_container").each(function() {
	//jQuery(this).css('background', jQuery('.slider_container .flex-active-slide').css('backgroundColor'));
	var bgAttr =  jQuery('.slider_container .flex-active-slide').attr('databg')
	jQuery(this).css('background', bgAttr);
})

var bgAttr =  jQuery('.slider_container .flex-active-slide').attr('databg')
	jQuery(this).css('background', bgAttr);
	var divId = jQuery('.slider_container .flex-active-slide>div').attr('id');
		jQuery('body').addClass(divId);
//	alert(bgAttr);



	var winHeight=jQuery(window).height();
	var actualHeight = winHeight -73 + 'px'; 
	//var blockHeight = actualHeight / 2;
	//jQuery(".page_inner div").css( 'height',blockHeight);
	jQuery('.inner_content').css('height',actualHeight);
	// jQuery('.isotope_block').css('height',actualHeight);
	jQuery('.home_content').css('height',winHeight);
	// jQuery('.flex-viewport .slides li img').css('height',actualHeight);
	// jQuery('.Sirv').css('height',actualHeight);
	// jQuery('.flex-viewport .slides li img').css('height',actualHeight);
	// jQuery('.home_content').css('height',winHeight);


	})
jQuery(window).load(function(){
function cartButton() {
	//var winHeight=jQuery(window).height();
	var myPosition = jQuery(window).height() - 146;
	jQuery('.cart.deskstop').css('top', myPosition);
	//jQuery('.flex-viewport .slides li').height(jQuery(window).height());
	//jQuery('.flex-viewport .slides li img').css({height: jQuery(window).height()});	
	//jQuery('#box-360').css({height: jQuery(window).height()});	
	console.log(myPosition);
}
cartButton();
if ( jQuery(window).width() > 768 ){

function fullScreenSlider() {
 var winWidth = jQuery(window).width();
 //jQuery('.thumb_slider').addClass('desk');
 var winHeight = jQuery(window).height()-73;
	  var winHeight360 = jQuery(window).height()-73;
	 jQuery('.slide_img').css({
	  height: winHeight,
	  width: winWidth 
	 });
	 jQuery('#box-360').css({
	 	height: winHeight360
	 	 });
	}
	fullScreenSlider();


jQuery(window).resize(function() {
	cartButton();
	fullScreenSlider();
});
}

if ( jQuery(window).width() <= 768 ){
function fullScreenSlider() {
 var winWidth = jQuery(window).width();
 //jQuery('.thumb_slider').addClass('mob');
 var winHeight = jQuery(window).height()-150;
	  var winHeight360 = jQuery(window).height();
	 jQuery('.slide_img').css({
	  height: winHeight,
	  width: winWidth 
	 });
	 jQuery('#box-360').css({
	 	height: winHeight360
	 	 });
	}
	fullScreenSlider();


jQuery(window).resize(function() {
	cartButton();
	fullScreenSlider();
});
}


jQuery(document).ready(function(){

jQuery(window).resize(function() {

	var winHeight=jQuery(window).height();
	var actualHeight = winHeight -73 + 'px'; 
	//jQuery('.cart.deskstop').css('top', winHeight);
	jQuery('.inner_content').css('height', actualHeight);
	// jQuery('.flex-viewport .slides li img').css('height', actualHeight);
	// jQuery('.flex-viewport .slides li img').css('width', 'auto');
	jQuery('.home_content').css('height', winHeight);
})
});



// jQuery(document).ready(function(){
// 	var height=jQuery('.item').width();
// 	jQuery('.product_list_page .item').height(height);

// 	jQuery(window).resize(function(){
// 	var height=jQuery('.item').width();
// 	jQuery('.product_list_page .item').height(height);
// 		});
// });

jQuery(document).ready(function(){

	jQuery('body').on("click",".images",function(){
		 console.log('show clicked');
	var my_id=jQuery(this).closest(".radio_button").find("input[type=hidden]").val();//parent(".radio_button").find("input[type=hidden]").val();
	//alert(my_id);
	jQuery(this).closest(".item_content").find("#newsletter_topics_"+my_id).find("span").removeClass("checked");
	//alert(var2);

	jQuery(this).closest(".item_content").find("#newsletter_topics_"+my_id).attr("disabled","disabled");
	jQuery(this).closest(".item_content").find(".radio_button fieldset").css("color","gray");
	

	});

	jQuery('body').on("click",".newsletter",function(){
			var my_id=jQuery(this).closest(".radio_button").find("input[type=hidden]").val();
			jQuery(this).closest(".item_content").find(".radio_button fieldset").removeAttr("style");
	
	//jQuery(this).parent().find("#newsletter_topics").hide();
	jQuery(this).closest(".item_content").find("#newsletter_topics_"+my_id).removeAttr("disabled");
	});
		});
// if ($(window).width()==768) {


// find('img').css({
    
//     'margin-left': -600/ 2 + 'px'
// });

// }

jQuery(window).resize(function() {
	jQuery('#control_nav').removeAttr('style');

if (jQuery(window).width()<=769) {
	
	//var winHeight=jQuery(window).height();
	var winHeight=jQuery(window).height();
	var actualHeight = winHeight + 273; 
	//var myPosition = jQuery(window).height() - 146 + 'px'; 
	jQuery('.cart.deskstop').css('top', actualHeight);
	//jQuery('.cart.mob').css('top', actualHeight);

	//jQuery('.flex-viewport .slides li').height(jQuery(window).height());
	jQuery('.flex-viewport .slides li img').css('height' ,actualHeight);	
	jQuery('#box-360').css('height' ,actualHeight);
	//console.log(actualHeight);


	}
	})
	
});
jQuery(document).ready(function() {
	
	thumbSliderSwitch();
});

function thumbSliderSwitch() {
	 var winWidth = jQuery(window).width();
	 if(winWidth<769){
		  jQuery('#desktop').removeClass('slide-thumb');
		jQuery('#mobile').addClass('slide-thumb');
	// alert (winWidth);
	 } else {
		 //alert(winWidth);
	 //alert (winWidth);
	  jQuery('#mobile').removeClass('slide-thumb'); 
	   jQuery('#desktop').addClass('slide-thumb');
	 }
}

jQuery(window).resize(thumbSliderSwitch);
