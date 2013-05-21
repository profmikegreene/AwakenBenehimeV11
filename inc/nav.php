<div class="horz-menu horz-menu--global grey">
	<a class="horz-menu-toggle horz-menu-toggle--global" href="#">Menu</a>
	<ul class="horz-menu-list horz-menu-list--global">
		<li class="horz-menu-list-item horz-menu-list-item-my-rcc">
        <a class="rcc-blue global-myrcc" href="#" id="global-myrcc">myRCC</a>
        <ul class="horz-menu-sublist horz-menu-sublist--global-myrcc" id="horz-menu-sublist--global-myrcc">
            <li>
	            <form class="myrcc-login-form" method="POST" name="authx" action="https://rcc.my.vccs.edu/login" onsubmit="return myVCCSValidate();" id="myrcc-login-form">
	              <input type="text" name="vccs-id" id="vccs-id" tabindex="1" placeholder="Username">
	              <br />
	              <input type="password" name="password-temp" tabindex="2" placeholder="Password">
	              <br />
	              <input type="submit" name="submit" value="Log In"  class="blue190 button" tabindex="3"/>
	              <input type="hidden" name="password" />
	              <input type="hidden" name="myvccs-url" value='' />
	              <input type="hidden" name="request-url" value='https://rcc.my.vccs.edu/jsp/login.jsp?null' />
	            </form>
	            <div class="clearfix"></div>
	          </li>
	          <li><a href="/helpdesk/">Need help with myRCC?</a></li>

        </ul>
      </li>
			<li class="horz-menu-list-item horz-menu-list-item--why-rcc ">
				<a href="#">Why RCC?</a>
				<ul class="horz-menu-sublist">
					<li><a href="#">Quality education</a></li>
					<li><a href="#">Build your foundation</a></li>
					<li><a href="#">Transfer</a></li>
					<li><a href="#">The cost of college</a></li>
					<li><a href="#">Many types of financial aid</a></li>
					<li><a href="#">Vibrant student life</a></li>
					<li><a href="#">Cutting edge technology</a></li>
				</ul>
			</li>
			<li class="horz-menu-list-item horz-menu-list-item--programs">
				<a href="#">Programs & Courses</a>
				<ul class="horz-menu-sublist ">
					<li><a href="#">Course Schedule</a></li>
					<li><a href="#">Programs of Study</a></li>
					<li><a href="#">Distance Learning</a></li>
					<li><a href="#">Dual Enrollment</a></li>
					<li><a href="#">Academic Calendar</a></li>
					<li><a href="#">General Education Goals</a></li>
				</ul>
			</li>
			<li class="horz-menu-list-item horz-menu-list-item--get-started">
				<a href="#">Get Started</a>
				<ul class="horz-menu-sublist ">
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
				</ul>
			</li>
			<li class="horz-menu-list-item horz-menu-list-item--services">
				<a href="#">Student Services</a>
				<ul class="horz-menu-sublist ">
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
				</ul>
			</li>
			<li class="horz-menu-list-item horz-menu-list-item--explore">
				<a href="#">Explore RCC</a>
				<ul class="horz-menu-sublist ">
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
				</ul>
			</li>
    <li id="site-search" class="horz-menu-list-item horz-menu-list-item--site-search">
	    <div id="test"></div>

<script>
var myCallback = function() {
  if (document.readyState == 'complete') {
    // Document is ready when CSE element is initialized.
    // Render an element with both search box and search results in div with id 'test'.
    jQuery('#gsc-i-id1').prop('placeholder','Search this site');
    jQuery('#___gcse_0').find('input.gsc-search-button').prop('value', '');
  } else {
    // Document is not ready yet, when CSE element is initialized.
    jQuery('#gsc-i-id1').prop('placeholder','Search this site');
    jQuery('#___gcse_0').find('input.gsc-search-button').prop('value', '');

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




<script>
//   (function() {
//     var cx = '008203677889488416766:mgnbpcq68be';
//     var gcse = document.createElement('script');
//     gcse.type = 'text/javascript';
//     gcse.async = true;
//     gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
//         '//www.google.com/cse/cse.js?cx=' + cx;
//     var s = document.getElementsByTagName('script')[0];
//     s.parentNode.insertBefore(gcse, s);
//   })();
</script>
