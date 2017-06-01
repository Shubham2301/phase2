<?php 
 /**
 * Template Name: Register form
 */
?>

<?php get_header(); ?>

<?php 
	$title = get_the_title($_GET['eid']);
	// var_dump($title);
 ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1> REGISTER FOR THIS EVENT</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<form id="add_subscriber_form" >
				<div>
					<input type="hidden" value="add_subscriber" name="action" />
					<label for="name">NAME</label>
					<br>
					<input type="text" id="name" size="20" name="name" required class="form-control" />
				</div>
				<div>
					<label for="phone">PHONE NO.</label>
					<br>
					<input type="number" id="phone" size="10" name="phone" required class="form-control" />
				</div>
				<div>
					<label for="email">EMAIL</label>
					<br>
					<input type="email" id="email" size="40" name="email" required class="form-control" />
				</div>
				<div>
					<label for="password">PASSWORD</label>
					<br>
					<input type="password" id="password" name="password" required class="form-control" />
				</div>
				<div>
					<label for="gender">GENDER</label>
					<br>
					<input type="radio" name="gender" value="male" id="Male">Male
					<input type="radio" name="gender" value="female" id="Female">Female
				</div>
				<div>
					<button type="button" name="save" id="save_id" class="btn btn-success">SUBMIT</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php get_footer(); ?>