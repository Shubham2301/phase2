<?php 
 /**
 * Template Name: Register form
 */
?>

<?php get_header(); ?>

	<form id="add_subscriber_form" >
		<div>
			<input type="hidden" value="add_subscriber" name="action" />
			<label for="name">NAME</label>
			<br>
			<input type="text" id="name" size="20" name="name" required />
		</div>
		<div>
			<label for="phone">PHONE NO.</label>
			<br>
			<input type="number" id="phone" size="10" name="phone" required />
		</div>
		<div>
			<label for="email">EMAIL</label>
			<br>
			<input type="email" id="email" size="40" name="email" required />
		</div>
		<div>
			<label for="password">PASSWORD</label>
			<br>
			<input type="password" id="password" name="password" required />
		</div>	
		<div>
			<label for="gender">GENDER</label>	
			<br>
			<input type="radio" name="gender" value="male" id="Male">Male
			<input type="radio" name="gender" value="female" id="Female">Female 
		</div>	
		<div>
			<button type="button" name="save" id="save_id" class="btn btn-success">Submit</button>
		</div>		
	</form>

<?php get_footer(); ?>