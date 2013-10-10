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




function ab11_mail_from($old) {
 return 'webmaster@rappahannock.edu';
}
add_filter('wp_mail_from', 'ab11_mail_from');

function ab11_mail_from_name($old) {
 return 'Webmaster';
}
add_filter('wp_mail_from_name', 'ab11_mail_from_name');

// remove junk from wp_head
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);

function ab11_admin_area_favicon() {
	$favicon_url = get_bloginfo('template_directory') . '/img/favicon.ico';
	echo '<link rel="shortcut icon" href="' . $favicon_url . '" />';
}
add_action('admin_head', 'ab11_admin_area_favicon');

// add post thumbnail support to posts and pages
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );
    add_image_size( 'billboard_page', 1366, 360 );
}
add_theme_support( 'comments', array( 'post', 'page' ) );

function ab11_add_toolbar_node( $wp_admin_bar ) {
	global $current_user;
  $pages = array(
    'id' => 'view-pages',
    'title' => 'View Pages',
    'href' => get_bloginfo('wpurl').'/wp-admin/edit.php?post_type=page',
    'meta' => array('class' => 'my-toolbar-page'),
    'parent' => 'site-name'
  );
  $wp_admin_bar->add_node($pages);

  $network_plugins = array(
	  'id' => 'network-plugins',
	  'title' => 'Plugins',
	  'href' => '/wp-admin/network/plugins.php',
	  'meta' => array('class' => 'my-toolbar-page'),
	  'parent' => 'network-admin'
  );
  $wp_admin_bar->add_node($network_plugins);

  $wp_admin_bar->remove_node('comments');
  $wp_admin_bar->remove_menu('wp-logo');
  $wp_admin_bar->remove_menu('about');
  $wp_admin_bar->remove_menu('wporg');
  $wp_admin_bar->remove_menu('documentation');
  $wp_admin_bar->remove_menu('support-forums');
  $wp_admin_bar->remove_menu('feedback');
  $wp_admin_bar->remove_menu('view-site');
  $wp_admin_bar->remove_menu('new-link');
  $wp_admin_bar->remove_menu('network-admin-v');
  $wp_admin_bar->remove_menu('network-admin-d');

	$current_user_blogs = get_blogs_of_user( $current_user->ID, $all = false );
	foreach ($current_user_blogs as $blog) {
		$base = 'blog-'.$blog->userblog_id;
		$dashboard = $base.'-d';
		$comments = $base.'-c';
		$post = $base.'-n';

		$wp_admin_bar->remove_menu($dashboard);
		$wp_admin_bar->remove_menu($comments);
		$wp_admin_bar->remove_menu($post);

	  $blogs_pages = array(
	    'id' => 'blog-'.$blog->userblog_id.'-p',
	    'title' => 'Pages',
	    'href' => $blog->siteurl.'/wp-admin/edit.php?post_type=page',
	    'meta' => array('class' => 'my-toolbar-page'),
	    'parent' => $base
	  );
	  $wp_admin_bar->add_node($blogs_pages);

	  $blogs_plugins = array(
	    'id' => 'blog-'.$blog->userblog_id.'-pl',
	    'title' => 'Plugins',
	    'href' => $blog->siteurl.'/wp-admin/plugins.php',
	    'meta' => array('class' => 'my-toolbar-page'),
	    'parent' => $base
	  );
	  $wp_admin_bar->add_node($blogs_plugins);

	  $blogs_widgets = array(
	    'id' => 'blog-'.$blog->userblog_id.'-w',
	    'title' => 'Widgets',
	    'href' => $blog->siteurl.'/wp-admin/widgets.php',
	    'meta' => array('class' => 'my-toolbar-page'),
	    'parent' => $base
	  );
	  $wp_admin_bar->add_node($blogs_widgets);

	  $blogs_menus = array(
	    'id' => 'blog-'.$blog->userblog_id.'-m',
	    'title' => 'Menus',
	    'href' => $blog->siteurl.'/wp-admin/nav-menus.php',
	    'meta' => array('class' => 'my-toolbar-page'),
	    'parent' => $base
	  );
	  $wp_admin_bar->add_node($blogs_menus);
	}
}
add_action( 'admin_bar_menu', 'ab11_add_toolbar_node', 999 );

