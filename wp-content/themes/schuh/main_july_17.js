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

jQuery(document).ready(function () {
jQuery('.nav_slide').click(function(e){
		e.preventDefault();
	
		jQuery('.contact_box').slideDown();
		jQuery('.callback_form').removeClass('active');
	})

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
jQuery('.home_content').css('height',winHeight);


})
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