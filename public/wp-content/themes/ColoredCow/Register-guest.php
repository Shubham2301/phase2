<?php 
 /**
 * Template Name: Register_form
 */
?>

<?php get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1> REGISTER FOR THIS EVENT</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">		
			<div id="postbox">
				<form id="add_subscriber_form" >
					<div>
						<input type="hidden" value="add_subscriber" name="action" class="form-control" />
						<label for="name">name</label>
						<br />
						<input type="text" id="name" size="20" name="name" class="form-control" required />
					</div>
					<div>
						<label for="phone">Phone No.</label>
						<br />
						<input type="number" id="phone" size="10" name="phone" class="form-control" required />
					</div>
					<div>
						<label for="email">Email</label>
						<br />
						<input type="email" id="email" size="40" name="email" class="form-control" required />
					</div>
					<div>
						<label for="password">Password</label>
							<br />
							<input type="password" id="password" name="password" class="form-control" required />
					<div>
						<label for="gender">Gender</label>	
						</br>
						<input type="radio" name="gender" value="Male" id="Male">Male
						<input type="radio" name="gender" value="Female" id="Female">Female
					</div>	
					<div>
						<button type="button" name="save" id="save_id" class="btn btn-success">Submit</button>
					</div>		
				</form>
			</div>
		</div>
	</div>
</div>		

<?php get_footer(); ?>