<?php


function ab11_os_fe_scripts(){
	if( is_page_template( 'template-online-schedule.php' ) ) {
		wp_enqueue_script(
			'ab11_os_fe_scripts',
			get_template_directory_uri() . '/js/online-schedule.js',
			array( 'jquery' ),
			'1.0',
			true
		);
		wp_localize_script( 'ab11_os_ajax_request', 'ab11_os_ajax_request', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );

	}
}
add_action( 'wp_enqueue_scripts', 'ab11_os_fe_scripts' );



?>