<?php
/**
 * Template Name: Search Results
 *
 * @package dearmonty
 */

get_header(); ?>

<div class="cc cc-med row">

  <main id="search-results-c" class="col col-main">

    <h1>
      <div class="heading heading-4">Search results for</div>
      <div class="heading heading-1">
        &ldquo;<?php echo $_GET['q']; ?>&rdquo;</div>
    </h1>

    <script>
      (function() {
        var cx = '016029436127461204131:xu04bzsrofm';
        var gcse = document.createElement('script');
        gcse.type = 'text/javascript';
        gcse.async = true;
        gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
            '//www.google.com/cse/cse.js?cx=' + cx;
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(gcse, s);
      })();
    </script>
    <gcse:searchresults-only></gcse:searchresults-only>

  </main>

  <aside class="col col-side well well-brown well-shadowed">
      <?php include "module-recent.php"; ?>
  </aside>

</div>

<?php get_footer(); ?>