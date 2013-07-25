<?php
class AB11_Has_Royal_Slider {
	static $add_script;

	static function init() {
		add_shortcode('ab11_has_royal_slider', array(__CLASS__, 'handle_shortcode'));

		add_action('init', array(__CLASS__, 'register_script'));
		add_action('wp_footer', array(__CLASS__, 'print_script'));
	}

	static function handle_shortcode($atts) {
		self::$add_script = true;

	}

	static function register_script() {
		wp_register_script('royal_slider_adaptive_images', get_template_directory_uri() . '/js/royal-slider-adaptive-images.js', array('jquery'), '1.0', true);
	}

	static function print_script() {
		if ( ! self::$add_script )
			return;

		wp_print_scripts('royal_slider_adaptive_images');
	}
}

AB11_Has_Royal_Slider::init();
?>