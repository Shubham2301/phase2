<?php
/**
 * Template Name: RSVP
 */
?>
<?php get_header() ?>


<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1 class="text-center">RSVP FOR THIS EVENT</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">		
			<form id="verification_form" class="text-left form-horizontal">
				<div>
					<input type="hidden" value="verify_credentials" name="action">
				</div>
				<br>
				<div>
					<label for="email">ENTER YOUR EMAIL</label>
					<br>
					<input type="email"  id="guest_email" name="guest_email" required class="form-control input-lg" placeholder="enter your email here">
				</div>
				<div>
				 	<label for="password">PASSWORD</label>
					<br>
					<input type="password" id="password" name="password" required class="form-control input-lg" placeholder="enter your password here">
				</div>
				<br>
				<div>
					<button type="button" id="submit_field" name="submit_here" class="btn btn-success btn-lg btn-block">SUBMIT</button>
				</div>
			</form>		 
		</div>
	</div>		 
</div>	

<?php get_footer() ?>
