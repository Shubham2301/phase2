<?php
/**
 * Template Name: Landing
 */
?>

<?php get_header(); ?>

<div id="postbox">
	<form id="add_subscriber_form" >
		<div>
			<label for="title">Title</label><br />
			<input type="text" id="title" size="20" name="title" />
			<input type="hidden" value="add_subscriber" name="action" />
		</div>
		<div>
			<button type="button" name="save" id="save_id" class="btn">Submit</button>
		</div>		
	</form>
</div>

<?php get_footer(); ?>