function ab11_remove_menus () {
	global $menu;
	global $current_user;
	$restricted = array(
		__('Dashboard'),
		__('Comments'),
		__('Links'),
		__('Tools'),
		__('Users'),
		__('Settings'),
		__('Plugins')
	);
	end ($menu);

	get_currentuserinfo();

 	if (is_super_admin($current_user->user_id)){
 		
 	}else{
		while (prev($menu)){
			$value = explode(' ',$menu[key($menu)][0]);
			if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
		}
	}
}
add_action('admin_menu', 'ab11_remove_menus');

if ( !current_user_can('administrator') ) {
    add_action( 'init', create_function( '$a', "remove_action( 'init', 'wp_version_check' );" ), 2 );
    add_filter( 'pre_option_update_core', create_function( '$a', "return null;" ) );
}


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
	global $wpdb;
	if ($wpdb->blogid == 1){
		register_sidebar( array(
			'name' => __( 'Global Why RCC? Widget', 'ab11' ),
			'id' => 'global-widget-whyrcc',
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
			'id' => 'global-widget-getstarted',
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
	}
}
add_action( 'widgets_init', 'ab11_widgets_init' );

register_sidebar( array(
	'name' => __( 'Right Sidebar 1', 'ab11' ),
	'id' => 'right-sidebar-1',
	'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'ab11' ),
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
) );

/**
 * Registers our navigation menus.
 *
 * @since Awaken Benehime V11
 */
function ab11_menus_init() {
	global $wpdb;
	if ($wpdb->blogid == 1){
		register_nav_menus( array(
			'global-menu-whyrcc' => __( 'Global Why RCC? Menu'),
			'global-menu-programs'     => __( 'Global Programs & Courses Menu'),
			'global-menu-getstarted'  => __( 'Global Get Started Menu'),
			'global-menu-services'     => __( 'Global Student Services Menu'),
			'global-menu-explore'      => __( 'Global Explore RCC Menu')
			));
	}
	register_nav_menu( 'sidebar-menu' , __( 'Sidebar Menu' ));
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
	global $wpdb;
	$classes[] = str_replace('/', '', get_blog_details($wpdb->blogid)->path);
	if ( has_post_thumbnail() )
			$classes[] = 'has-post-thumbnail';

	if ( ! is_active_sidebar( 'sidebar-1' ) || is_page_template( 'page-templates/full-width.php' ) )
		$classes[] = 'full-width';

	if ( is_page_template( 'template-front-page.php' ) ) {
		$classes[] = 'template-front-page';
		$blacklist[] = 'page';
		$classes = array_diff( $classes, $blacklist );
	}

	if ( is_page_template( 'template-online-schedule.php' ) )
		$classes[] = 'template-online-schedule';

	if ( empty( $background_color ) )
		$classes[] = 'custom-background-empty';
	elseif ( in_array( $background_color, array( 'fff', 'ffffff' ) ) )
		$classes[] = 'custom-background-white';

	// Enable custom font class only if the font CSS is queued to load.
	if ( wp_style_is( 'twentytwelve-fonts', 'queue' ) )
		$classes[] = 'custom-font-enabled';

	if ( ! is_multi_author() )
		$classes[] = 'single-author';

	if ( is_page() && !is_page_template( ) ) {
		$classes[] = 'template-page';
	}
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
function ab11_enqueue_scripts() {
	if ( !is_admin() ) {
		$url = 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js'; // the URL to check against
		$test_url = @fopen($url,'r'); // test parameters
		if($test_url !== false) { // test if the URL exists
      wp_deregister_script( 'jquery' ); // deregisters the default WordPress jQuery
      wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js'); // register the external file
      wp_enqueue_script('jquery'); // enqueue the external file
		} else {
      wp_deregister_script('jquery'); // deregisters the default WordPress jQuery
      wp_register_script('jquery', get_bloginfo('template_url').'/js/vendor/jquery-1.8.3.min.js', __FILE__, false, '1.8.3', true); // register the local file
      wp_enqueue_script('jquery'); // enqueue the local file
		}

		if ( is_page_template( 'template-online-schedule.php' ) ) {
			wp_enqueue_script(
				'ab11_os_fe_scripts',
				get_bloginfo('template_directory') . '/inc/ab11-os-fe/ab11-os-fe-scripts.js',
				array( 'jquery' ),
				'1.0',
				true
			);
			wp_enqueue_script(
				'jquery.history',
				get_bloginfo('template_directory') . '/js/vendor/jquery.history.js',
				array( 'jquery' ),
				'1.0',
				true
			);

			wp_localize_script(
				'ab11_os_fe_scripts',
				'ab11_os_ajax_request',
				array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) )
			);
		}
		wp_enqueue_script(
			'ab11_os_scripts',
			get_template_directory_uri() . '/js/main.js',
			array( 'jquery'),
			'11.0',
			true );


		wp_enqueue_script(
			'google_jsapi',
			'https://www.google.com/jsapi?key=ABQIAAAA0DxWBmajUg3-7xSRVQ2q3RRo7kyImI0gdcpnJoA7tSJ7W8_oCBQNAUWA1k40IheM4_liCOjcgVEIwA',
			false,
			'1.5',
			true
		);

	}
}
add_action( 'wp_enqueue_scripts', 'ab11_enqueue_scripts' );


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
							echo '<ul class="nav-sitemap">'."\n";
							echo '<li class="nav'.$i.'"><a class="nav-sitemap-a" href="'.$value.'">'.$key.'</a></li>'. "\n";
							$i++;
			} elseif ($i>0 && $i<9){
							echo '<li class="nav'.$i.'"><a class="nav-sitemap-a" href="'.$value.'">'.$key.'</a></li>'. "\n";
							$i++;
			} elseif ($i>=9){
							echo '<li class="nav'.$i.'"><a class="nav-sitemap-a" href="'.$value.'">'.$key.'</a></li>'. "\n";
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
		$b_id = str_replace( array( $wpdb->base_prefix, '_capabilities' ), '', $key );
		if ( ! is_numeric( $b_id ) )
			continue;

		$b_id = (int) $b_id;
		$blog = get_blog_details( $b_id );
		if ( $blog && isset( $blog->domain ) && ( $all || ( ! $blog->archived && ! $blog->spam && ! $blog->deleted ) ) ) {
			$blogs[ $blog->blogname ] = $blog->siteurl;
		}
	}
	ksort($blogs);
	return apply_filters( 'ab11_get_blogs_of_user', $blogs, $user_id, $all );
}

