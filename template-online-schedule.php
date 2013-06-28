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


<div id="horz-menu--options-bar" class="grid-12 horz-menu horz-menu--options-bar">
	<ul id="links" class="horz-menu-list grid-3">
	  <li class="horz-menu-list-item" title="Quick Links">
	  	<a href="#" class="grey">Quick Links</a>
		  <div id="hidden-links" class="horz-menu-dropdown">
		  	<ul class="horz-menu-sublist">
		      <li><a href="#" id="examSchedule" title="Exam Schedule">Exam Schedule</a></li>
		      <li><a href="/helpdesk/how-to-register-and-pay-for-classes-online/" title="Registration Instructions">Registration Instructions</a></li>
		  	</ul>
	  	</div>
		</li>
	</ul>
	<ul id="schedules" class="horz-menu-list grid-3">
	  <li class="horz-menu-list-item" title="Select Semester">
	  	<a href="#">Semester</a>
		  <div id="hidden-semester" class="horz-menu-dropdown">
		  <ul>
		    <li class="semester" title="2134">Fall 2013</li>
		    <li class="semester" title="2133">Summer 2013</li>
		    <li class="semester" title="2132">Spring 2013</li>
		  </ul>
		  </div>
	  </li>
	</ul>
	<ul id="subjects" class="horz-menu-list grid-3">
	    <li class="horz-menu-list-item is-disabled" title="Select Subject">
	    	<a href="#">Subject</a>
		    <div id="hidden-subject" class="horz-menu-dropdown">
	        <ul>
	        <!--insert subjects here-->
	        </ul>
		    </div>
	    </li>
	</ul>
	<ul id="options" class="horz-menu-list grid-3">
	  <li class="horz-menu-list-item" title="Select Options">
	  	<a href="#">Options</a>
		  <div id="hidden-ptions" class="horz-menu-dropdown">
		      <p>These options are <strong>not</strong> required but may help you find the courses you're looking for.</p>
		      <form action="" name="options" id="optionsForm">
		        <fieldset>
		        <legend>options</legend>
		          <p>Location</p>
		            <input type="checkbox" name="location" value="Distance Learning" id="locationOnline" class="location" /><label for="locationOnline">Online</label><br />
		            <input type="checkbox" name="location" value="GLENNS" id="locationGlenns" class="location" /><label for="locationGlenns">Glenns</label><br />
		            <input type="checkbox" name="location" value="KILMARNOCK" id="locationKilmarnock" class="location" /><label for="locationKilmarnock">Kilmarnock</label><br /> 
		            <input type="checkbox" name="location" value="KGEORGE" id="locationKG" class="location" /><label for="locationKG">King George</label><br />
		            <input type="checkbox" name="location" value="ssdl" id="locationssdl" class="location" /><label for="locationssdl">Shared Service</label><br />
		            <input type="checkbox" name="location" value="WARSAW" id="locationWarsaw" class="location" /><label for="locationWarsaw">Warsaw</label>
		          <br /><br />
		          <p>Mode</p>
		            <input type="checkbox" name="mode" value="In Person" id="modeTradional" class="mode" /><label for="modeTraditional">Traditional</label><br />
		            <!--<input type="checkbox" name="mode" value="WWW Online" id="modeOnline" class="mode" /><label for="modeOnline">Online</label><br />-->
		            <input type="checkbox" name="mode" value="Hybrid" id="modeHybrid" class="mode"  /><label for="modeHybrid">Hybrid</label><br />
		            <input type="checkbox" name="mode" value="Interactive Classroom Video" id="modeIV"/ class="mode" ><label for="modeIV">Interactive Video</label>
		          <br /><br />
		          <p>Time</p>
		            <input type="radio" name="time" value="1" id="timeDay" class="time"  /><label for="timeDay">Day</label><br />
		            <input type="radio" name="time" value="2" id="timeNight" class="time"  /><label for="timeNight">Night</label><br />
		            <input type="radio" name="time" value="All" id="timeAll" class="time" checked /><label for="timeAll">Any Time</label><br />
		            <input type="checkbox" name="day" value="Friday" id="Friday" class="day"  /><label for="Friday">FT Friday&rsquo;s</label><br />
		            <input type="checkbox" name="day" value="Saturday" id="Saturday" class="day"  /><label for="Saturday">FT Saturday&rsquo;s</label>
		          <br /><br />
		          <p id="sessionOptions">Session - <em>Experimental</em></p>
		            <div id="sessionList" class="sessionList">
		              <p><em>Please select a semester to show available sessions.</em></p>
		            </div>
		         </fieldset>
		         <br /><br />
		        <input type="submit" id="optionSubmit" title="Save Options" value="Save Options" />
		      </form>
		      <div style="clear:both"></div>
		  </div><!--end hiddenOptions-->
	  </li>
	</ul>
</div><!--end optionsBar -->
<div id="content" class="content" role="main">
<div id="classContent">
  <div id="seminstructions"><span></span><p>Please select a semester</p></div>
  <div id="subinstructions"><span></span><p>Please select a subject</p></div>
  <div id="optinstructions"><span></span><p>May help narrow your search</p></div>
  <img src="/wp-content/themes/ReConstruct10Schedule/images/ajax-loader.gif" alt="loading" id="loading" />
  <ul id="classList" class="hidden">
	 <!--Enter Subject Data -->
	</ul><!--end course list ul-->
  <div id="calendar"></div>
  </div><!--end classContent -->
  <div id="container-cubes" class="">
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
		</div><!--end container-cubes-->


</div><!--end .content -->
</div><!--end .container-->
<div id="info" class="modal">
 	 <div id="ajaxInfo"></div> 
	 <img src="/wp-content/themes/ReConstruct10Schedule/images/ajax-loader.gif" alt="loading" id="loading2" />
	<a href="#" id="classInfoClose" class="close"/>X</a>
 </div>
<!-- Mask to cover the whole screen -->
  <div id="mask"></div>

<?php get_footer(); ?>
