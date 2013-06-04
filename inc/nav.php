<div class="horz-menu horz-menu--global rcc-blue" id="horz-menu--global">
	<a class="horz-menu-toggle horz-menu-toggle--global" href="#">Menu</a>
	<ul class="horz-menu-list horz-menu-list--global">
		<li class="horz-menu-list-item horz-menu-list-item-my-rcc">
        <a class="blue130 global-myrcc" href="#" id="global-myrcc">myRCC</a>
        <div class="horz-menu-dropdown">
        <ul class="horz-menu-sublist horz-menu-sublist--global-myrcc" id="horz-menu-sublist--global-myrcc">
            <li>
	            <form class="myrcc-login-form clearfix" method="POST" name="authx" action="https://rcc.my.vccs.edu/login" onsubmit="return myVCCSValidate();" id="myrcc-login-form">
	              <input type="text" name="vccsid" id="vccs-id" tabindex="1" placeholder="Username" class="myrcc-input">
	              <br />
	              <input type="password" name="password_temp" tabindex="2" placeholder="Password" class="myrcc-input">
	              <br />
	              <input type="submit" name="submit" value="Log In"  class="blue190 button" tabindex="3"/>
	              <input type="hidden" name="password" />
	              <input type="hidden" name="myvccsurl" value='' />
	              <input type="hidden" name="requesturl" value='https://rcc.my.vccs.edu/jsp/login.jsp?null' />
	            </form>
	          </li>
	          <li><a href="/helpdesk/">Need help with myRCC?</a></li>

        </ul>
      </div>
      </li>
			<li class="horz-menu-list-item horz-menu-list-item--why-rcc ">
				<a href="#">Why RCC?</a>
				<div class="horz-menu-dropdown">
					<?php wp_nav_menu( array(
						'theme_location' => 'global-menu-why-rcc',
						'container'	=>	false,
						'menu_class'	=>	'horz-menu-sublist'
						)); ?>
						<?php if ( is_active_sidebar( 'global-widget-why-rcc' ) ) : ?>
							<ul id="secondary" class="widget-area horz-menu-sublist" role="complementary">
								<?php dynamic_sidebar( 'global-widget-why-rcc' ); ?>
							</ul><!-- #secondary -->
						<?php endif; ?>
					</div>
				<!-- <ul class="horz-menu-sublist">
					<li><a href="#">Quality education</a></li>
					<li><a href="#">Build your foundation</a></li>
					<li><a href="#">Transfer</a></li>
					<li><a href="#">The cost of college</a></li>
					<li><a href="#">Many types of financial aid</a></li>
					<li><a href="#">Vibrant student life</a></li>
					<li><a href="#">Cutting edge technology</a></li>
				</ul> -->
			</li>
			<li class="horz-menu-list-item horz-menu-list-item--programs">
				<a href="#">Programs & Courses</a>
				<div class="horz-menu-dropdown">
				<?php wp_nav_menu( array(
					'theme_location' => 'global-menu-programs',
					'container'	=>	false,
					'menu_class'	=>	'horz-menu-sublist'
					)); ?>
					<?php if ( is_active_sidebar( 'global-widget-programs' ) ) : ?>
							<ul id="secondary" class="widget-area horz-menu-sublist" role="complementary">
								<?php dynamic_sidebar( 'global-widget-programs' ); ?>
							</ul><!-- #secondary -->
						<?php endif; ?>
				</div>
				<!-- <ul class="horz-menu-sublist ">
					<li><a href="#">Course Schedule</a></li>
					<li><a href="#">Programs of Study</a></li>
					<li><a href="#">Distance Learning</a></li>
					<li><a href="#">Dual Enrollment</a></li>
					<li><a href="#">Academic Calendar</a></li>
					<li><a href="#">General Education Goals</a></li>
				</ul> -->
			</li>
			<li class="horz-menu-list-item horz-menu-list-item--get-started">
				<a href="#">Get Started</a>
				<div class="horz-menu-dropdown">
				<?php wp_nav_menu( array(
					'theme_location' => 'global-menu-get-started',
					'container'	=>	false,
					'menu_class'	=>	'horz-menu-sublist'
				 )); ?>
				 <?php if ( is_active_sidebar( 'global-widget-get-started' ) ) : ?>
							<ul id="secondary" class="widget-area horz-menu-sublist" role="complementary">
								<?php dynamic_sidebar( 'global-widget-get-started' ); ?>
							</ul><!-- #secondary -->
						<?php endif; ?>
				</div>
				<!-- <ul class="horz-menu-sublist ">
					<li><a href="#">Apply to RCC</a></li>
					<li><a href="#">Placement Testing</a></li>
					<li><a href="#">Register for courses</a></li>
					<li><a href="#">Pay for courses</a></li>
					<li><a href="#">President's Welcome</a></li>
					<li><a href="#">Contact Us</a></li>
					<li><a href="#">Directions</a></li>
					<li><a href="#">FAQ's</a></li>
					<li><a href="#">Tuition & Fees</a></li>
					<li><a href="#">Veteran's Affairs</a></li>
				</ul> -->
			</li>
			<li class="horz-menu-list-item horz-menu-list-item--services">
				<a href="#">Student Services</a>
				<div class="horz-menu-dropdown">
				<?php wp_nav_menu( array(
					'theme_location' => 'global-menu-services',
					'container'	=>	false,
					'menu_class'	=>	'horz-menu-sublist'
					)); ?>
					<?php if ( is_active_sidebar( 'global-widget-services' ) ) : ?>
							<ul id="secondary" class="widget-area horz-menu-sublist" role="complementary">
								<?php dynamic_sidebar( 'global-widget-services' ); ?>
							</ul><!-- #secondary -->
						<?php endif; ?>
				</div>
				<!-- <ul class="horz-menu-sublist ">
					<li><a href="#">Academic Advising</a></li>
					<li><a href="#">Campus Safety</a></li>
					<li><a href="#">Campus Maps</a></li>
					<li><a href="#">Student Handbook</a></li>
					<li><a href="#">Student Activities</a></li>
					<li><a href="#">Student Consumer Information</a></li>
					<li><a href="#">Bookstore</a></li>
					<li><a href="#">First Year Experience (FYE)</a></li>
					<li><a href="#">Testing Center</a></li>
					<li><a href="#">Virginia Wizard</a></li>
					<li><a href="#">Learning Resources</a></li>
					<li><a href="#">Student Support Services (SSS)</a></li>
					<li><a href="#">Library</a></li>
					<li><a href="#">Transcripts</a></li>
				</ul> -->
			</li>
			<li class="horz-menu-list-item horz-menu-list-item--explore">
					<a href="#">Explore RCC</a>
					<div class="horz-menu-dropdown">
						<?php if ( is_active_sidebar( 'global-widget-explore' ) ) : ?>
							<ul id="secondary" class="widget-area horz-menu-sublist" role="complementary">
								<?php dynamic_sidebar( 'global-widget-explore' ); ?>
							</ul><!-- #secondary -->
						<?php endif; ?>
					<?php wp_nav_menu( array(
					'theme_location' => 'global-menu-explore',
					'container'	=>	false,
					'menu_class'	=>	'horz-menu-sublist'
					)); ?>
				</div>
				<!-- <ul class="horz-menu-sublist ">
					<li><a href="#">College History</a></li>
					<li><a href="#">Mission & Values</a></li>
					<li><a href="#">College Expenses</a></li>
					<li><a href="#">Organization Charts</a></li>
					<li><a href="#">College Statistics</a></li>
					<li><a href="#">Employee Directory</a></li>
					<li><a href="#">Locations</a></li>
					<li><a href="#">Rappenings</a></li>
					<li><a href="#">VCCS</a></li>
					<li><a href="#">Strategy & Effectiveness</a></li>
					<li><a href="#">Support RCC</a></li>
					<li><a href="#">Employee Login</a></li>
					<li><a href="#">Site Map</a></li>
				</ul> -->
			</li>
    <li id="site-search" class="horz-menu-list-item horz-menu-list-item--site-search">
