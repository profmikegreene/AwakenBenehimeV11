<?php
/**
 * Awaken Benehime functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage Awaken_Benehime
 * @since Awaken Benehime V11
 */

if ( ! function_exists( 'ab11_entry_meta' ) ) :
/**
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own ab11_entry_meta() to override in a child theme.
 *
 * @since Awaken Benehime V11
 */
function ab11_entry_meta() {
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'ab11' ) );

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'ab11' ) );

	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date( 'F j, Y' ) )
	);

	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'ab11' ), get_the_author() ) ),
		get_the_author()
	);

	// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
	if ( $tag_list ) {
		$utility_text = __( 'This entry was last edited in %1$s and tagged %2$s on %3$s<span class="by-author"> by %4$s</span>.', 'ab11' );
	} elseif ( $categories_list ) {
		$utility_text = __( 'This entry was last edited in %1$s on %3$s<span class="by-author"> by %4$s</span>.', 'ab11' );
	} else {
		$utility_text = __( 'This entry was last edited on %3$s<span class="by-author"> by %4$s</span>.', 'ab11' );
	}

	printf(
		$utility_text,
		$categories_list,
		$tag_list,
		$date,
		$author
	);
}
endif;

/**
 * Registers our main widget area and the front page widget areas.
 *
 * @since Awaken Benehime V11
 */
