<?php
/**
 * Template Name: RSVP
 */
?>
<?php get_header() ?>

<form id="verification_form">
	<div>
		<input type="hidden" value="verify_credentials" name="action"/>
	</div>
	<br>
	<div>
		<label for="email">ENTER YOUR EMAIL</label>
		<br>
		<input type="email"  id="guest_email" name="guest_email" required>
	</div>
	<div>
	 	<label for="password">PASSWORD</label>
		<br>
		<input type="password" id="password" name="password" required>
	</div>
	<div>
		<button type="button" id="submit_field" name="submit_here" class="btn btn-success">Click</button>
	</div>
</form>		 


<?php get_footer() ?>
