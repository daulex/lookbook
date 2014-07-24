$('.callback .callback_form').click(function(e){
		e.preventDefault();

		if($('.callback .callback_form').hasClass('active')){
			$('.callback_box').slideUp();
			$('.callback .callback_form').removeClass('active');
		}else{
			$('.callback_box').slideDown();
			$('.callback .callback_form').addClass('active');
		}
	})

$('#menu-item-357 a').click(function(){
		if($('#menu-item-357 a').hasClass('active')){
			$('.callback_box').slideUp();
			$('#menu-item-357 a').removeClass('active');
		}else{
			$('.callback_box').slideDown();
			$('#menu-item-357 a').addClass('active');
		}
	})

$(document).ready(function () {
   $('.menu nav').meanmenu();
   // $('.product_list .postww:nth-child(5)').addClass('last')
    $('.product_list .postww:nth-child(6n)').addClass('last1dff')
   // $('.product_list .postww:nth-child(6n)').addClass('last')
   // $('.product_list .postww:nth-child(2n-1)').addClass('last_mob')
   // $('.product_list .postww:nth-child(3)').addClass('last_mob1')
   // $('#menu-main-menu li a:last-child').addClass('nav_slide')
   $('.closebox').click(function(e){
		e.preventDefault();
		$('.callback_box').slideUp();
		$('.callback_form').removeClass('active');
	})
   $('input[type="radio"]').uniform();
  

});

/*$(document).ready(function () {
$('.nav_slide').click(function(e){
		e.preventDefault();
	
		$('.contact_box').slideDown();
	})
$('.slide_up').click(function(e){
		e.preventDefault();
		$('.contact_box').slideUp();
	})
});
*/
// $('.nav_slide a').click(function(e){
// 		e.preventDefault();

// 		if($('.nav_slide a').hasClass('active')){
// 			$('.contact_box').slideUp();
// 			$('.nav_slide a').removeClass('active');
// 		}else{
// 			$('.contact_box').slideDown();
// 			$('.nav_slide a').addClass('active');
// 		}
// 	})

//var varHeight;
//varHeight=window.height();
//$(".page_inner>div").css({ 'height':varHeight});

$(document).ready(function () {
$('.nav_slide').click(function(e){
		e.preventDefault();
	
		$('.contact_box').slideDown();
	})

$('.call_in').click(function(e){
		e.preventDefault();
	
		$('.callback_box').slideDown();
		$('.callback_form').addClass('active');

		  $('.closebox').click(function(e){
		$('.callback_form').removeClass('active');
	})
		

	})
$('.slide_up').click(function(e){
		e.preventDefault();
		$('.contact_box').slideUp();
		$('.mean-nav #menu-main-menu').slideUp();
		$('.mean-bar .meanmenu-reveal').removeClass("meanclose");
							
							

	})
});


var winHeight=$(window).height();

var actualHeight = winHeight -73 + 'px'; 
//var blockHeight = actualHeight / 2;
//$(".page_inner div").css( 'height',blockHeight);
$('.inner_content').css('height',actualHeight);
$('.home_content').css('height',winHeight);




