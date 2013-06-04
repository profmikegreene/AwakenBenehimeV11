/* Author: Michael Greene

*/
// JavaScript Document
/* <![CDATA[ */

/* ==================================================================
*
*   //Begin jQuery
*
* -----------------------------------------------------------------*/
$(function() {
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
*   .horz-menu--global Navigation Dropdown
*
* -----------------------------------------------------------------*/
	$horz_menu__global.find('.horz-menu-list-item a').each(function() {
		if ($(this).next().length > 0) {
			$(this).addClass("is-parent");
		}
	});

	$horz_menu__global_toggle.click(function(e) {
		e.preventDefault();
		$(this).toggleClass("is-active is-active-dropdown");
		$horz_menu__global.find(".horz-menu-list--global").toggle();
	});



	$(window).bind('resize orientationchange', function() {
		$window_width = document.body.clientWidth;
		adjust_menu();
	});

	var adjust_menu = function() {
		if ($window_width < 822) {
			$horz_menu__global_toggle.css("display", "inline-block");
			if (!$horz_menu__global_toggle.hasClass("is-active")) {
				$horz_menu_list__global.hide();
			} else {
				$horz_menu_list__global.show();
			}
			$horz_menu_list__global.find("li").unbind('mouseenter mouseleave');
			$horz_menu_list__global.find("a.is-parent").unbind('click').bind('click', function(e) {
				// must be attached to anchor element to prevent bubbling
				e.preventDefault();
				$(this).parent("li").toggleClass("is-hover").siblings().removeClass('is-hover');

			});
		}
		else if ($window_width >= 822) {
			$horz_menu__global_toggle.css("display", "none");
			$horz_menu_list__global.show();
			$horz_menu_list__global.find("li").removeClass("is-hover");
			$horz_menu_list__global.find("li a").unbind('click');
			$horz_menu_list__global.find("li").unbind('mouseenter mouseleave').bind('mouseenter mouseleave', function() {
				// must be attached to li so that mouseleave is not triggered when hover over submenu
				$(this).toggleClass('is-hover');
			});
			$(".horz-menu-list li a.is-parent").unbind('click').bind('click', function(e) {
				// must be attached to anchor element to prevent bubbling
				e.preventDefault();
			});
		}
	};
adjust_menu();


	$(window).bind('resize orientationchange', function() {
		$slider_height = $('#new-royalslider-1').find('rsOverflow').height();
		console.log($slider_height);
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

});//end jQuery


function myVCCSValidate() {
	document.authx.password.value = document.authx.password_temp.value;
	document.authx.password_temp.value = "";
	return true;
}




/* ]]> */