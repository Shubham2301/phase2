<?php

/**
 * Template Name: Landing
 */

    get_header();
?>

<?php $args = array( 'post_type' => 'guest', 'posts_per_page' => 5 );
 
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
  the_title();
  //echo '<div class="entry-content">';
  // the_content();
  echo "<br>";
  the_field('phone');
  echo "<br>";
  the_field('email');
  echo "<br>";
  //echo '</div>';

endwhile;

?>

<?php 
    get_footer(); 
?>