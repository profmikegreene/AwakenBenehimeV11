<?php
	/*
Template Name: Semester Calendar
*/
require_once($_SERVER['DOCUMENT_ROOT'].'www.wp.dev/wp-load.php' );

// require( $_SERVER['DOCUMENT_ROOT'].'/wp-load.php' );

//global $wpdb;
$semester = $_GET['semester_id'];
$semester_id = substr($semester,3, 1);
 
	if($semester_id == 2){
		$page_id = 8; 
		$page_data = get_page( $page_id ); 
		$content = $page_data->post_content; 
		echo $page_data->post_content;
	}
	elseif($semester_id == 3){
		$page_id = 10; 
		$page_data = get_page( $page_id ); 
		$content = $page_data->post_content; 
		echo $page_data->post_content;
	}
	elseif($semester_id == 4){
		$page_id = 105; 
		$page_data = get_page( $page_id ); 
		$content = $page_data->post_content; 
		echo $page_data->post_content;
		
	}
	
	else {
		
		echo 'invalid semester';
	}
	
?>