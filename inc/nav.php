<?php
  global $blog_id;
  if ( $blog_id == 1 ) {
    //Do nothing
  } else {
    switch_to_blog( 1 );
  }
?>
<div class="horz-menu--global-pad" id="horz-menu--global-pad"></div>
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
            <li><a href="/employees/">Employee Login</a></li>

        </ul>
      </div>
      </li>
      <?php ab11_global_nav_menu( 'whyrcc', 'Why RCC?' ); ?>
      <?php ab11_global_nav_menu( 'programs', 'Programs & Courses' ); ?>
      <?php ab11_global_nav_menu( 'getstarted', 'Get Started' ); ?>
      <?php ab11_global_nav_menu( 'services', 'Student Services' ); ?>
			<?php ab11_global_nav_menu( 'explore', 'Explore RCC' ); ?>

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
<?php restore_current_blog(); ?>