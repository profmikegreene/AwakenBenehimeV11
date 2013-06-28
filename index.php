<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Awaken_Benehime
 * @since Awaken Benehime V11
 */

get_header(); ?>

    <div id="primary" class="site-content container clearfix">
        <div id="content" role="main">
                <?php if ( have_posts() ) : ?>

            <?php /* Start the Loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>
            <div class="grid-8">
                <?php get_template_part( 'content', 'page'); ?>
                <?php comments_template( '', true ); ?>
                
            </div><!-- .grid-8 -->
            <?php endwhile; ?>

        <?php else : ?>
        <div class="container clearfix">
            <article id="post-0" class="grid-12 post no-results not-found">

            <?php if ( current_user_can( 'edit_posts' ) ) :
                // Show a different message to a logged-in user who can add posts.
            ?>
                <header class="entry-header">
                    <h1 class="entry-title"><?php _e( 'No posts to display', 'ab11' ); ?></h1>
                </header>

                <div class="entry-content">
                    <p><?php printf( __( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'ab11' ), admin_url( 'post-new.php' ) ); ?></p>
                </div><!-- .entry-content -->

            <?php else :
                // Show the default message to everyone else.
            ?>
                <header class="entry-header">
                    <h1 class="entry-title"><?php _e( 'Nothing Found', 'ab11' ); ?></h1>
                </header>

                <div class="entry-content">
                    <p><?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'ab11' ); ?></p>
                    <?php get_search_form(); ?>
                </div><!-- .entry-content -->
            <?php endif; // end current_user_can() check ?>

            </article><!-- #post-0 -->
            </div><!-- .container -->
        <?php endif; // end have_posts() check ?>
        </div><!-- #content -->
    </div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
