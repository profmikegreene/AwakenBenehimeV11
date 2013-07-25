<?php
// require_once( 'inc/ab11-os-fe/class-ab11-os-fe.php' );

if(!isset($_SESSION)) {
  session_start();
}
if ( !isset( $_SESSION['ab11_os_fe_schedule'] ) ) {
  $_SESSION['ab11_os_fe_schedule'] = new AB11_OS_FE();
}

function ajax_controller () {
	if ( isset( $_SESSION['ab11_os_fe_schedule'] ) ) {
			$ab11_os_fe_schedule = $_SESSION['ab11_os_fe_schedule'];
	} else {
			$_SESSION['ab11_os_fe_schedule'] = new AB11_OS_FE();
			$ab11_os_fe_schedule = $_SESSION['ab11_os_fe_schedule'];

	}

	switch($_POST['function']) {
		case 'ajax_init':
			ajax_init();
	 		break;
		case 'show_semesters':
			$ab11_os_fe_schedule->show_semesters();
	 		break;
		case 'set_semester':
			$ab11_os_fe_schedule->set_semester();
	 		break;
		case 'get_subjects':
			$ab11_os_fe_schedule->get_subjects();
	 		break;
		case 'get_calendar':
			$ab11_os_fe_schedule->get_calendar();
	 		break;
		case 'get_courses':
			$ab11_os_fe_schedule->get_courses();
	 		break;
		case 'test':
			echo 'test';
			$ab11_os_fe_schedule->test();
	 		break;




	}
	die();
}
?>