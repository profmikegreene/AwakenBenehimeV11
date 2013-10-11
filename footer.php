<div class="container container-footer clearfix">
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
    <div class="cube grid-2 cube-social facebook" id="cube-facebook">
        <h2>Like</h2>
    </div>
    <div class="cube grid-2 cube-social twitter" id="cube-twitter">
        <h2>Follow</h2>
    </div>
    <div class="cube grid-2 cube-social youtube" id="cube-youtube">
        <h2>Watch</h2>
    </div>
    <div class="cube grid-2 cube-social instagram" id="cube-instagram">
        <h2>See</h2>
    </div>
    <a href="https://alert.rappahannock.edu" class="cube grid-2 cube-social rccalert bigger" id="cube-rccalert">RCC Alert</a>
    <div class="cube grid-2 cube-social panopto" id="cube-panopto">
        <h2>Learn</h2>
    </div>
    <div class="cube rcc-blue no-hover cube-sitemap grid-12">
        <h3 class="">Sitemap</h3>
        <?php
        $filters = [
                'Dev Testing'                    => '',
                'Rappahannock Community College' => '',
                'Business and Community'         => '',
                'Forms'                          => ''
                ];
        ab11_list_blogs( $filters );
        ?>
    </div>

    <footer id="footer" class="footer blue190 no-hover clearfix grid-12">
    <ul>
        <li><a href="/humanresources/employment-opportunities/">Employment Opportunities</a></li>
        <li><a href="/policy">Policies and Guidelines</a></li>
        <li><a href="http://vadsa.org/scorecard/highered/RCC/Report_ndx.htm" target="_blank">Website Accessibility</a></li>
        <li><a href="/forms/report-a-problem-with-the-rcc-website/">Report a problem</a></li>
    </ul>
    <ul>
        <li class="copyright">©<?php echo date('Y') . ' Rappahannock Community College'; ?></li>
    </ul>
  </footer>
</div><!-- .container-footer -->
        <?php wp_footer(); ?>
        <!-- //-beg- concat_js -->
        <script src="/wp-content/themes/AwakenBenehimeV11/js/polyfills.js"></script>
        <!-- //-end- concat_js -->
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src='//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>