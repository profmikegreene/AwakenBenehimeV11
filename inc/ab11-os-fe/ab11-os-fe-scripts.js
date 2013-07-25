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

var History = window.History;
if (History.enabled) {
    State = History.getState();
    // set initial state to first page that was loaded
    History.pushState({urlPath: window.location.pathname}, $("title").text(), State.urlPath);
} else {
    return false;
}

var loadAjaxContent = function(target, urlBase, selector) {
    $(target).load(urlBase + ' ' + selector);
};

var updateContent = function(State) {
    var selector = '#' + State.data.urlPath.substring(1);
          console.log('in updateContent, url =', State.url);

    if ($(selector).length) { //content is already in #hidden_content
        $('#container-content').children().appendTo('#hidden-container-content');
        $(selector).appendTo('#container-content');
    } else {
        $('#container-content').children().clone().appendTo('#hidden-container-content');
        loadAjaxContent('#container-content', State.url, selector);
    }
};

// Content update and back/forward button handler
History.Adapter.bind(window, 'statechange', function() {
    updateContent(History.getState());
});


// var State = History.getState(); // Note: We are using History.getState() instead of event.state

//  // Bind to StateChange Event
// History.Adapter.bind(window,'statechange',function(){ // Note: We are using statechange instead of popstate
//     var State = History.getState(); // Note: We are using History.getState() instead of event.state
//     get_URL_vars();

// 		if ( State.title == 'get_semester' ){
// 			// get_semester();
// 		}
// });


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

var $container_content = $('#container-content');

var $breadcrumbs_schedule = $container_content.find('#breadcrumbs');
var $list_classes = $container_content.find('#ab11-os-class-list');
var $container_calendar = $container_content.find('#container-calendar');
var $container_cubes = $('#container-cubes');

/* ==================================================================
*
*   Delegations
*
* -----------------------------------------------------------------*/
$(document.body).delegate('#horz-menu-sublist--semesters .select-semester', 'click', get_semester);
$(document.body).delegate('#horz-menu-sublist--subjects .select-subject', 'click', get_courses);

if($list_subjects.length){
		$(document.body).delegate('#hidden-subjects li', {
			mouseenter: tooltip_enter,
			mouseleave: tooltip_leave
		});
	}

// navigation link handler
$('#horz-menu-sublist--semesters .select-semester').on('click', 'a', function(e) {
    var urlPath = $(this).attr('href');
    var title = $(this).text();
    History.pushState({urlPath: urlPath}, title, urlPath);
    // get_semester();
    return false; // prevents default click action of <a ...>
});

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
	console.log( '$data ' + $.type($data) );

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
			// $body.prepend(output);
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
	//grab URL variables and save to the $data object
	get_URL_vars();
	// History.pushState({state:'init', rand:Math.random()}, 'init', '?state=init');
	$data['state'] = State;
}

/* ==================================================================
*
*   Get URL Variables
*
* -----------------------------------------------------------------*/
function get_URL_vars () {
	//Gather options from URL
	var vars = {};
	var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&#]*)/gi, function(m, key, value) {
		vars[key] = value;
	});
	$data['url'] = vars;
}


/* ==================================================================
*
*   Triggers AJAX actions on state change
*
* -----------------------------------------------------------------*/
function trigger_ajax( s ){

	console.log( s );
	// switch( $data['url']['state']){}
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
			// History.pushState({state:'get_semester',data:$data}, "get_semester", "?state=get_semester&semester_id=" + $data['semester_id']);
			$container_calendar.addClass('is-hidden');
			$body.prepend(output);
			$breadcrumbs_schedule.html('<span><a href="#">' + $text + '</a></span>');
			get_subjects();
			$list_classes.empty();
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
			History.pushState({state:'get_calendar',rand:Math.random()}, "get_calendar", "?state=get_calendar&semester_id=" + $data['semester_id']);

			$container_calendar.html(output).removeClass('is-hidden');
			$container_cubes.addClass('is-hidden');
			$breadcrumbs_schedule.append('<span class="separator">&raquo;</span><span><a href="#">Calendar</a></span>')
			.removeClass('is-hidden');

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
	$data['filters'] = {
		'subject' : $(this).data('subject') ? $(this).data('subject') : 'ALL'
	};
	$data['function'] = 'get_courses';
	$.ajax({
		type: 'POST',
		url: AJAX_URL,
		data: $data,
		success: function (output) {
			History.pushState({state:'get_courses',rand:Math.random()}, "get_courses",
				"?state=get_courses&semester_id="	+ $data['semester_id'] +
				stringify_filters( $data['filters'] ) );

			// ab11_os_ajax_test();
			$list_classes.html(output);
			$container_calendar.addClass('is-hidden');
			$list_classes.removeClass('is-hidden').fadeIn();
			$breadcrumbs_schedule.append('<span class="separator">&raquo;</span><span><a href="#">Courses</a></span>')
		}
	});
}

/* ==================================================================
*
*   Hover on tooltip
*
* -----------------------------------------------------------------*/
function tooltip_enter(e){
	var $node = $(e.target);
	var top = $node.position().top;

	$list_subjects.find('div.tooltip').addClass('is-hidden');
	$node.parent().find('.tooltip')
		.css({
			'top': top
		})
		.removeClass('is-hidden');

}

function tooltip_leave(e){

}

function stringify_filters(filters){
	var output = '';
	$.each(filters, function(k, v){
		output += '&' + k + '=' + v;
	});

	return output;
}
});//end jQuery