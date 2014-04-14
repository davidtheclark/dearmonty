<?php
/**
 * Template Name: Search Results
 *
 * @package dearmonty
 */

get_header(); ?>

<main class="site-content" role="main">

    <div id="search-results-c" class="container container-padded">

        <h1>Search results for: <?php echo $_GET['q']; ?></h1>

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

    </div>

</main>

<?php get_footer(); ?>