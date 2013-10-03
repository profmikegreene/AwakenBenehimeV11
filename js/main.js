 /*
 Author: Michael Greene
*/
// JavaScript Document
/* <![CDATA[ */

/* ==================================================================
*
*   //Begin jQuery
*
* -----------------------------------------------------------------*/
jQuery(document).ready(function($){
/* ==================================================================
*
*   Variables
*
* -----------------------------------------------------------------*/
var $body = $('body');
var $horz_menu__global = $('#horz-menu--global');

var $horz_menu__global_toggle = $horz_menu__global.find(".horz-menu-toggle");
var $horz_menu_list__global = $horz_menu__global.find(".horz-menu-list");
var $window_width = document.body.clientWidth;
var $window_height = document.body.clientHeight;

/* ==================================================================
*
*   Delegations
*
* -----------------------------------------------------------------*/
$(document.body).delegate('#global-search-button', 'focus', focus_search);
$(document.body).delegate('#global-search-button', 'click', focus_search);
$(document.body).delegate('#global-search-button', 'blur', blur_search);
if( $('#site-search:has(.is-active)') ){
	$(document.body).delegate('#global-search-button', 'mouseleave', still_focus_search);

}

/* ==================================================================
*
*   Horizontal Menus
*
* -----------------------------------------------------------------*/

	$('.horz-menu:not(.is-hover-disabled)').each(function() {
		horizontal_hover_dropdown($(this));
	});
	$('.horz-menu.is-hover-disabled').each(function() {
		horizontal_touch_dropdown($(this));
	});

	function close_menus() {
		$('.is-hover').removeClass('is-hover');
	}



	function horizontal_touch_dropdown($menu) {


		var $menu_list = $menu.find('.horz-menu-list');
		$menu.find('.horz-menu-list-item a').each(function() {
			if ($(this).next().length > 0) {
				$(this).addClass("is-parent");
			}
		});

		$menu_list.find("a.is-parent").unbind('click').bind('click', function(e) {
			// must be attached to anchor element to prevent bubbling
			e.preventDefault();
			e.stopPropagation();

			$(this).parent("li").toggleClass("is-hover").siblings().removeClass('is-hover');

		});

		$body.click(function() {
			close_menus();
		});
	}

	function horizontal_hover_dropdown($menu) {
		var $menu_toggle = false;
		if ( $menu.find('.horz-menu-toggle').length ){
			$menu_toggle = $menu.find('.horz-menu-toggle');

			$menu_toggle.click(function(e) {
				e.preventDefault();
				$(this).toggleClass("is-active is-active-dropdown");
				$horz_menu__global.find(".horz-menu-list--global").toggle();
			});
		}

		var $menu_list = $menu.find('.horz-menu-list');

		$menu.find('.horz-menu-list-item a').each(function() {
			if ($(this).next().length > 0) {
				$(this).addClass("is-parent");
			}
		});

		var adjust_menu = function() {
			if ($menu_toggle) {
				if ($window_width < 822) {
					$menu_toggle.css("display", "inline-block");
					if (!$menu_toggle.hasClass("is-active")) {
						$menu_list.hide();
					} else {
						$menu_list.show();
					}
				}
				else if ($window_width >= 822) {
					$menu_toggle.css("display", "none");
				}
			}
			if ($window_width < 822 ) {

				$menu_list.find("li").unbind('mouseenter mouseleave');
				$menu_list.find("a.is-parent").unbind('click').bind('click', function(e) {
					// must be attached to anchor element to prevent bubbling
					e.preventDefault();
					$(this).parent("li").toggleClass("is-hover").siblings().removeClass('is-hover');

				});
			}
			else if ($window_width >= 822) {
				$menu_list.show();
				$menu_list.find("li.horz-menu-list-item").removeClass("is-hover");
				$menu_list.find("li a").unbind('click');
				$menu_list.find("li.horz-menu-list-item").unbind('mouseenter mouseleave').bind('mouseenter mouseleave', function() {
					// must be attached to li so that mouseleave is not triggered when hover over submenu
					$(this).toggleClass('is-hover');
				});
				$menu_list.find("li a.is-parent, input").unbind('click').bind('click', function(e) {
					// must be attached to anchor element to prevent bubbling
					e.preventDefault();
					e.stopPropagation();
				});

			}
		};

	$(window).bind('resize orientationchange', function() {
		$window_width = document.body.clientWidth;
		adjust_menu();
	});
	adjust_menu();
	}



/* ==================================================================
*
*   Vertical Menus
*
* -----------------------------------------------------------------*/
$(".vert-menu--sidebar").find('.menu-item').each(function() {
		if ($(this).find('a').next().length > 0) {
			$(this).addClass("is-parent").prepend('<span class="icon icon-l-dropdown-arrow rcc-blue button button-small"></span>');
		}
	});
$('.vert-menu--sidebar').find(".icon").unbind('click').bind('click', function(e) {
	e.preventDefault();
	$(this).toggleClass('is-active');
				// must be attached to li so that mouseleave is not triggered when hover over submenu
				$(this).siblings('.sub-menu').toggleClass('is-hover');
});

$(window).bind('resize orientationchange', function() {
	$slider_height = $('#new-royalslider-1').find('rsOverflow').height();
});


/* ==================================================================
*
*   Active Data Calendar integration
*
* -----------------------------------------------------------------*/
var adx="Events are temporarily unavailable. Please check back later.";
$.ajax(
	{
		dataType: 'script',
		url: 'http://cal.rappahannock.edu/EventListSyndicator.aspx?type=N&number=5&category=1-0%2c4-0%2c18-0%2c14-0%2c3-0%2c16-0%2c15-0&numdays=3&expire=Y&adpid=5&nem=No+events+are+available+that+match+your+request&sortorder=ASC&browser=new&ver=2.0&target=adx060196'
	}
);
setTimeout(function() {if(typeof response=='undefined'){$('#adx060196').html(adx);}}, 5000);

/* ==================================================================
*
*   Global Search Box
*
* -----------------------------------------------------------------*/
function focus_search(e){
	// $(this).addClass('is-hover');
	// $('.gsc-search-button').addClass('is-hover');
	e.preventDefault();
	e.stopPropagation();
	$('#site-search').addClass('is-active');
}
function blur_search(e){
	// $(this).removeClass('is-hover').siblings('input').removeClass('is-hover');
	$('#site-search').removeClass('is-active');

}
function still_focus_search(e){
	e.stopPropagation();
	// $('#site-search').addClass('is-hover');
}

});//end jQuery


function myVCCSValidate() {
	document.authx.password.value = document.authx.password_temp.value;
	document.authx.password_temp.value = "";
	return true;
}




/* ]]> */