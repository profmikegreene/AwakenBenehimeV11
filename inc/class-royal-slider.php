<?php
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'billboard_full', 1680, 622 );
    add_image_size( 'billboard_large', 1280, 474 );
    add_image_size( 'billboard_tablet', 851, 315 );
    add_image_size( 'billboard_mobile', 719, 266 );
}

/**
 * Extends the Royal Slider plugin for adaptive images
 * based on screen size to increase performance
 *
 * @since Awaken Benehime V11
 *
 * @param array post
 * @param array options
 * @return variable
 */

// Create PHP class that will hold methods
class MyRoyalSliderRendererHelper {
    private $post;
    private $options;
    private $thumbnail;
    function __construct( $data, $options ) {
        // $data variable holds WordPress post object only for Posts Slider
        // for other types sliders it holds just data associated with slide, print it to see what's inside
        $this->post = $data;
        // slider options (that you choose in right sidebar)
        $this->options = $options;
    }
    function billboard_full() {
    	$this->thumbnail = wp_get_attachment_image_src( $this->post['image']['attachment_id'], 'billboard_full' );
      return $this->thumbnail[0];
    }
    function billboard_large() {
    	$this->thumbnail = wp_get_attachment_image_src( $this->post['image']['attachment_id'], 'billboard_large' );
      return $this->thumbnail[0];
    }
    function billboard_tablet() {
    	$this->thumbnail = wp_get_attachment_image_src( $this->post['image']['attachment_id'], 'billboard_tablet' );
      return $this->thumbnail[0];
    }
    function billboard_mobile() {
    	$this->thumbnail = wp_get_attachment_image_src( $this->post['image']['attachment_id'], 'billboard_mobile' );
      return $this->thumbnail[0];
    }
    function post_id() {
       // return var_dump($this->post);
    }
}

/**
 * @param  [object] $m       Mustache_Engine object 
 * @param  [object] $data    Object with slide data (for example for posts slider it's WordPress Post Object)
 * @param  [object] $options Array of RoyalSlider options
 */
add_filter('new_rs_slides_renderer_helper', 'newrs_add_custom_variables', 10, 4);
function newrs_add_custom_variables($m, $data, $options) {

    // initialize helper class
    $helper = new MyRoyalSliderRendererHelper($data, $options);

    // add {{hello_world}} variable that gets data from hello_world function of MyRoyalSliderRendererHelper class
    $m->addHelper('billboard_full', array($helper, 'billboard_full') );
    $m->addHelper('billboard_large', array($helper, 'billboard_large') );
    $m->addHelper('billboard_tablet', array($helper, 'billboard_tablet') );
    $m->addHelper('billboard_mobile', array($helper, 'billboard_mobile') );

    // same, but for post_id
    $m->addHelper('post_id', array($helper, 'post_id') );
}
?>