function ab11_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'ab11' ),
		'id' => 'sidebar-1',
		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'ab11' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Global Why RCC? Widget', 'ab11' ),
		'id' => 'global-widget-why-rcc',
		'description' => __( 'Appears in global navigation on all pages', 'ab11' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Global Programs & Courses Widget', 'ab11' ),
		'id' => 'global-widget-programs',
		'description' => __( 'Appears in global navigation on all pages', 'ab11' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Global Get Started Widget', 'ab11' ),
		'id' => 'global-widget-get-started',
		'description' => __( 'Appears in global navigation on all pages', 'ab11' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Global Student Services Widget', 'ab11' ),
		'id' => 'global-widget-services',
		'description' => __( 'Appears in global navigation on all pages', 'ab11' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Global Explore RCC Widget', 'ab11' ),
		'id' => 'global-widget-explore',
		'description' => __( 'Appears in global navigation on all pages', 'ab11' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Second Front Page Widget Area', 'ab11' ),
		'id' => 'sidebar-3',
		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'ab11' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'ab11_widgets_init' );



/**
 * Registers our navigation menus.
 *
 * @since Awaken Benehime V11
 */
function ab11_menus_init() {
	register_nav_menus( array(
		'global-menu-why-rcc' => __( 'Global Why RCC? Menu'),
		'global-menu-programs'     => __( 'Global Programs & Courses Menu'),
		'global-menu-get-started'  => __( 'Global Get Started Menu'),
		'global-menu-services'     => __( 'Global Student Services Menu'),
		'global-menu-explore'      => __( 'Global Explore RCC Menu'),
		'sidebar-menu'        => __( 'Sidebar Menu' )
		));
}
add_action( 'init', 'ab11_menus_init' );



/**
 * Extends the default WordPress body class to denote:
 * 1. Using a full-width layout, when no active widgets in the sidebar
 *    or full-width template.
 * 2. Front Page template: thumbnail in use and number of sidebars for
 *    widget areas.
 * 3. White or empty background color to change the layout and spacing.
 * 4. Custom fonts enabled.
 * 5. Single or multiple authors.
 *
 * @since Awaken Benehime V11
 *
 * @param array Existing class values.
 * @return array Filtered class values.
 */
function ab11_body_class( $classes ) {
	$background_color = get_background_color();

	if ( ! is_active_sidebar( 'sidebar-1' ) || is_page_template( 'page-templates/full-width.php' ) )
		$classes[] = 'full-width';

	if ( is_page_template( 'template-front-page.php' ) ) {
		$classes[] = 'template-front-page';
		if ( has_post_thumbnail() )
			$classes[] = 'has-post-thumbnail';
		if ( is_active_sidebar( 'sidebar-2' ) && is_active_sidebar( 'sidebar-3' ) )
			$classes[] = 'two-sidebars';
	}

	if ( empty( $background_color ) )
		$classes[] = 'custom-background-empty';
	elseif ( in_array( $background_color, array( 'fff', 'ffffff' ) ) )
		$classes[] = 'custom-background-white';

	// Enable custom font class only if the font CSS is queued to load.
	if ( wp_style_is( 'twentytwelve-fonts', 'queue' ) )
		$classes[] = 'custom-font-enabled';

	if ( ! is_multi_author() )
		$classes[] = 'single-author';

	return $classes;
}
add_filter( 'body_class', 'ab11_body_class' );

/**
 * Includes required Javascript during init
 *
 * @since Awaken Benehime V11
 *
 * @return HTML script tags.
 */
function ab11_init() {
		if ( !is_admin() ) {
			wp_deregister_script('jquery');
			wp_register_script(
			'jquery',
			"http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js",
			false,
			'1.7.1',
			true);
			wp_enqueue_script('jquery');

			wp_enqueue_script(
			'google_jsapi',
			'https://www.google.com/jsapi?key=ABQIAAAA0DxWBmajUg3-7xSRVQ2q3RRo7kyImI0gdcpnJoA7tSJ7W8_oCBQNAUWA1k40IheM4_liCOjcgVEIwA',
			false,
			'1.5',
			true
		);
		}
}
add_action ('init', 'ab11_init');

/**
 * Extends the default WordPress get_blogs_of_user into
 * a list of blog urls
 *
 * @since Awaken Benehime V11
 *
 * @param array Wordpress blognames to filter from result
 * @return HTML ul of filtered blogs
 */
function ab11_list_blogs( $filters ) {
	//Use the initial superadmin user setup when Wordpress installed,
	//this user is autoamtically added to all blogs
	$blogs = ab11_get_blogs_of_user( 1 );
	$filtered_blogs = array();

	if( is_array( $filters ) ){
		//Filter blogs based on array keys from $filters
		$filtered_blogs = array_diff_key($blogs, $filters);

		//Iterate through $filtered_blogs and output list item
		$i=0;
		foreach($filtered_blogs as $key => $value) {
			if ( $i==0 ){
							echo '<ul class="nav-footer">'."\n";
							echo '<li class="nav'.$i.'"><a class="nav-footer-a" href="'.$value.'">'.$key.'</a></li>'. "\n";
							$i++;
			} elseif ($i>0 && $i<9){
							echo '<li class="nav'.$i.'"><a class="nav-footer-a" href="'.$value.'">'.$key.'</a></li>'. "\n";
							$i++;
			} elseif ($i>=9){
							echo '<li class="nav'.$i.'"><a class="nav-footer-a" href="'.$value.'">'.$key.'</a></li>'. "\n";
							echo '</ul>'."\n";
							$i=0;
			}
			

			//echo '<li><a class="nav-footer-a" href="'.$value.'">'.$key.'</a></li>'. "\n";
		}
		echo '</ul>'."\n";
	}
}
add_action('init', 'ab11_list_blogs');

/**
 * Extends the default WordPress get_blogs_of_user into
 * a sorted array of blognames and blog urls
 *
 * @since Awaken Benehime V11
 *
 * @param int User ID
 * @param bool Whether to return spam, deleted, archived blogs
 * @return array of blogs
 */
function ab11_get_blogs_of_user( $user_id, $all = false ) {
	global $wpdb;

	$user_id = (int) $user_id;

	// Logged out users can't have blogs
	if ( empty( $user_id ) )
		return array();

	$keys = get_user_meta( $user_id );
	if ( empty( $keys ) )
		return array();

	$blogs = array();

	if ( isset( $keys[ $wpdb->base_prefix . 'capabilities' ] ) && defined( 'MULTISITE' ) ) {
		$blog = get_blog_details( 1 );
		if ( $blog && isset( $blog->domain ) && ( $all || ( ! $blog->archived && ! $blog->spam && ! $blog->deleted ) ) ) {
			$blogs[ $blog->blogname ] = $blog->siteurl;
		}
		unset( $keys[ $wpdb->base_prefix . 'capabilities' ] );
	}

	$keys = array_keys( $keys );

	foreach ( $keys as $key ) {
		if ( 'capabilities' !== substr( $key, -12 ) )
			continue;
		if ( $wpdb->base_prefix && 0 !== strpos( $key, $wpdb->base_prefix ) )
			continue;
		$blog_id = str_replace( array( $wpdb->base_prefix, '_capabilities' ), '', $key );
		if ( ! is_numeric( $blog_id ) )
			continue;

		$blog_id = (int) $blog_id;
		$blog = get_blog_details( $blog_id );
		if ( $blog && isset( $blog->domain ) && ( $all || ( ! $blog->archived && ! $blog->spam && ! $blog->deleted ) ) ) {
			$blogs[ $blog->blogname ] = $blog->siteurl;
		}
	}
	ksort($blogs);
	return apply_filters( 'ab11_get_blogs_of_user', $blogs, $user_id, $all );
}
?>
