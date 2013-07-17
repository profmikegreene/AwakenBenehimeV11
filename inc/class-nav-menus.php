<?php

class ab11_walker_nav_menu extends Walker_Nav_Menu {

	// add classes to ul sub-menus
	function start_lvl( &$output, $depth ) {
    // depth dependent classes
    $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
    $display_depth = ( $depth + 1); // because it counts the first submenu as 0
    $classes = array(
        'sub-menu',
        'menu-depth-' . $display_depth
        );
    $class_names = implode( ' ', $classes );

    // build html
    $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
    // $output .= $indent . '<span class="icon icon-dropdown-arrow">&#9660;</span>' . "\n";
	}

	// add main/sub classes to li's and links
 function start_el( &$output, $item, $depth, $args ) {
    global $wp_query;
    $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

    // depth dependent classes
    $depth_classes = array(
        ( $depth == 0 ? 'menu-item menu-item-main' : 'menu-item menu-item-sub' ),
        ( $depth >=2 ? 'menu-item menu-item-sub-sub' : '' ),
        'menu-item-depth-' . $depth
    );
    $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

    // passed classes
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

    // build html
    // ($depth == 0 ? $)
    $output .= $indent . '<li id="menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';

    // link attributes
    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
    $attributes .= ' class="menu-item-link ' . ( $depth > 0 ? 'menu-item-link-sub' : 'main-item-link-main' ) . '"';

    $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
        $args->before,
        $attributes,
        $args->link_before,
        apply_filters( 'the_title', $item->title, $item->ID ),
        $args->link_after,
        $args->after
    );

    // build html
    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

/**
 * Returns global nav item where blogid = 1
 *
 * @since Awaken Benehime V11
 *
 * @param string global nav menu slug
 * @return string text of upper level nav item
 */
function ab11_global_nav_menu( $menu_slug, $menu_heading ){
	global $wpdb;

	$menu_name = 'global-menu-'.$menu_slug;
	$widget_id = 'global-widget-'.$menu_slug;

	/* ==================================================================
	*
	*   Gets global nav menus from blog ID = 1
	*
	*   If there's more than 8 links, create 2 columns
	*
	*   Because Explore is the right-most item, the widget is on the left
	*   so it is run before the menu
	*
	*   All other global nav items with widgets are run after the menu
	*
	* -----------------------------------------------------------------*/
	if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
		$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
		$menu_items = wp_get_nav_menu_items($menu->term_id);
		$count = count($menu_items);
		$classes = '';
		$output = false;
		$output = '<li class="items-' . $count . ' horz-menu-list-item horz-menu-list-item--'.$menu_slug.'">'."\n\t";
		$output .= '<a href="#">'.$menu_heading.'</a>'."\n\t";
		// $output .= $count;

		$classes .= ($count > 8) ? 'horz-menu-dropdown--wide ' : NULL;

		if ( strcmp( $menu_slug, 'explore' ) ==0 ) {
			$widget = ab11_nav_menu_widget('explore');
			if ( $widget ) {
				$classes .= 'has-widget ';
			}
		}

	$menu_list = '<ul id="menu-' . $menu_name . '" class="horz-menu-sublist">'."\n\t\t\t";

	if ($count < 8) {
		foreach ( (array) $menu_items as $key => $menu_item ) {
			$title = $menu_item->title;
			$url = $menu_item->url;
			$menu_list .= '<li><a href="' . $url . '">' . $title . '</a></li>'."\n\t\t\t";
		}
		$menu_list .= '</ul>'."\n\t\t";
	} else {
		foreach ( (array) $menu_items as $key => $menu_item ) {
			if ($key == 8){
				$menu_list .='</ul><ul id="menu-' . $menu_name . '" class="horz-menu-sublist">'."\n\t\t\t";
				$title = $menu_item->title;
				$url = $menu_item->url;
				$menu_list .= '<li><a href="' . $url . '">' . $title . '</a></li>'."\n\t\t\t";
			} else {
				$title = $menu_item->title;
				$url = $menu_item->url;
				$menu_list .= '<li><a href="' . $url . '">' . $title . '</a></li>'."\n\t\t\t";
			}
		}
		$menu_list .= '</ul>'."\n\t\t";
	}
	} else {
		$menu_list = '<ul><li>Menu "' . $menu_name . '" not defined.</li></ul>'."\n\t\t";
	}
	

	if ( strcmp( $menu_slug, 'explore' ) != 0 ) {
			$widget = ab11_nav_menu_widget( $menu_slug );
			if ( $widget ) {
				$classes .= 'has-widget ';
			}
		}

	// $menu_list now ready to output
	$output .= '<div class="horz-menu-dropdown '.$classes.'">'."\n\t\t";
	$output .= ( strcmp( $menu_slug, 'explore' ) ==0 ) ? $widget : NULL;
	$output .= $menu_list;
	$output .= ( strcmp( $menu_slug, 'explore' ) !=0 ) ? $widget : NULL;
	$output .= '</div>'."\n\t\t"; //end .horz-menu-dorpdown
	$output .= '</li>'."\n"; //end .horz-menu-list-item

	return $output;
	}

/**
 * Returns widgets relative to global nav item
 * where blogid = 1, ie. Explore widget from the
 * main site will be shown across the entire
 * global nav explore menu
 *
 * @since Awaken Benehime V11
 *
 * @param string global nav menu slug
 * @return string HTML of widget
 */
function ab11_nav_menu_widget ( $menu_slug ) {
	global $wpdb;
	$output = false;
	$table = $wpdb->base_prefix.'options';
	$option = 'sidebars_widgets';
	$sql = "SELECT option_value FROM $table WHERE option_name = %s LIMIT 1";
	$row = $wpdb->get_row( $wpdb->prepare( $sql, $option) );
	if ( is_object( $row ) ) {
			$value = maybe_unserialize( $row->option_value );
			if (isset($value['global-widget-'.$menu_slug][0])){
				$global_widget = explode('-', $value['global-widget-'.$menu_slug][0]);


				$option = 'widget_' . $global_widget[0];
				$sql = "SELECT option_value FROM $table WHERE option_name = %s LIMIT 1";
				$row = $wpdb->get_row( $wpdb->prepare( $sql, $option ) );
				if ( is_object( $row ) ) {
						$value = maybe_unserialize( $row->option_value );
						$widget = $value[$global_widget[1]];
						// var_dump($widget);
						$output = '<ul id="secondary" class="widget-area horz-menu-sublist" role="complementary">'."\n\t\t";
						$output .= '<aside id="text-3" class="widget $option">'."\n\t\t";
						$output .= '<h3 class="widget-title">'.$widget['title'].'</h3>'."\n\t\t";
						$output .= '<div class="textwidget">'.$widget['text'].'</div>'."\n\t\t";
						$output .= '</aside>';
						$output .= '</ul><!-- #secondary -->'."\n\t\t";
				}
			}
	}
	return $output;
}


?>
