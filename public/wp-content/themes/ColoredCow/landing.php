<?php

/**
 * Template Name: Landing
 */

    get_header();
?>

<?php $args = array( 'post_type' => 'guest', 'posts_per_page' => 5 );
 echo "<table>";
 echo "<thead>";
 echo "<tr>";
 echo "<th>".'name'."</th>";
 echo "<th>".'phone '."</th>";
 echo "<th>".'email'."</th>";
 echo "</tr>";
 echo "</thead>";
 
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
  // the_title();
  // //echo '<div class="entry-content">';
  // // the_content();
  // echo "<br>";
  // the_field('phone');
  // echo "<br>";
  // the_field('Email');
  // echo "<br>";
  //echo '</div>';
  echo "<tbody>";
  echo "<tr>";
  echo "<td>".the_title()."</td>";
  echo "<td>".thE_field('phone')."</td>";
  echo "<td>".thE_field('Email')."</td>";
  echo "</tr>";	
  echo "<br>";
  echo "</tbody>";
  
endwhile;
echo "</table>";
 	
?>

<?php 
    get_footer(); 
?>