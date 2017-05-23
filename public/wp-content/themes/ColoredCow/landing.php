<?php
/**
 * Template Name: Landing
 */
?>

<?php get_header(); ?>
<?php
	$args = array( 'post_type' => 'Soiree', 'posts_per_page' => 1 );
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post();
		echo '<div class="soiree_name">';
			echo '<h1>';
				the_title(); 
			echo '</h1>';
		echo '</div>';
		echo '<div class="entry-content">';
			echo '<h3>';
				the_content();
			echo '</h3>';	
		echo '</div>';
		echo '<div class="soiree_date">';
			echo '<span class="event_date">Soiree Date:</span>';
			the_field('event_date');
		echo "</div>";		
		echo '<div class="soiree_date">';
			echo '<span class="last_date">Last Registration Date:</span>';
			the_field('last_date');
		echo "</div>";	
		echo '<div class="link">';
			echo'<a href=" http://public.dev/rsvp/" target="_blank">Click Here to RSVP for this Event</a>';
		echo '</div>';
		echo '<div class="link">';
			echo'<a href=" http://public.dev/register/" target="_blank">Click Here to Register for this Event</a>';
		echo '</div>';
	endwhile;	
?>

<?php get_footer(); ?>