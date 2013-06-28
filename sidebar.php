<?php
/**
 * The sidebar containing the main widget area.
 *
 * If no active widgets in sidebar, let's hide it completely.
 *
 * @package WordPress
 * @subpackage Awaken Benehime V11
 * @since Awaken Benehime 11.0
 */
?>

	
		<div id="secondary" class=" grid-4 widget-area widget-area--sidebar" role="complementary">
			<aside id="sidebar-menu" class="widget widget--menu white">
			<h3 class="widget-title rcc-blue"><?php echo get_bloginfo( 'name' );?></h3>
			<?php wp_nav_menu( array(
				'theme_location'  => 'sidebar-menu',
				'menu_class'      => 'vert-menu vert-menu--sidebar',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'depth'           => 0,
				'walker'					=> new ab11_walker_nav_menu
				) ); ?>
			</aside>
			<?php if ( is_active_sidebar( 'right-sidebar-1' ) ) {
				dynamic_sidebar( 'right-sidebar-1' );
			} ?>
		</div><!-- #secondary -->
