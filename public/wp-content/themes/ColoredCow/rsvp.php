<?php
/**
 * Template Name: Rsvp
 */
?>
<?php get_header(); ?>

	<?php 
	echo '<div>';
		echo '<form id="verification_form">';
			echo "<div>";
				echo '<input type="hidden" value="verify_field" name="action"/>';
			echo "</div>";
			echo "</br>";
			echo "<div>";
				echo '<label for="email">enter your email</label>';
				echo "<br>";
				echo '<input type="email"  id="guest_email" name="guest_email1" required>';
			echo "</div>";
			echo "<br>";
			echo "<div>";
				echo '<button type="button" id="submit_field" name="submit_here" class="btn btn-success">Click</button>';
			echo "</div>";
		echo "</form>";	
	echo '</div>';	 
	?>

<?php get_footer(); ?>