function replaceAll(find, replace, str) {
  return str.replace(new RegExp(find, 'g'), replace);
}

window.Schuh = window.Schuh || {};

Schuh.vars = {
	debug: true,
	winHeight: null,
	winWidth: null
};

Schuh.lib = {



	getViewport: function(type) {
		var viewPortWidth;
		var viewPortHeight;
		// the more standards compliant browsers (mozilla/netscape/opera/IE7) use window.innerWidth and window.innerHeight
		if (typeof window.innerWidth != 'undefined') {
			viewPortWidth = window.innerWidth;
			viewPortHeight = window.innerHeight;
		}
		// IE6 in standards compliant mode (i.e. with a valid doctype as the first line in the document)
		else if (typeof document.documentElement !== 'undefined' && typeof document.documentElement.clientWidth != 'undefined' && document.documentElement.clientWidth !== 0) {
			viewPortWidth = document.documentElement.clientWidth;
			viewPortHeight = document.documentElement.clientHeight;
		}
		// older versions of IE
		else {
			viewPortWidth = document.getElementsByTagName('body')[0].clientWidth;
			viewPortHeight = document.getElementsByTagName('body')[0].clientHeight;
		}

		// return
		if (type == 'width') {
			return viewPortWidth;
		} else {
			return viewPortHeight;
		}
	},

	log: function(text) {

		if (Schuh.vars.debug == true && typeof(console) !== 'undefined') {
			console.log(text);
		}
	},

	bindCarouselClicks:function(){
		$(document).on("click", ".cycle-carousel-wrap img", function(){

			if ($(this).attr("data-sku").length && $(this).attr("data-post-id").length){
				var sku = $(this).attr("data-sku");
				var pid = $(this).attr("data-post-id");
				$('.cart .add').attr("onclick", "call_to_add("+pid+","+sku+");");
			}
		});
	},
	dynamicify:function(){
		Schuh.lib.cartButton();
		if(Schuh.vars.winWidth > 768){
			//load the full slider
				//Schuh.lib.log("loading the full slider");
				var winWidth = jQuery(window).width();
				var winHeight = jQuery(window).height() - 73;
				var winHeight360 = jQuery(window).height() - 73;

				jQuery('.slide_img').css({"height": winHeight,"width": winWidth});
				jQuery('#box-360').css({"height": winHeight360});

		}
		else {
		 var winWidth = jQuery(window).width();
		 //jQuery('.thumb_slider').addClass('mob');

		 var winHeight = jQuery(window).height()-73;
			  var winHeight360 = jQuery(window).height();
			  var mastHead =jQuery('#masthead').height();
			  var FootHead =jQuery('#mobile').height() + jQuery('.cart.mob').height();
			  var SlideHeight = winHeight360-(mastHead+FootHead);
			 jQuery('.slide_img').css({
			  height: SlideHeight,
			  width: winWidth
			 });
			 jQuery('#box-360').css({
			 	height: SlideHeight
			 	 });


		}
		Schuh.lib.cartButton();
	},
	cartButton: function(){
		var myPosition = jQuery(window).height() - 146;
		jQuery('.cart.deskstop').css('top', myPosition);

		//Schuh.lib.log(myPosition);
	},
	bindOrientationChange:function(){
		$(window).bind('orientationchange', function(e) {
			switch (window.orientation) {
				case 0:
					Schuh.lib.dynamicify();
					//portrait mode
					break;
				case 90:
					//turned to the right
					Schuh.lib.dynamicify();
					break;
				case -90:
					//turned to the left
					Schuh.lib.dynamicify();
					break;
				case -180:
					//turned to the left
					Schuh.lib.dynamicify();
					break;
				case 180:
					//turned to the left
					Schuh.lib.dynamicify();
					break;
			}
		});
	},
	bindMagnification:function(){
		jQuery('body').on("click", ".images", function() {
			Schuh.lib.log('show clicked');
			var my_id = jQuery(this).closest(".radio_button").find("input[type=hidden]").val(); //parent(".radio_button").find("input[type=hidden]").val();
			jQuery(this).closest(".item_content").find("#newsletter_topics_" + my_id).find("span").removeClass("checked");
			jQuery(this).closest(".item_content").find("#newsletter_topics_" + my_id).attr("disabled", "disabled");
			jQuery(this).closest(".item_content").find(".radio_button fieldset").css("color", "gray");
		});
	},
	bindResize:function(){
		jQuery(window).smartresize(function(){
			Schuh.vars.winHeight = Schuh.lib.getViewport('height');
			Schuh.vars.winWidth = Schuh.lib.getViewport('width');
			//Schuh.lib.log("window height: " + Schuh.vars.winHeight);
			//Schuh.lib.log("window width: " + Schuh.vars.winWidth);

			Schuh.lib.dynamicify();
		});
	},
	init: function() {
		if(Schuh.vars.debug){
			//console.log("DEBUG MODE: ON");
		}

		//Schuh.lib.log("initialising lib");
		Schuh.vars.winHeight = Schuh.lib.getViewport('height');
		Schuh.vars.winWidth = Schuh.lib.getViewport('width');
		Schuh.lib.bindResize();
		Schuh.lib.bindCarouselClicks();
		Schuh.lib.bindOrientationChange();
		Schuh.lib.dynamicify();
	}
};

