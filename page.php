<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
<?php	if ( has_post_thumbnail() ) { ?>
				<div class="billboard blue30 no-hover billboard-full-width" id="billboard">
				<?php the_post_thumbnail( 'billboard-page' ); ?>
		</div>
<?php } else {?>
				<div class="billboard blue30 no-hover billboard-full-width no-post-thumbnail" id="billboard">
				</div>
<?php } ?>
	<div id="primary" class="site-content container clearfix" role="main">
		<div id="content" class="grid-8 content" role="main">
				<img id="logo" class="logo" src="<?php bloginfo('template_directory'); ?>/img/rccLogo-white.png" alt="Rappahannock Community College Logo" />
			<?php if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb('<p id="breadcrumbs" class="breadcrumbs">','</p>');
				} ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>
				<?php comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>
		</div><!-- #content -->

		<?php get_sidebar(); ?>
	</div><!-- #primary -->
<?php get_footer(); ?>