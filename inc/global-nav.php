<nav id="l-global-nav" class="l-global-nav vert-navbar grey <?php if ( is_user_logged_in() ) { echo 'l-global-nav--logged-in'; } ?>">
  <div id="mega-drop-button" class="mega-drop-button">
    <h3 id="responsive-menu" class="dropdown">Menu<span class="icon-dropdown-arrow">&#9660;</span></h3>
  </div>
	<div id="gn-bttons" class="vert-nav-element gn-buttons">
    <ul id="quick-links" class="quick-links">
      <li>
        <a class="rcc-blue button" href="#" id="global-myrcc">myRCC<span class="icon-dropdown-arrow">&#9660;</span></a>
        <div id="myrcc-dropdown" class="dropdown myrcc-dropdown">
            <form class="login-form" method="POST" name="authx" action="https://rcc.my.vccs.edu/login" onsubmit="return myVCCSValidate();" id="login-form">
              <label>Username</label>
              <input type="text" name="vccs-id" id="vccs-id" tabindex="-1">
              <br />
              <label>Password</label>
              <input type="password" name="password-temp" tabindex="1">
              <br />
              <input type="submit" name="submit" value="Log In"  class="blue button" tabindex="2"/>
              <input type="hidden" name="password" />
              <input type="hidden" name="myvccs-url" value='' />
              <input type="hidden" name="request-url" value='https://rcc.my.vccs.edu/jsp/login.jsp?null' />
              <p><a href="/helpdesk/">Need help with myRCC?</a></p>
            </form>
        </div>
      </li>
    </ul><!--end quickLinks-->
  </div><!--end buttons-->
  <div id="nav" class="rcc-nav vert-nav-element ">
    <div id="responsive-dropdown-menu" class="responsive-dropdown-menu">
    <ul id="main-architecture" class="vert-nav-element main-architecture">
      <li class="vert-nav-element nav-why-rcc"><a id="nav-why-rcc" href="#" title="Why RCC?" class="top-level">Why RCC? |</a>
      <div class="dropdown" id="nav__dropdown-why-rcc">
        <ul> 
          <li><a href="/catalog/about/who-we-are/">About RCC</a></li>	  					
          <li><a href="/about/academic-calendar/">Academic Calendar</a></li>					
          <li><a href="/catalog/about/accreditation/">Accreditation</a></li>						
          <li><a href="/friends">Alumni</a></li>	
          <li><a href="/studentservices/student-activities/athletics/">Athletics</a></li>					
          <li><a href="/renovation">Campus Map</a></li> 
          <li><a href="/safety">Campus Safety</a></li>	
          </ul> 
          <ul> 
          <li><a href="/academics/certificate-programs">Certificate Programs</a></li> 
          <li><a href="/catalog">College Catalog &amp; Student Handbook</a></li> 
          <li><a href="http://datapoint.apa.virginia.gov/exp/exp_checkbook_agency.cfm?AGYCODE=278" target="_blank">College Expenses</a></li>	
          <li><a href="/catalog/telephone-directory/">Contact Us</a></li> 
          <li><a href="/academics/degree-programs">Degree Programs</a></li> 
          <li><a href="/about/directions">Directions</a></li> 
          <li><a href="/foundation/ways-to-give">Donors</a></li>	

          </ul> 
          <ul> 
					<li><a href="/directory">Directory</a></li> 
          <li><a href="/studentservices/counseling-services/students-with-disabilities/">Disability Services</a></li> 
          <li><a href="/foundation">Foundation</a></li> 
          <li><a href="/future">Getting Started</a></li> 
          <li><a href="/effectiveness">Institutional Effectiveness</a></li> 
          <li><a href="/humanresources/employment-opportunities/">Jobs and Careers</a></li> 
          <li><a href="/about/king-george">King George Site</a></li> 
          </ul> 
          <ul> 
          <li><a href="/catalog/college-wide-policies/parking">Parking</a></li>						
          <li><a href="/about/presidents-welcome">President's Welcome Message</a></li> 
          <li><a href="/effectiveness/rcc-quick-facts">Quick Facts</a></li> 
          <li><a href="/rappenings">Rappenings</a></li> 
          <li><a href="/about/Strategic-Plan">Strategic Plan</a></li>  
          <li><a href="http://www.vawizard.org" target="_blank">Virginia Wizard</a></li> 
          <li><a href="http://www.vccs.edu" target="_blank">VCCS</a></li> 
          </ul> 
      </div><!--end about-nav--> 
      </li>    
      <li class="vert-nav-element academics-nav"><a id="academics-nav" href="#" title="Academics" class="top-level">Academics |</a> 
      <div class="dropdown" id="academics-nav-dropdown"> 
        <ul > 
          <li><a href="/academics/academic-advising">Academic Advising</a></li> 
          <li><a href="/academics/academic-calendar/">Academic Calendar</a></li> 
          <li><a href="/bookstore">Bookstore</a></li> 
          <li><a href="/academics/certificate-programs">Certificate Programs</a></li> 
        
          </ul> 
          <ul > 
          <li><a href="/schedule">Class Schedule</a></li> 
          <li><a href="/academics">Contact Academic Division</a></li> 
          <li><a href="/academics/degree-programs">Degree Programs</a></li> 
          <li><a href="/distancelearning">Distance Learning</a></li> 
          
          </ul> 
          <ul > 
          <li><a href="/admissions/dual-enrollment/">Dual Enrollment</a></li> 
          <li><a href="/fye">First Year Experience (FYE)</a></li> 
          <li><a href="/academics/gaa">Guaranteed Admission Agreements</a></li> 
          <li><a href="/academics/honors-program">Honors Program</a></li> 
          
           </ul> 
          <ul > 
          <li><a href="/academics/transfer-information">Transfer Information</a></li> 
          <li><a href="http://www.vawizard.org">VA Wizard</a></li> 
          </ul> 
        </div><!--end academics-nav--> 
      </li>        
      <li class="vert-nav-element admissions-nav"><a id="admissions-nav" href="#" title="Admissions" class="top-level">Admissions |</a> 
        <div class="dropdown" id="admissions-nav-dropdown"> 
          <ul > 
            <li><a href="/admissions/apply-for-admission/">Apply</a></li> 
            <li><a href="/admissions">Contact Admissions</a></li> 
            <li><a href="/admissions/dual-enrollment">Dual Enrollment</a></li> 
            <li><a href="/admissions/frequently-asked-questions/">FAQ's</a></li> 
            </ul> 
            <ul > 
          <li><a href="/financialaid">Financial Aid</a></li> 
            <li><a href="/admissions/forms/">Admission &amp; Records Forms</a></li> 
            <li><a href="/future">Getting Started</a></li> 
            <li><a href="/admissions/graduation">Graduation Requirements</a></li> 
            
            </ul> 
            <ul > 
            <li><a href="/academics/gaa">Guaranteed Admission Agreements</a></li> 
            <li><a href="/businessoffice/tuition-and-fees">Tuition and Fees</a></li> 
            <li><a href="/admissions/residency-requirements">Residency Requirements</a></li> 
            <li><a href="/admissions/getting-started-at-rcc/#placementtest">Placement Testing</a></li> 
            
            </ul> 
            <ul > 
            <li><a href="/admissions">Records</a></li> 
            <li><a href="/admissions/registration">Registration</a></li> 
            <li><a href="/admissions/transcripts">Transcripts</a></li> 
            </ul>    
      </div> <!--end admissions-nav--> 
      </li>       
      <li class="vert-nav-element departments-nav"><a id="departments-nav" href="#" title="Departments" class="top-level">Departments |</a> 
      <div class="dropdown" id="departments-nav-dropdown"> 
        <ul > 
          <li><a href="/academics">Academics</a></li> 
             <li><a href="/admissions">Admissions and Records</a></li> 
            <li><a href="/bookstore">Bookstore</a></li> 
            <li><a href="/businessoffice">Business Office</a></li> 
            <li><a href="/safety">Campus Safety</a></li> 
            </ul> 
            <ul > 
            <li><a href="/careerservices">Career Services</a></li> 
            <li><a href="/distancelearning">Distance Learning</a></li> 
            <li><a href="/directory">Employee Directory</a></li> 
            <!--<li><a href="/facilities">Facilities</a></li>--> 
            <li><a href="/financialaid">Financial Aid</a></li> 
            <li><a href="/foundation">Foundation</a></li> 
            </ul> 
            <ul > 
            
            <li><a href="/helpdesk">Help Desk</a></li> 
            <li><a href="/humanresources">Human Resources</a></li> 
            <li><a href="/security">Information Security</a></li> 
            <li><a href="/effectiveness">Institutional Effectiveness</a></li> 
            <li><a href="/learningresources">Learning Resources</a></li> 
            </ul> 
            <ul > 
            
            <li><a href="/odu">ODU at RCC</a></li> 
            <li><a href="/technology">Technology</a></li> 
            <li><a href="/studentservices">Student Services</a></li> 
            <li><a href="/sss">Student Support Services (SSS)</a></li> 
             </ul> 
      </div><!--end departments-nav--> 
      </li>        
      <li class="vert-nav-element library-nav"><a id="library-nav" href="#" title="Library" class="top-level">Library |</a> 
      <div class="dropdown" id="library-nav-dropdown"> 
        <ul > 
          <li><a href="/library">College Library</a></li> 
          <li><a href="/learningresources">Learning Resources</a></li> 
          <li><a href="/library/about-us-3">Contact the Library</a></li> 
          </ul> 
      </div><!--end libraryNav--> 
      </li>        
      <li class="vert-nav-element workforce-nav"><a id="workforce-nav" href="#" title="Workforce" class="top-level">Workforce</a>
      <div class="dropdown" id="workforce-nav-dropdown"> 
        <ul> 
          <li><a href="/workforce/adult-educationged">Adult Education/GED</a></li> 
          <li><a href="/wp-content/blogs.dir/28/files/2010/08/Apprenticeship.pdf">Apprenticeships</a></li> 
            <li><a href="/workforce/certifications-licensures">Certifications &amp; Licensures</a></li> 
            </ul> 
            <ul > 
            <li><a href="/workforce/contact-us">Contact Workforce</a></li> 
            <li><a href="/workforce/customized-training">Customized Training</a></li> 
            <li><a href="/workforce/community-service-training">Community Development</a></li> 
            </ul> 
            <ul > 
            <li><a href="/workforce/go-green">Go Green</a></li> 
            <li><a href="/workforce/middle-college">Middle College/Youth Services</a></li> 
            <li><a href="/workforce/register">Register Online</a></li> 
            
            </ul> 
            <ul > 
            <li><a href="http://www.rccworkforce.com">Regional Education Consortium</a></li> 
            <li><a href="/pdf/Workforce-Schedule-fa11.pdf">Schedule of Courses</a></li> 
         </ul> 
      </div>
      </li><!--end workforceNav-->     
    </ul><!--end navBar--> 
  </div>
  </div><!-- end nav --> 
   
  <div id="accessibility" class="accessibility vert-nav-element "> 
    <div id="site-search" class="site-search">
	    <!-- <div id="cse-search-form" style="width: 100%;">Loading</div> -->
      <form action="http://www.google.com/cse" id="cse-search-box"> 
		  	<div id="search-input" class="search-input"> 
			    <input type="hidden" name="cx" value="008203677889488416766:mgnbpcq68be" /> 
			    <input type="hidden" name="ie" value="UTF-8" /> 
			    <input class="search" type="text" name="q" tabindex="3" id="q" 
	               autocomplete="off" accesskey="s"/> 
        </div>
		    <div id="search-button" class="rcc-blue button search-button" >
          <label for="q" id="qlabel">Search</label>
          <span id="search-icon" class="icon-search icon"></span>
		      <input type="submit" id="search-submit" name="sa" value=" "  />
			  </div>
	    </form> 
    </div>
  </div><!--end accessibility-->
</nav><!--end globalNav--> 
<div id="mask" class="mask"></div>