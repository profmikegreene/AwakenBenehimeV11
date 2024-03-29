<?php
/**
 * Template Name: Online Schedule
 *
 * This is the template that displays the RCC Online Schedule
 * Version: 11.0.0
 *
 * @package WordPress
 * @subpackage Awaken_Benehime
 * @since Awaken Benehime V11
 */



if(!isset($_SESSION)) {
    session_start();
}


get_header(); ?>
<code id="testing"></code>
<?php	if ( has_post_thumbnail() ) { ?>
				<div class="billboard blue30 no-hover billboard-full-width" id="billboard">
				<?php the_post_thumbnail( 'billboard-page' ); ?>
		</div>
<?php } else {?>
				<div class="billboard blue30 no-hover billboard-full-width no-post-thumbnail" id="billboard">
				</div>
<?php } ?>

<div id="primary" class="site-content" role="main">
<div id="content" class="content container-content container clearfix" role="main">
	<div class="logo grid-12">
		<a href="<?php echo network_site_url(); ?>"><img id="logo" src="<?php bloginfo('template_directory'); ?>/img/rccLogo-white.png"
				 alt="Rappahannock Community College Logo" /></a>
		<h2 class="blogname bigger"><?php bloginfo( 'name' ); ?></h2>
	</div>
	<div id="horz-menu--options-bar" class="horz-menu horz-menu--schedule-options-bar schedule-options-bar is-hover-disabled clearfix">
	<ul class="horz-menu-list horz-menu-list--options-bar">
	  <li id="horz-menu-list-item--semesters" class="horz-menu-list-item horz-menu-list-item--semesters rcc-blue no-hover button" title="Select Semester">
	  	<a href="#" class="horz-menu-selector ">Select Semester<span class="icon icon-d-dropdown-arrow"></span></a>
		  <div id="hidden-semesters" class="horz-menu-dropdown">
		  <ul id="horz-menu-sublist--semesters" class="horz-menu-sublist horz-menu-sublist--semesters">
		   <?php ab11_os_get_semesters(); ?>
		  </ul>
		  </div>
	  </li>
    <li id="horz-menu-list-item--subjects" class="horz-menu-list-item horz-menu-list-item--subjects is-disabled rcc-blue no-hover button" title="Select Subject">
    	<a href="#" class="horz-menu-selector">Select Subject<span class="icon icon-d-dropdown-arrow"></span></a>
	    <div id="hidden-subjects" class="horz-menu-dropdown">
        <ul id="horz-menu-sublist--subjects" class="horz-menu-sublist horz-menu-sublist--subjects clearfix">
        <li>You must select a semester first</li>
        </ul>
	    </div>
    </li>
	  <li id="horz-menu-list-item--options" class="horz-menu-list-item horz-menu-list-item--options rcc-blue no-hover button" title="Select Options">
	  	<a href="#" class="horz-menu-selector">Select Options<span class="icon icon-d-dropdown-arrow"></span></a>
		  <div id="hidden-options" class="horz-menu-dropdown">
		  	<ul id="horz-menu-sublist--options" class="horz-menu-sublist horz-menu-sublist--options">
		      <li class="no-hover">
		      	<p>These options are <strong>not</strong> required but may help you find the courses you're looking for.</p>
		      <form action="" name="options" id="options-form" class="schedule-options-form">
		        <fieldset>
		        <legend>Options</legend>
		          <div class="cluster location">
		          	<p class="big">Location</p>
		            <input type="checkbox" name="location" value="Distance Learning" id="locationOnline" class="location" /><label for="locationOnline">Online</label><br />
		            <input type="checkbox" name="location" value="GLENNS" id="locationGlenns" class="location" /><label for="locationGlenns">Glenns</label><br />
		            <input type="checkbox" name="location" value="KILMARNOCK" id="locationKilmarnock" class="location" /><label for="locationKilmarnock">Kilmarnock</label><br /> 
		            <input type="checkbox" name="location" value="KGEORGE" id="locationKG" class="location" /><label for="locationKG">King George</label><br />
		            <input type="checkbox" name="location" value="ssdl" id="locationssdl" class="location" /><label for="locationssdl">Shared Service</label><br />
		            <input type="checkbox" name="location" value="WARSAW" id="locationWarsaw" class="location" /><label for="locationWarsaw">Warsaw</label>
		          </div>
		          <div class="cluster time">
		          <p class="big">Time</p>
		            <input type="radio" name="time" value="1" id="timeDay" class="time"  /><label for="timeDay">Day</label><br />
		            <input type="radio" name="time" value="2" id="timeNight" class="time"  /><label for="timeNight">Night</label><br />
		            <input type="radio" name="time" value="All" id="timeAll" class="time" checked /><label for="timeAll">Any Time</label><br />
		            <input type="checkbox" name="day" value="Friday" id="Friday" class="day"  /><label for="Friday">FT Friday&rsquo;s</label><br />
		            <input type="checkbox" name="day" value="Saturday" id="Saturday" class="day"  /><label for="Saturday">FT Saturday&rsquo;s</label>
		          </div>
		          <div class="cluster mode clear-left">
		          <p class="big">Mode</p>
		            <input type="checkbox" name="mode" value="In Person" id="modeTradional" class="mode" /><label for="modeTraditional">Traditional</label><br />
		            <input type="checkbox" name="mode" value="Hybrid" id="modeHybrid" class="mode"  /><label for="modeHybrid">Hybrid</label><br />
		            <input type="checkbox" name="mode" value="Interactive Classroom Video" id="modeIV"/ class="mode" ><label for="modeIV">Interactive Video</label>
		          </div>
		          
		          <div class="cluster session">
		          <p class="big" id="sessionOptions">Session</p>
		            <div id="sessionList" class="sessionList">
		              <p><em>Please select a semester to show available sessions.</em></p>
		            </div>
		         </div>
		         </fieldset>
		        <input type="submit" id="options-submit" title="Save Options" value="Save Options" />
		      </form>
		      </il>
		    </ul>
		  </div><!--end hiddenOptions-->
	  </li>
	  <li id="horz-menu-list-item--links" class="horz-menu-list-item horz-menu-list-item--links rcc-blue no-hover button" title="Quick Links">
	  	<a href="#" class="horz-menu-selector">Quick Links<span class="icon icon-d-dropdown-arrow"></span></a>
		  <div id="hidden-links" class="horz-menu-dropdown horz-menu-dropdown--links">
		  	<ul class="horz-menu-sublist horz-menu-sublist--links">
		      <li><a href="#" id="examSchedule" title="Exam Schedule">Exam Schedule</a></li>
		      <li><a href="/helpdesk/how-to-register-and-pay-for-classes-online/" title="Registration Instructions">Registration Instructions</a></li>
		  	</ul>
	  	</div>
		</li>
	</ul>
