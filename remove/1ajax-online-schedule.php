<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
require_once( $_SERVER['DOCUMENT_ROOT'] . 'www.wp.dev/wp-load.php' );


	$action = isset( $_GET['action'] ) ? $_GET['action'] : 'none';
	$semester_id = isset( $_GET['semester_id'] ) ? $_GET['semester_id'] : FALSE;
	$career = isset( $_GET['career'] ) ? $_GET['career'] : 'CRED';

	if ( $semester_id ) {
		switch( $action ) {
			case 'get_subjects':
				do_action( 'wp_ajax_ab11_os_get_subjects', array(
					'semester_id' => $semester_id,
					'career' => $career
					));
			break;
			case 'wp_ajax_get_calendar':
				do_action( 'wp_ajax_ab11_os_get_calendar', array(
					'semester_id' => $semester_id
					));
			case 'wp_ajax_test':
				do_action('wp_ajax_ab11_os_test', array('semester_id' => $semester_id));
				break;
			default:
				return 'Default';
				break;
		}
	}
?>