// Override img caption shortcode to fix 10px issue.
add_filter('img_caption_shortcode', 'ab11_fix_img_caption_shortcode', 10, 3);

function ab11_fix_img_caption_shortcode($val, $attr, $content = null) {
    extract(shortcode_atts(array(
        'id'    => '',
        'align' => '',
        'width' => '',
        'caption' => ''
    ), $attr));

    if ( 1 > (int) $width || empty($caption) ) return $val;

    return '<div id="' . $id . '" class="wp-caption ' . esc_attr($align) . '" style="width: ' . (0 + (int) $width) . 'px">' . do_shortcode( $content ) . '<p class="wp-caption-text">' . $caption . '</p></div>';
}

if ( ! function_exists( 'ab11_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own ab11_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since AB v11
 */
function ab11_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'ab11' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'ab11' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
					printf( '<cite class="fn">%1$s %2$s</cite>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span> ' . __( 'Post author', 'ab11' ) . '</span>' : ''
					);
					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s at %2$s', 'ab11' ), get_comment_date(), get_comment_time() )
					);
				?>
			</header><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'ab11' ); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( __( 'Edit', 'ab11' ), '<p class="edit-link">', '</p>' ); ?>
			</section><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'ab11' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;

/* ==================================================================
*
*   Creates Sortable Last Modified Column
*   on manage pages screen
* -----------------------------------------------------------------*/
function ab11_add_last_modified_column($columns) {
    return array_merge( $columns,
              array("last_modified" => __("Last Modified")) );
}
add_filter("manage_pages_columns" , "ab11_add_last_modified_column");

function ab11_last_modified_column ( $column, $post_id ){
  if( "last_modified" == $column ) {
    the_modified_time( "F j, Y" );
  }
}
add_action( "manage_pages_custom_column" , "ab11_last_modified_column", 10, 2 );