</div><!--end optionsBar -->


<div id="container-ajax" class="container container-ajax clearfix">

</div><!--end container-content -->
	<div id="container-cubes" class="container-cubes clearfix">
		<?php
		$args= array(
				'post_type'=>'cubes',
				'posts_per_page'  => -1,
				'meta_key' => 'cube_id',
				'orderby'  =>'meta_value_num',
				'order' => 'ASC',
		);
		$cubes_query = new WP_Query($args);
		$cubes = [];
		if ($cubes_query->have_posts()) : while($cubes_query->have_posts()) : $cubes_query->the_post();

				$id = $cubes_query->post->ID;
				$cube_id = esc_html( get_post_meta( $id,'cube_id', true ) );

				//This removes the autogenerated <p> tags that wordpress wraps
				//content with in the TinyMCE editor for the cubes on this page
				remove_filter('the_content', 'wpautop');

				$cubes[$cube_id] = [
						'cube_id' => $cube_id,
						'post_id' => $id,
						'cube_enable_url' => esc_html( get_post_meta( $id,'cube_enable_url', true ) ),
						'cube_url' => esc_html( get_post_meta( $id,'cube_url', true ) ),
						'cube_color' => esc_html( get_post_meta( $id,'cube_color', true ) ),
						'cube_class' => esc_html( get_post_meta( $id,'cube_class', true ) ),
						'cube_title' => get_the_title(),
						'cube_content' => apply_filters('the_content',get_the_content()),
						'cube_is_countdown' => esc_html( get_post_meta( $id,'cube_is_countdown', true ) ),
						'cube_countdown_date' => esc_html( get_post_meta( $id,'cube_countdown_date', true ) ),
						'has_thumbnail' => has_post_thumbnail( $id ),
						'cube_width' => esc_html( get_post_meta( $id,'cube_width', true ) ),
						'cube_height' => esc_html( get_post_meta( $id,'cube_height', true ) )
				];

				endwhile; else: ?>
				<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
		<?php endif; ?>

		<?php isset($cubes['01']) ? ab11_cubes_output($cubes['01']) : NULL; ?>
		<?php isset($cubes['02']) ? ab11_cubes_output($cubes['02']) : NULL; ?>
		<?php isset($cubes['03']) ? ab11_cubes_output($cubes['03']) : NULL; ?>
		<?php isset($cubes['04']) ? ab11_cubes_output($cubes['04']) : NULL; ?>
		<?php isset($cubes['05']) ? ab11_cubes_output($cubes['05']) : NULL; ?>
		<?php isset($cubes['06']) ? ab11_cubes_output($cubes['06']) : NULL; ?>
		<?php isset($cubes['07']) ? ab11_cubes_output($cubes['07']) : NULL; ?>
		<?php isset($cubes['08']) ? ab11_cubes_output($cubes['08']) : NULL; ?>
		<?php isset($cubes['09']) ? ab11_cubes_output($cubes['09']) : NULL; ?>
		<?php isset($cubes['10']) ? ab11_cubes_output($cubes['10']) : NULL; ?>
		<?php isset($cubes['11']) ? ab11_cubes_output($cubes['11']) : NULL; ?>
		<?php isset($cubes['12']) ? ab11_cubes_output($cubes['12']) : NULL; ?>

	</div><!--end .container-cubes-->


</div><!--end .content -->
</div><!--end .container-->
<div id="modal-course-detail" class="modal modal-course-detail is-hidden">
 	 <div id="course-detail" class="course-detail modal-content">

 	 </div>
 	 <a href="#" class="modal-close"/>X</a>
 </div>
<!-- Mask to cover the whole screen -->
  <div id="mask" class="mask is-hidden">
  	<i class="icon icon-loading"></i>
</div>

<?php get_footer(); ?>
