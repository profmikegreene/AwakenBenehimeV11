/* Author: Michael Greene

*/
// JavaScript Document
/* <![CDATA[ */

//Begin jQuery
$(function() {
/* ==================================================================
*
*   Variables
*
* -----------------------------------------------------------------*/
	var $mask = $('#mask');
	var $dropdowns = [
			'#global-myrcc',
			'#more-links',
			'#people-nav',
			'#about-nav',
			'#academics-nav',
			'#admissions-nav',
			'#departments-nav',
			'#library-nav',
			'#workforce-nav'
		];
	var $body = $('body');
	var $global_nav = $('#global-nav');
	var $window_width = document.body.clientWidth;

/* ==================================================================
*
*   .horz-menu--global Navigation Dropdown
*
* -----------------------------------------------------------------*/
	$(".horz-menu-list li a").each(function() {
		if ($(this).next().length > 0) {
			$(this).addClass("is-parent");
		}
	});

	$(".horz-menu-toggle").click(function(e) {
		e.preventDefault();
		$(this).toggleClass("is-active");
		$(".horz-menu-list").toggle();
	});



	$(window).bind('resize orientationchange', function() {
		$window_width = document.body.clientWidth;
		adjust_menu();
	});

	var adjust_menu = function() {
		if ($window_width < 767) {
			$(".horz-menu-toggle").css("display", "inline-block");
			if (!$(".horz-menu-toggle").hasClass("is-active")) {
				$(".horz-menu-list").hide();
			} else {
				$(".horz-menu-list").show();
			}
			$(".horz-menu-list li").unbind('mouseenter mouseleave');
			$(".horz-menu-list li a.is-parent").unbind('click').bind('click', function(e) {
				// must be attached to anchor element to prevent bubbling
				e.preventDefault();
				$(this).parent("li").toggleClass("is-hover");
			});
		}
		else if ($window_width >= 767) {
			$(".horz-menu-toggle").css("display", "none");
			$(".horz-menu-list").show();
			$(".horz-menu-list li").removeClass("is-hover");
			$(".horz-menu-list li a").unbind('click');
			$(".horz-menu-list li").unbind('mouseenter mouseleave').bind('mouseenter mouseleave', function() {
				// must be attached to li so that mouseleave is not triggered when hover over submenu
				$(this).toggleClass('is-hover');
			});
		}
	};
adjust_menu();
/* ==================================================================
*
*   Allow users to click anywhere onscreen to remove dropdown
*
* -----------------------------------------------------------------*/
	$('#mask').click(function(e){
		$('.activeDropdown, .activeResponsiveDropdown').hide().removeClass('activeResponsiveDropdown activeDropdown active').siblings().removeClass('active');
		$(this).hide();
	});
});//end jQuery


function myVCCSValidate() {
	document.authx.password.value = document.authx.password_temp.value;
	document.authx.password_temp.value = "";
	return true;
}




/* ]]> */