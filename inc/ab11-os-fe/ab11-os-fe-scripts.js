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
var PLUGIN_DIR = '/wp-content/plugins/ab11-online-schedule';
var THEME_DIR = '/wp-content/themes/AwakenBenehimeV11';
var AJAX_URL = ab11_os_ajax_request.ajaxurl;

var $body = $('body');
$body.data('ab11-os', {} );
var $data = $body.data('ab11-os');
$data['action'] = 'ab11_os_ajax';
// $data['filters'] = {};
// $data['filters'].subject = '';
// $data['filters'].time = '';
// $data['filters'].day = '';
// $data['filters'].session = '';
// $data['filters'].location = '';

var $options_bar = $('#horz-menu--options-bar');

var $button_semesters = $options_bar.find('#horz-menu-list-item--semesters');
var $list_semesters = $options_bar.find('#horz-menu-sublist--semesters');
var $dropdown_semesters = $options_bar.find('#hidden-semesters');

var $button_subjects = $options_bar.find('#horz-menu-list-item--subjects');
var $list_subjects = $options_bar.find('#horz-menu-sublist--subjects');
var $dropdown_subjects = $options_bar.find('#hidden-subjects');


var $button_options = $options_bar.find('#horz-menu-list-item--options');
var $list_options = $options_bar.find('#horz-menu-sublist--options');
var $dropdown_options = $options_bar.find('#hidden-options');

var $container_ajax = $('#container-ajax');

var $breadcrumbs_schedule = $('#breadcrumbs');
var $list_classes = $container_ajax.find('#ab11-os-class-list');
var $container_calendar = $container_ajax.find('#container-calendar');
var $container_cubes = $('#container-cubes');

/* ==================================================================
*
*   Delegations
*
* -----------------------------------------------------------------*/
$(document.body).delegate('#horz-menu-sublist--semesters .select-semester', 'click', get_semester);
$(document.body).delegate('#horz-menu-sublist--subjects .select-subject', 'click', get_courses);
$(document.body).delegate('#ab11-os-class-list .course', 'click', get_course_detail);
$(document.body).delegate('#options-submit', 'click', save_options);

if($list_subjects.length){
		$(document.body).delegate('#hidden-subjects li', {
			mouseenter: ab11_tooltip_enter,
			mouseleave: ab11_tooltip_leave
		});
	}

/* ==================================================================
*
*   History
*
* -----------------------------------------------------------------*/
var $state = History.getState(); // Note: We are using History.getState() instead of event.state
// var $state_toggle = true;
//  // Bind to StateChange Event
History.Adapter.bind(window,'statechange',function(){ // Note: We are using statechange instead of popstate
	$state = History.getState(); // Note: We are using History.getState() instead of event.state
});
//   get_URL_vars();

// 	if ( $state_toggle == true){
// 		$state = History.getState(); // Note: We are using History.getState() instead of event.state
// 		if ( $state.id == $('#hidden-container-content div').prop('id')){
// 			var $clone = $('#' + $state.id).clone();


// 			$container_ajax.html($clone);
// 		}
// 		console.log('T ' + $state.id);
// 	} else {
// 		var $clone = $container_ajax.clone();
// 		$clone.prop('id', $state.id);
// 		$clone.appendTo('#hidden-container-content');
// 		console.log('F ' + $state.id);

// 	}

// 	$state_toggle = true;
// });

/* ==================================================================
*
*   Call the init function to get things rolling
*
* -----------------------------------------------------------------*/
init();


/* ==================================================================
*
*   Debugging for #data
*   REMOVE FOR PRODUCTION
*
* -----------------------------------------------------------------*/
$body.click(function() {
});

function ab11_os_ajax_test() {
	console.log( '$_POST $data ' + $.type($data) );

	$.each($data, function (key, value) {
		if ( value === Object(value) ) {
			console.log( key + ' :');
			console.log('  Object {');
			$.each(value, function (key2, value2) {
				console.log('    ' + key2 + ' : ' + value2 );
			});
			console.log('  }');
		} else {
			console.log( key + ' : ' + value );
		}
	});
	console.log( ' ' );
}

function ab11_os_php_test(){
	$data['function'] = 'test';
	$.ajax({
		type: 'POST',
		url: AJAX_URL,
		data: $data,
		success: function (output) {
			console.log( 'PHP Output' );
			console.log( output );
			console.log( ' ' );
		}
	});
}

/* ==================================================================
*
*   Initialize the web app
*
* -----------------------------------------------------------------*/
function init(e) {
	get_URL_vars();
	if( $data['url'] ){

		$.ajax({
			type: 'POST',
			url: AJAX_URL,
			data: $data,
			success: function (output) {
				ab11_os_ajax_test();
				ab11_os_php_test();
				$container_ajax.addClass('is-hidden').html(output).fadeIn().removeClass('is-hidden');
				$data['url'] = false;
			}
		});
	}

}

/* ==================================================================
*
*   Get URL Variables
*
* -----------------------------------------------------------------*/
function get_URL_vars () {
	//Gather options from URL
	$data['url'] = false;

	var vars = {};
	var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&#]*)/gi, function(m, key, value) {

		vars[key] = value;
		$data[key] = value;
		$data['url'] = true;
	});
}


/* ==================================================================
*
*   Select a Semester
*
* -----------------------------------------------------------------*/
function get_semester(e) {
	if ( e ) {
		e.preventDefault();
	}
	var $text = $(this).text();

	$data['semester_id'] = $(this).data('semester-id');
	$data['career'] = $(this).data('career');
	$data['function'] = 'get_semester';
	$.ajax({
		type: 'POST',
		url: AJAX_URL,
		data: $data,
		success: function (output) {
							ab11_os_ajax_test();

			History.pushState(
				{state:'get_semester', rand:Math.random()},
				"Online Schedule::RCC",
				"?function=get_semester&semester_id=" + $data['semester_id'] +
				"&career=" + $data['career']);
			$body.prepend(output);
			get_subjects();
		}
	});
}

