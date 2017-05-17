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
		echo '<input type="email" class="email" id="guest_email" required>';
	echo '</div>';	 
	?>

<?php get_footer(); ?>