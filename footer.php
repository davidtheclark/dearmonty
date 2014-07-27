<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package dearmonty
 */
?>

    	</div>

    	<footer class="site-footer bg-brown">

        <div class="cc p-y-lg">

          <div class="row">
            <div class="col col-third-guttered">
              <a href="#" class="action action-learn">
                <span class="icon icon-inline grunticon-arrow-up-white"></span>
                Back to Top
              </a>
            </div>
            <div class="col col-third-guttered">
              <a href="<?php echo get_permalink(39); ?> " class="action action-ask">
                <span class="icon icon-inline grunticon-quill-white"></span>
                Ask a Question
              </a>
            </div>
            <div class="col col-third-guttered">
              <a href="<?php echo get_permalink(41); ?> " class="action action-find">
                <span class="icon icon-inline grunticon-profile-white"></span>
                Find an Agent
              </a>
            </div>
          </div>

          <form id="subscribe" action="http://dearmonty.us8.list-manage.com/subscribe/post" method="POST" class="footer-signup f-center">
            <input type="hidden" name="u" value="4383b02db8a051c3d24713404">
            <input type="hidden" name="id" value="f8590afd7e">

            <label for="signup-email" class="footer-signup-blurb">Sign up to read new articles every Tuesday</label>
            <input id="signup-email" type="email" name="MERGE0" placeholder="Enter your email">
            <button id="signup-submit" type="submit" class="btn btn-rust">
              <span class="icon icon-sm icon-inline grunticon-envelope-white"></span>
              Subscribe
            </button>
          </form>

          <div class="row">

            <div class="col col-third">
              <div class="footer-logo"></div>
            </div>

            <nav class="col col-third footer-nav-primary-c">
              <?php wp_nav_menu( array(
                'theme_location' => 'footer_main',
                'menu_class' => 'footer-nav-primary',
                'container' => ''
              )); ?>
            </nav>

            <div class="col col-third footer-fine-print">
              <nav>
                <?php wp_nav_menu( array(
                  'theme_location' => 'footer_fine_print',
                  'menu_class' => 'footer-nav-secondary',
                  'container' => ''
                )); ?>
              </nav>
              <div class="footer-copy f-sm">&copy; 2014 DearMonty.com, LLC,<br>All Rights Reserved</div>
            </div>
          </div>
        </div>
    	</footer>

    </div>

    <script>
      (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
      function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
      e=o.createElement(i);r=o.getElementsByTagName(i)[0];
      e.src='//www.google-analytics.com/analytics.js';
      r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
      ga('create','UA-28903180-1','auto');ga('send','pageview');
    </script>

    <?php wp_footer(); ?>

  </body>
</html>