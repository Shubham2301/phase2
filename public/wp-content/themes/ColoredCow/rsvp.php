<?php
/**
 * Template Name: Rsvp
 */
?>
<?php get_header(); ?>

	<?php 
	echo '<div>';
		echo '<label for="email">enter your email</label>';
		echo "<br>";
		echo '<input type="email"  id="guest_email" required>';
		echo "<br>";
		echo '<button type="button" id="submit_field" name="submit_here" class="btn btn-success">Click</button>';
	echo '</div>';	 
	?>

<?php get_footer(); ?>