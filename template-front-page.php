<?php
/**
 * Template Name: RCC Home Page
 *
 * This is the template that displays the RCC Home Page
 * Version: 11.0.0
 *
 * @package WordPress
 * @subpackage Awaken_Benehime
 * @since Awaken Benehime V11
 */

get_header(); ?>
<!-- <div class="background-block blue30 no-hover"></div> -->
    <div id="primary" class="site-content">
        <div id="content" role="main">
            <div class="billboard blue30 no-hover billboard-full-width" id="billboard">
            <?php echo get_new_royalslider(1); ?>
        </div><!-- .billboard -->
     <div id="container-main" class="container container-main clearfix">
        <a href="#" class="cube cube1 grid-6 cta-future rcc-blue biggest" id="cta-future">Your future starts here</a>
        <a href="#" class="cube cube2 grid-3 green bigger" id="currentCta2">Summer 2013 Course List</a>
        
        <a href="#" class="cube cube3 grid-3 pink" id="">Our next session starts in <span class="display-block no-margin biggest">13 Days</span></a>
        <!-- <a href="#" class="cube cube4 grid-3 orange bigger" id="">Apply to RCC Today</a> -->
        <a href="#" class="cube cube4 grid-3 orange bigger" id="">Apply to RCC Today</a>
        <a href="#" class="cube cube5 grid-6 cta-current rcc-blue biggest" id="cta-current">Fall 2012 Schedule</a>

        <a href="#" class="cube cube6 grid-3 purple bigger" id="">Paying for college</a>

        <div class="cube cube7 grid-3 active-data-embed purple no-hover" id="active-data-embed">
            <h3>Current Events</h3>
            <div id="adx060196" class="active-data-content">Loading Events...</div>
        </div>
        <div class="cube cube8 grid-3 rcc-green important-links no-hover" id="important-links">
            <h3>Updates and Announcements</h3>
            <ul class="important-links-content">
                <li class="cta">
                    <a href="#">The Warsaw Testing Center is moving and will be closed on Monday, June 3 and Tuesday, June 4.</a>
                </li>
                <li class="cta">
                    <a href="#">Read this month's issue of Student Health 101!</a>
                </li>
                 <li class="cta">
                 <a href="#">Sign up for RCC Alert, RCC's TXT, Email, and voice alert messaging system.</a>
                 </li>
                 <li class="cta">
                     <a href="#">Donate to RCC! Give now to the RCC Foundation</a>
                 </li>
            </ul>
        </div>
        <a class="cube cube9 grid-3 rcc-blue" id="cta-course1" href="/schedule/?semid=2124&subject=JPN">New Students SOAR in 
            <span class="display-block no-margin biggest">36 Days</span>
        </a>
        <div class="cube cube10 grid-3 orange no-hover" id="apply-today">
            <h3>RCC should offer</h3>
            <form class="cube-form">
            <div class="potential-course">
                <input type="checkbox" id="course1" name="course1" value="" class="hidden">
                <label for="course1">Burn Unit Nursing</label>
            </div>
            <div class="potential-course">
                <input type="checkbox" id="course2" name="course2" value="" class="hidden">
                <label for="course2">Mobile App Development</label>
            </div>
            <div class="potential-course">
                <input type="checkbox" id="course3" name="course3" value="" class="hidden">
                <label for="course3">Marine Biology</label>
            </div>
            </form>
        </div>
        <a href="#" class="cube cube11 grid-3 pink big" id="cta-program1">General Engineering Technology Degree</a>
        <a href="#" class="cube cube12 grid-3 green big" id="cta-program2">Psychology & Social Work Degree</a>
        <div class="grid-3 rappenings">
            <h2 class="no-margin">Recent Rappenings</h2>
            <p class="tagline no-margin">A look into the daily life of RCC.</p>
        </div>
        <a href="#" class="cube grid-3 rappening" id="rappening1">
            <img src="<?php bloginfo('template_directory'); ?>/img/rappening1.jpg" />
            Rappahannock chief addresses RCC audiences
        </a>
        <a href="#" class="cube grid-3 rappening" id="rappening2">
            <img src="<?php bloginfo('template_directory'); ?>/img/rappening2.jpg" />
            RCC co-sponsors Green Vendor Fair
        </a>
        <a href="#" class="cube grid-3 rappening" id="rappening3">
            <img src="<?php bloginfo('template_directory'); ?>/img/rappening6.jpg" />
            RCC’s Opportunity 2012! campaign now taking online donations
        </a>

        <div class="cube grid-6 blue190 cube-contact no-hover" id="cube-contact">
            <h3>Contact Us</h3>
              <ul class="contact-info float-left">
                <li class="name"><a href="/about/glenns/">Glenns Campus</a></li>
                <li class="phone">Phone 804.758.6700</li>
                <li class="phone">Toll-Free 800.836.9381</li>
                <li class="phone">Fax 804.758.3852</li>
                <li class="address">12745 College Drive</li>
                <li class="address">Glenns, VA 23149</li>
              </ul>
              <ul class="contact-info float-left">
                <li class="name"><a href="/about/warsaw/">Warsaw Campus</a></li>
                <li class="phone">Phone 804.333.6700</li>
                <li class="phone">Toll-Free 800.836.9379</li>
                <li class="phone">Fax 804.333.0106</li>
                <li class="address">52 Campus Drive</li>
                <li class="address">Warsaw, VA 22572</li>
              </ul>
              <ul class="contact-info float-left">
                  <li class="name"><a href="/about/king-george">King-George Site</a></li>
                  <li class="phone">Phone 540.775.0087</li>
                  <li class="address">10100 Foxes Way</li>
                  <li class="address">King George, VA 22485</li>
              </ul>
              <ul class="contact-info float-left">
                <li class="name"><a href="/about/kilmarnock">Kilmarnock Center</a></li>
                <li class="phone">Phone 804.435.8970</li>
                <li class="address">447 N. Main St</li>
                <li class="address">Kilmarnock, VA 22482</li>
              </ul>
        </div>
        <div class="cube grid-2 cube-social cube13" id="cube13">
            <h2>Like</h2>
        </div>
        <div class="cube grid-2 cube-social cube14" id="cube14">
            <h2>Follow</h2>
        </div>
        <div class="cube grid-2 cube-social cube15" id="cube15">
            <h2>Watch</h2>
        </div>
        <div class="cube grid-2 cube-social cube16" id="cube16">
            <h2>Read</h2>
        </div>
        <a href="https://alert.rappahannock.edu" class="cube grid-2 cube-social cube17 bigger" id="cube17">Alert</a>
        <div class="cube grid-2 cube-social cube18" id="cube18">
            <h2>Learn</h2>
        </div>
    </div>
    </div><!-- #content -->
</div><!-- #primary -->
<?php get_footer(); ?>




