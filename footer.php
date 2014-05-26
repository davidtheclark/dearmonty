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

    	<footer class="site-footer">

        <div class="container p-y-lg">

          <div class="row">
            <div class="col col-third-guttered">
              <a href="#" class="action action-learn">
                <span class="icon icon-inline grunticon-arrow-up-white"></span>
                Back to Top
              </a>
            </div>
            <div class="col col-third-guttered">
              <a href="<?php echo get_permalink(39); ?> " class="action action-ask">
                <span class="icon icon-inline grunticon-question-white"></span>
                Ask a Question
              </a>
            </div>
            <div class="col col-third-guttered">
              <a href="<?php echo get_permalink(41); ?> " class="action action-find">
                <span class="icon icon-inline grunticon-binoculars-white"></span>
                Find an Agent
              </a>
            </div>
          </div>

          <form id="subscribe" action="" class="footer-signup">
            <div class="footer-signup-blurb">Read new questions every Tuesday</div>
            <label for="signup-email" class="hide-visually">Enter your email</label>
            <input id="signup-email" type="email" placeholder="Enter your email">
            <button id="signup-submit" type="submit" class="btn btn-rust">Subscribe</button>
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


    <?php wp_footer(); ?>

  </body>
</html>