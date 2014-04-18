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
            &copy; 2014 DearMonty.com, LLC, All Rights Reserved

            <nav class="footer-nav">
              <?php wp_nav_menu( array(
                'theme_location' => 'footer',
                'menu_class' => 'footer-nav',
                'container' => ''
              )); ?>
            </nav>
          </div>
      	</footer>

      </div>

    </div>

    <?php wp_footer(); ?>

  </body>
</html>