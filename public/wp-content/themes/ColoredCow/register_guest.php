<?php 
 /**
 * Template Name: Register form
 */
?>

<?php get_header(); ?>

<!-- <?php $title = get_the_title($_GET['eid']);?> -->
<div class="guest-register-page">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="page-title"> Create a guest account. We just need your few details</h1>
			</div>
		</div>
		<div class="row page-alerts">
			<div class="col-md-12 notices">
				<p class="fade" id="register-response-text"></p>
			</div>
		</div>		
		<div class="row register-form">
			<div class="col-md-12">
				<form id="add_subscriber_form" >
					<div class="row">
						<div class="col-md-6">
							<input type="hidden" value="add_subscriber" name="action" />
							<label for="name">NAME</label>
							<br>
							<input type="text" id="name" size="20" name="name" required class="form-control" placeholder="enter your name" />
						</div>
						<div class="col-md-6">
							<label for="password">PASSWORD</label>
							<br>
							<input type="password" id="password" name="password" required class="form-control" placeholder="select a password for your account" />
						</div>
					</div>
					<div class="row">	
						<div class="col-md-6">
							<label for="phone">PHONE NO.</label>
							<br>
							<input type="number" id="phone" size="10" name="phone" required class="form-control" placeholder="enter your contact number" />
						</div>
						<div class="col-md-6">
							<label for="email">EMAIL</label>
							<br>
							<input type="email" id="email" size="40" name="email" required class="form-control" placeholder="enter your contact email" />
						</div>
					</div>	
					<div class="row gender">
						<label for="gender">GENDER</label>	
						<br>
						<div class=radio-gender>
							<input type="radio" name="gender" value="male" id="acf-field-gender-male">Male
							<input type="radio" name="gender" value="female" id="acf-field-gender-female">Female 
						</div>
					</div>	
					<div>
						<button type="button" name="save" id="save_id" class="btn btn-primary">Create guest Account</button>
					</div>		
				</form>
			</div>
		</div>
	</div>
</div>		


<?php get_footer(); ?>