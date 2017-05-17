<?php
/**
 * Template Name: Landing
 */
?>

<?php get_header(); ?>

<div id="postbox">
	<form id="add_subscriber_form" >
		<div>
			<input type="hidden" value="add_subscriber" name="action" />
			<label for="name">name</label><br />
			<input type="text" id="name" size="20" name="name" />
		</div>
		<div>
			<label for="phone">Phone No.</label><br />
			<input type="number" id="phone" size="10" name="phone" />
		</div>
		<div>
			<label for="email">Email</label><br />
			<input type="email" id="email" size="40" name="email" />
		</div>
		<br>	
		<div>
			<button type="button" name="save" id="save_id" class="btn">Submit</button>
		</div>		
	</form>
</div>

<?php get_footer(); ?>