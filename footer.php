<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package dearmonty
 *
 * AS YOU ADD JAVASCRIPT files here, please consider adding them
 * to to the uglification process in Gruntfile.js.
 */
?>

      	</div>

      	<footer class="site-footer">

          <div class="container container-padded">

            <div class="row">
              <div class="grid-third">
                <a href="#wrapper" class="action action-learn">Back to Top</a>
              </div>
              <div class="grid-third">
                <a href="<?php echo get_permalink(39); ?> " class="action action-ask">Ask a Question</a>
              </div>
              <div class="grid-third">
                <a href="<?php echo get_permalink(41); ?> " class="action action-find">Find an Agent</a>
              </div>
            </div>

            <form id="subscribe" action="" class="footer-signup">
              <div class="footer-signup-blurb">Read new questions every Tuesday</div>
              <label for="signup-email" class="hide-visually">Enter your email</label>
              <input id="signup-email" type="email" placeholder="Enter your email">
              <button id="signup-submit" type="submit" class="btn btn-dark btn-sm">Subscribe</button>
            </form>

            <div class="row">

              <div class="grid-third">
                <div class="footer-logo"></div>
              </div>

              <nav class="grid-third footer-nav-primary-c">
                <?php wp_nav_menu( array(
                  'theme_location' => 'footer_main',
                  'menu_class' => 'footer-nav-primary',
                  'container' => ''
                )); ?>
              </nav>

              <div class="grid-third footer-fine-print">
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

    </div>

    <?php wp_footer(); ?>

  </body>
</html>