<script>
var myCallback = function() {
  if (document.readyState == 'complete') {
    // Document is ready when CSE element is initialized.
    // Render an element with both search box and search results in div with id 'test'.
    var $gcs = jQuery('#___gcse_0');
    $gcs.find('input.gsc-search-button').prop('value', '');
    $gcs.find('input.gsc-input').removeClass('gsc-input').addClass('global-search-input');
    var $search_button = jQuery('#___gcse_0').find('td.gsc-search-button').html();
    $gcs.find('td.gsc-search-button, td.gsc-clear-button').remove();
    $gcs.find('td.gsc-input').addClass('global-search-button').append($search_button);
    jQuery('#gsc-i-id1').prop('placeholder','Search this site')
    	.removeClass('gsc-input')
    	.addClass('global-search-input')
    	.on('click', function(e){
    		$(this).addClass('is-hover').siblings('input').addClass('is-hover');
    	})
    	.on('mouseenter', function(e){
    		$(this).addClass('is-hover').siblings('input').addClass('is-hover');
    	})
    	.on('mouseleave', function(e){
    		$(this).removeClass('is-hover').siblings('input').removeClass('is-hover');
    	});
    	$gcs.find('.gsc-control-searchbox-only').fadeIn();
  } else {
    // Document is not ready yet, when CSE element is initialized.
    var $gcs = jQuery('#___gcse_0');
    $gcs.find('input.gsc-search-button').prop('value', '');
    $gcs.find('input.gsc-input');
    var $search_button = jQuery('#___gcse_0').find('td.gsc-search-button').html();
    $gcs.find('td.gsc-search-button, td.gsc-clear-button').remove();
    $gcs.find('td.gsc-input').addClass('global-search-button').append($search_button);
    jQuery('#gsc-i-id1').prop('placeholder','Search this site')
    	.removeClass('gsc-input')
    	.addClass('global-search-input')
    	.on('click', function(e){
    		$(this).addClass('is-hover').siblings('input').addClass('is-hover');
    	})
    	.on('mouseenter', function(e){
    		$(this).addClass('is-hover').siblings('input').addClass('is-hover');
    	})
    	.on('mouseleave', function(e){
    		$(this).removeClass('is-hover').siblings('input').removeClass('is-hover');
    	});
    	$gcs.find('.gsc-control-searchbox-only').fadeIn();

  }
};

// Insert it before the CSE code snippet so that cse.js can take the script
// parameters, like parsetags, callbacks.
window.__gcse = {
  callback: myCallback
};

(function() {
  var cx = '008203677889488416766:mgnbpcq68be'; // Insert your own Custom Search engine ID here
  var gcse = document.createElement('script');
  gcse.type = 'text/javascript';
  gcse.async = true;
  gcse.src = (document.location.protocol == 'https' ? 'https:' : 'http:') +
      '//www.google.com/cse/cse.js?cx=' + cx;
  var s = document.getElementsByTagName('script')[0];
  s.parentNode.insertBefore(gcse, s);
})();
</script>
<gcse:searchbox-only></gcse:searchbox-only>
    </li>
	</ul>
</div>