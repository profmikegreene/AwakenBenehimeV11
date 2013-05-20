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
/* ==================================================================
*
*   Initiation Dropdown menus used across the site
*
* -----------------------------------------------------------------*/
	$($dropdowns.join(', ')).click(function(e){
		e.preventDefault();
		//Define dropdown elements
		var $current_id = $(this).attr('id');
		var $dropdown_id = $(this).siblings('div').attr('id');

		//Toggle states
		if ($(this).hasClass('is-active')) {
			hide_dropdown($current_id, $dropdown_id);
		}else {
			show_dropdown($current_id, $dropdown_id);
		}
	});

/* ==================================================================
*
*   Shows invisiible mask to allow dropdowns to be cancelled by
*   clicking anywhere in the browser window
*
* -----------------------------------------------------------------*/
	function show_dropdown(d,e) {


		//Get the screen height and width
		var mask_height = $(document).height();
		var mask_width = $(window).width();

		//Turn variables into jQuery selectors
		d = '#'+d;
		e = '#'+e;

		//Hide all other dropdowns
		// if( $('#responsiveMenu').is(':visible')){
		// 	$(d).siblings().hide().removeClass('activeDropdown');
		// 	console.log('showDropdown if '+d+' '+e);
		// }else {
			$('div.is-active-dropdown').hide().siblings().removeClass('is-active');

			console.log('show_dropdown else '+e);

		// }
		//Show current dropdown
		$(d).addClass('is-active');
		$(e).addClass('is-active-dropdown').show();

		//Set mask size to fill up the whole screen and show mask
		$mask.css({'width':mask_width,'height':mask_height}).show();
	}//end showDropdown

/* ==================================================================
*
*   Hides dropdown elements and mask
*
* -----------------------------------------------------------------*/
	function hide_dropdown(d,e) {
		//Turn variables into jQuery selectors
		d = '#'+d;
		e = '#'+e;
		if(e!=='responsiveDropdownMenu'){
			$(e).removeClass('is-active-dropdown').hide().removeClass('is-active');
			console.log('hide_dropdown');
		}
		$mask.hide();
		$(d).removeClass('is-active');
	}//end hideDropdown
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