jQuery(document).ready(Schuh.lib.init);








jQuery('.callback .callback_form').on('click', function(e) {
	e.preventDefault();

	if (jQuery('.callback .callback_form').hasClass('active')) {
		jQuery('.callback_box').slideUp();
		jQuery('.callback .callback_form').removeClass('active');
	} else {
		jQuery('.callback_box').slideDown();
		jQuery('.callback .callback_form').addClass('active');
	}
});

jQuery(document).on('click', '#menu-item-357 a', function() {
	if (jQuery('#menu-item-357 a').hasClass('active')) {
		jQuery('.callback_box').slideUp();
		jQuery('#menu-item-357 a').removeClass('active');
	} else {
		jQuery('.callback_box').slideDown();
		jQuery('#menu-item-357 a').addClass('active');
	}
});

jQuery(document).ready(function() {
	jQuery('.menu nav').meanmenu();

	jQuery('.product_list .postww:nth-child(6n)').addClass('last1dff');

	jQuery('body').on("click", ".closebox", function(e) {
		e.preventDefault();
		jQuery('.callback_box').slideUp();
		jQuery('.callback_form').removeClass('active');
	});
	jQuery('input[type="radio"]').uniform();


});


jQuery(document).on("click", ".nav_slide", function(e) {
	e.preventDefault();

	if (jQuery('.nav_slide').hasClass('active')) {
		jQuery('.contact_box').slideUp();
		jQuery('.nav_slide').removeClass('active');
	} else {
		jQuery('.contact_box').slideDown();
		jQuery('.nav_slide').addClass('active');
	}
});

jQuery(document).ready(function() {
	jQuery('.call_in').on('click', function(e) {
		e.preventDefault();

		jQuery('.callback_box').slideDown();
		jQuery('.callback_form').addClass('active');

		jQuery('.closebox').on('click', function(e) {
			jQuery('.callback_form').removeClass('active');
		});


	});
	jQuery(document).on('click', '.slide_up', function(e) {
		e.preventDefault();
		jQuery('.contact_box').slideUp();
		jQuery('.nav_slide').removeClass('active');
		jQuery('.mean-nav #menu-main-menu').slideUp();
		jQuery('.mean-bar .meanmenu-reveal').removeClass("meanclose");
	});
	jQuery(document).on("click", '.mean-bar .meanmenu-reveal', function(){
		jQuery('.nav_slide').removeClass("active");
		jQuery('.contact_box').slideUp();

	});
	jQuery(".slider_container").each(function() {

		var bgAttr = jQuery('.slider_container .flex-active-slide').attr('databg');
		jQuery(this).css('background', bgAttr);
	});

	var bgAttr = jQuery('.slider_container .flex-active-slide').attr('databg');
	jQuery(this).css('background', bgAttr);
	var divId = jQuery('.slider_container .flex-active-slide>div').attr('id');
	jQuery('body').addClass(divId);




	var winHeight = jQuery(window).height();
	var actualHeight = winHeight - 73 + 'px';
	jQuery('.inner_content').css('height', actualHeight);
	jQuery('.home_content').css('height', winHeight);



});
jQuery(window).load(function() {
	Schuh.lib.dynamicify();
});
jQuery(window).load(function() {



	jQuery(document).ready(function() {

		// jQuery(window).resize(function() {

		// 	var winHeight = jQuery(window).height();
		// 	var actualHeight = winHeight - 73 + 'px';
		// 	//jQuery('.cart.deskstop').css('top', winHeight);
		// 	jQuery('.inner_content').css('height', actualHeight);
		// 	// jQuery('.flex-viewport .slides li img').css('height', actualHeight);
		// 	// jQuery('.flex-viewport .slides li img').css('width', 'auto');
		// 	jQuery('.home_content').css('height', winHeight);
		// });
	});



	jQuery(document).ready(function() {



		jQuery('body').on("click", ".newsletter", function() {
			var my_id = jQuery(this).closest(".radio_button").find("input[type=hidden]").val();
			jQuery(this).closest(".item_content").find(".radio_button fieldset").removeAttr("style");

			jQuery(this).closest(".item_content").find("#newsletter_topics_" + my_id).removeAttr("disabled");
		});
	});

	// jQuery(window).resize(function() {
	// 	jQuery('#control_nav').removeAttr('style');

	// 	if (jQuery(window).width() <= 769) {


	// 		var winHeight = jQuery(window).height();
	// 		var actualHeight = winHeight + 273;

	// 		jQuery('.cart.deskstop').css('top', actualHeight);

	// 		jQuery('.flex-viewport .slides li img').css('height', actualHeight);
	// 		jQuery('#box-360').css('height', actualHeight);
	// 		Schuh.lib.log(actualHeight);


	// 	}
	// });

});
jQuery(document).ready(function() {

	thumbSliderSwitch();
});

function thumbSliderSwitch() {
	var winWidth = jQuery(window).width();
	if (winWidth < 769) {
		jQuery('#desktop').removeClass('slide-thumb');
		jQuery('#mobile').addClass('slide-thumb');

	} else {

		jQuery('#mobile').removeClass('slide-thumb');
		jQuery('#desktop').addClass('slide-thumb');
	}
}
