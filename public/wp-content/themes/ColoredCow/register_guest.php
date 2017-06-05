<?php 
 /**
 * Template Name: Register form
 */
?>

<?php get_header(); ?>

<div class="guest-register-page">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="page-title"> Create a guest account.</h1>
			</div>
		</div>
<<<<<<< HEAD
	</div>
	<div class="row">
		<div class="col-md-12">
			<form id="add_subscriber_form" >
				<div>
					<input type="hidden" value="add_subscriber" name="action" />
					<label for="name">NAME</label>
					<br>
					<input type="text" id="name" size="20" name="name" required class="form-control" placeholder="enter your name" />
				</div>
				<div>
					<label for="phone">PHONE NO.</label>
					<br>
					<input type="number" id="phone" size="10" name="phone" required class="form-control" placeholder="enter your contact number" />
				</div>
				<div>
					<label for="email">EMAIL</label>
					<br>
					<input type="email" id="email" size="40" name="email" required class="form-control" placeholder="enter your contact email" />
				</div>
				<div>
					<label for="password">PASSWORD</label>
					<br>
					<input type="password" id="password" name="password" required class="form-control" placeholder="select a password for your account" />
				</div>	
				<div>
					<label for="gender">GENDER</label>	
					<br>
					<input type="radio" name="gender" value="male" id="Male">Male
					<input type="radio" name="gender" value="female" id="Female">Female 
				</div>	
				<div>
					<button type="button" name="save" id="save_id" class="btn btn-success btn-block">SUBMIT</button>
				</div>		
			</form>
		</div>
	</div>
</div>	
<?php

// $post_meta = get_post_meta('event_id', 'event_users');
// if(!$post_meta ){
// 	// create post meta format
// 	add_post_meta(params);
// } else {
// 	// append to $post_meta
// 	update_post_meta(params);
// }

?>
=======
		<div class="row page-alerts">
			<div class="col-md-12">
				<p class="fade" id="register-response-text"></p>
			</div>
		</div>
		<div class="row register-form">
			<div class="col-md-12">
				<form id="add_subscriber_form" >
					<div class="row">
						<div class="col-md-6 field">
							<input type="hidden" value="add_subscriber" name="action" />
							<label for="name">NAME</label>
							<br>
							<input type="text" id="name" size="20" name="name" required class="form-control" placeholder="enter your name" />
						</div>
						<div class="col-md-6 field">
							<label for="password">PASSWORD</label>
							<br>
							<input type="password" id="password" name="password" required class="form-control" placeholder="select a password for your account" />
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 field">
							<label for="phone">PHONE NO.</label>
							<br>
							<input type="number" id="phone" size="10" name="phone" required class="form-control" placeholder="enter your contact number" />
						</div>
						<div class="col-md-6 field">
							<label for="email">EMAIL</label>
							<br>
							<input type="email" id="email" size="40" name="email" required class="form-control" placeholder="enter your contact email" />
						</div>
					</div>
					<div class="row gender field">
						<label for="gender">GENDER</label>
						<br>
						<div class=radio-gender>
							<input type="radio" name="gender" value="male" id="acf-field-gender-male" required>Male
							<input type="radio" name="gender" value="female" id="acf-field-gender-female">Female 
						</div>
					</div>
					<div>
						<button type="button" name="save" id="save_id" class="btn btn-primary">Create</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
>>>>>>> dfd0986ddf638f786f0f1221c5cbb3e52f7c7af9

<?php get_footer(); ?>