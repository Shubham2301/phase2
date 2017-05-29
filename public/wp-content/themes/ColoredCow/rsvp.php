<?php
/**
 * Template Name: RSVP
 */
?>
<?php get_header(); ?>

	<div>
		<form id="verification_form">
			<div>
				<input type="hidden" value="verify_credentials" name="action"/>
			</div>
			</br>
			<div>
				<label for="email">enter your email</label>
				<br>
				<input type="email"  id="guest_email" name="guest_email1" required>
			</div>
			<br>
			<div>
				<button type="button" id="submit_field" name="submit_here" class="btn btn-success">Click</button>
			</div>
		</form>	
	</div>	 
	
<?php get_footer(); ?>