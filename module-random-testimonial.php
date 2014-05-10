<?php
// Query for testimonials.
$testimonials_args = array(
  'post_type' => 'testimonial',
  'orderby' => 'rand',
  'posts_per_page' => '1'
);
$testimonials_query = new WP_Query( $testimonials_args );
// The Loop
while ( $testimonials_query->have_posts() ):
  $testimonials_query->the_post();
?>
<?php include "module-testimonial-content.php"; ?>

<?php endwhile; ?>