function ab11_last_modified_column_register_sortable( $columns ) {
    $columns["last_modified"] = "last_modified";

    return $columns;
}
add_filter( "manage_edit-page_sortable_columns", "ab11_last_modified_column_register_sortable" );

function ab11_sort_column_by_modified( $vars ){
    if ( isset( $vars["orderby"] ) && "last_modified" == $vars["orderby"] ) {
        $vars = array_merge( $vars, array(
            "orderby" => "modified"
        ) );
    }
    return $vars;
}
add_filter( "request", "ab11_sort_column_by_modified" );

function ab11_columns_remove_date($defaults) {
	unset($defaults['date']);
	unset($defaults['comments']);
	return $defaults;
}
add_filter('manage_page_posts_columns', 'ab11_columns_remove_date');

/* ==================================================================
*
*   Creates Page Template Column
*   on manage pages screen
* -----------------------------------------------------------------*/
function ab11_add_page_template_column($columns) {
    return array_merge( $columns,
              array("page_template" => __("Page Template")) );
}
add_filter("manage_pages_columns" , "ab11_add_page_template_column");

function ab11_page_template_column ( $column, $post_id ){
  if( "page_template" == $column ) {
    echo get_post_meta( $post_id, '_wp_page_template', true );
  }
}
add_action( "manage_pages_custom_column" , "ab11_page_template_column", 10, 2 );


/**
 * Extends the default RoyalSlider plugin
 *
 * @since Awaken Benehime V11
 */
include 'inc/class-royal-slider.php';

/**
 * Extends the default RoyalSlider plugin
 *
 * @since Awaken Benehime V11
 */
include 'inc/class-has-royal-slider.php';

/**
 * Extends the default WordPress wp_nav_menu
 *
 * @since Awaken Benehime V11
 */
include 'inc/class-nav-menus.php';

/**
 * Online Schedule Scripts
 *
 * @since Awaken Benehime V11
 */

require_once('inc/ab11-os-fe/class-ab11-os-fe.php' );

add_action( 'wp_ajax_nonpriv_ab11_os_ajax',  'ajax_controller', 10, 0 );
add_action( 'wp_ajax_ab11_os_ajax',  'ajax_controller', 10, 0 );

function ajax_controller () {
	if(!isset($_SESSION)) {
    session_start();
	}

	if ( isset( $_SESSION['ab11_os_fe_schedule'] ) ) {


		switch($_POST['function']) {
			case 'get_semester':
				if ( isset( $_SESSION['ab11_os_fe_schedule'] ) ) {
					unset( $_SESSION['ab11_os_fe_schedule'] );
				}
			 	$_SESSION['ab11_os_fe_schedule'] = new AB11_OS_FE( $_POST );

				break;
			case 'get_subjects':
				echo $_SESSION['ab11_os_fe_schedule']->get_subjects();
		 		break;
			case 'get_calendar':
				$_SESSION['ab11_os_fe_schedule']->set_param( array('breadcrumbs' => '') );
				echo $_SESSION['ab11_os_fe_schedule']->get_breadcrumbs( array('semester', 'calendar') );

				echo $_SESSION['ab11_os_fe_schedule']->get_calendar();
		 		break;
			case 'get_courses':
				$_SESSION['ab11_os_fe_schedule']->set_param( array('breadcrumbs' => '') );

				echo $_SESSION['ab11_os_fe_schedule']->get_breadcrumbs( array('semester', 'calendar', 'courses') );
				echo $_SESSION['ab11_os_fe_schedule']->get_courses();
		 		break;
		 	case 'get_course_detail':
		 		echo $_SESSION['ab11_os_fe_schedule']->get_course_detail();
		 		break;
			case 'test':
				echo $_SESSION['ab11_os_fe_schedule']->test();
		 		break;
		}

	} else {
		$_SESSION['ab11_os_fe_schedule'] = new AB11_OS_FE( $_POST );
	}

	die();
}

if( isset( $_REQUEST['action'] ) ) {
  do_action( 'wp_ajax_' . $_REQUEST['action'] );
  do_action( 'wp_ajax_nopriv_' . $_REQUEST['action'] );
}


?>
