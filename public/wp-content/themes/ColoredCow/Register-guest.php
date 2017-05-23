<?php 
 /**
 * Template Name: Register_form
 */
?>

<?php get_header(); ?>

<div id="postbox">
	<form id="add_subscriber_form" >
		<div>
			<input type="hidden" value="add_subscriber" name="action" />
			<label for="name">name</label>
			<br />
			<input type="text" id="name" size="20" name="name" required />
		</div>
		<div>
			<label for="phone">Phone No.</label>
			<br />
			<input type="number" id="phone" size="10" name="phone" required />
		</div>
		<div>
			<label for="email">Email</label>
			<br />
			<input type="email" id="email" size="40" name="email" required />
		</div>
		<div>
			<label for="gender">Gender</label>	
			</br>
			<select>
				<option value="Male">M</option>
				<option value="Female">F</option>
			</select>
			<!-- <input type="radio" name="gender" value="Male" id="Male">Male
			<input type="radio" name="gender" value="Female" id="Female">Female -->
		</div>	
		<div>
			<button type="button" name="save" id="save_id" class="btn btn-success">Submit</button>
		</div>		
	</form>
</div>

<?php get_footer(); ?>