/* ==================================================================
*
*   Get subjects for a particular semester and career
*
* -----------------------------------------------------------------*/
function get_subjects(e){
	$data['function'] = 'get_subjects';
	$.ajax({
		type: 'POST',
		url: AJAX_URL,
		data: $data,
		success: function (output) {
			$button_semesters.removeClass('is-hover');
			$button_subjects.removeClass('is-disabled');
			$list_subjects.html(output);

			if ( $data['career'] == 'CRED' ) {
				get_calendar();
			} else {
				get_courses();
			}
		}
	});
}

/* ==================================================================
*
*   Get calendar for Credit semester
*
* -----------------------------------------------------------------*/
function get_calendar(e){
	$data['function'] = 'get_calendar';
	$.ajax({
		type: 'POST',
		url: AJAX_URL,
		data: $data,
		success: function (output) {

			$container_ajax.addClass('is-hidden').html(output).fadeIn().removeClass('is-hidden');

			History.pushState(
				{state:'get_calendar', rand:Math.random()},
				"Online Schedule::RCC",
				"?function=get_calendar&semester_id=" + $data['semester_id'] +
				"&career=" + $data['career']);

		}
	});
}

/* ==================================================================
*
*   Get courses for a particular semester, career, and subject heading
*
* -----------------------------------------------------------------*/
function get_courses(e) {
	if ( e ) {
		e.preventDefault();
	}
	$data['filter-subject'] = $(this).data('subject') ? $(this).data('subject') : 'ALL';

	$data['function'] = 'get_courses';
	$.ajax({
		type: 'POST',
		url: AJAX_URL,
		data: $data,
		success: function (output) {
			$container_ajax.addClass('is-hidden').html(output).fadeIn().removeClass('is-hidden');
			// ab11_os_ajax_test();
			// ab11_os_php_test();


			History.pushState(
				{state:'get_courses',rand:Math.random()},
				"Online Schedule::RCC",
				"?function=get_courses&semester_id="	+ $data['semester_id'] +
				"&career=" + $data['career'] +
				ab11_stringify_filters( $data ) );
			// get_URL_vars();
		}
	});
}

/* ==================================================================
*
*   Get detailed course info
*
* -----------------------------------------------------------------*/
function get_course_detail(e){
	if ( e ) {
		e.preventDefault();
	}
	$('#mask').fadeIn().removeClass('is-hidden');
	$data['course_number'] = $(this).find('li.course-number').html();
	$data['function'] = 'get_course_detail';
	$.ajax({
		type: 'POST',
		url: AJAX_URL,
		data: $data,
		success: function (output) {
			$('#modal-course-detail').find('#course-detail').html(output).fadeIn();
			$('#modal-course-detail').removeClass('is-hidden').addClass('is-active');

			center_modal($('#modal-course-detail'));
			close_modal();

			History.pushState(
				{state:'get_course_detail',rand:Math.random()},
				"Online Schedule::RCC",
				"?function=get_course_detail&semester_id="	+ $data['semester_id'] +
				"&career=" + $data['career'] +
				"&course_number=" + $data['course_number'] +
				ab11_stringify_filters( $data ) );
		}
	});
}


/* ==================================================================
*
*   Save Options
*
* -----------------------------------------------------------------*/
function save_options(e){
	$data['filter-time'] = $('input.time:checked').val();
	$data['filter-location'] = $('input.location:checked').map(function(i,n){
		return $(n).val();
	}).get();
	$data['filter-mode'] = $('input.mode:checked').map(function(i,n){
		return $(n).val();
	}).get();
	$data['filter-mode'] = $('input.day:checked').map(function(i,n){
		return $(n).val();
	}).get();
	ab11_os_ajax_test();
	return false;
}
/* ==================================================================
*
*   Close Modals
*
* -----------------------------------------------------------------*/
function close_modal(e){
	if ( e ) {
		e.preventDefault();
	}

	$('#mask, .modal-close').click(function(evt) {
		$('.modal').removeClass('is-active');
		$('#mask').fadeOut().addClass('is-hidden');
		evt.stopPropagation();

	});
}

/* ==================================================================
*
*   Center Modal
*
* -----------------------------------------------------------------*/
function center_modal($modal){
	var top, left, height;

  top = Math.max($(window).height() - $modal.outerHeight(), 0) / 2;
  left = Math.max($(window).width() - $modal.outerWidth(), 0) / 2;
  height = $modal.find('.modal-content').height();
  $modal.css({
      top:top + $(window).scrollTop(),
      left:left + $(window).scrollLeft(),
      height:height
  });
}
/* ==================================================================
*
*   Hover on tooltip
*
* -----------------------------------------------------------------*/
function ab11_tooltip_enter(e){
	var $node = $(e.target);
	var top = $node.position().top;

	$list_subjects.find('div.tooltip').addClass('is-hidden');
	$node.parent().find('.tooltip')
		.css({
			'top': top
		})
		.removeClass('is-hidden');

}

function ab11_tooltip_leave(e){

}

function ab11_stringify_filters( data ){
	var output = '';
	$.each(data, function(k, v){
		if (v.length && k.indexOf('filter-') != -1 ){
					output += '&' + k + '=' + v;

		}
	});

	return output;
}

});//end jQuery