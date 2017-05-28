<?php
/**
 * Template Name: RSVP
 */
?>
<?php get_header() ?>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>RSVP FOR THIS EVENT</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">		
				 <form id="verification_form">
					 <div>
						 <input type="hidden" value="verify_credentials" name="action" class="form-control" />
					 </div>
					 </br>
					 <div>
						 <label for="email">enter your email</label>
						 <br>
						 <input type="email"  id="guest_email" name="guest_email" class="form-control" required>
					 </div>
					 <div>
					 	 <label for="password">Password</label>
						 <br>
						 <input type="password" id="password" name="password" class="form-control" required>
					 </div>
					 <br>
					 <div>
						 <button type="button" id="submit_field" name="submit_here" class="btn btn-success ">Click</button>
					 </div>
				 </form>	
			</div>
		</div>		 
	</div>	

<?php get_footer() ?>