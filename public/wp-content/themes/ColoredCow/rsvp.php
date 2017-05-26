<?php
/**
 * Template Name: RSVP
 */
?>
<?php get_header() ?>

	
	<div>
		 <form id="verification_form">
			 <div>
				 <input type="hidden" value="verify_credentials" name="action"/>
			 </div>
			 </br>
			 <div>
				 <label for="email">enter your email</label>
				 <br>
				 <input type="email"  id="guest_email" name="guest_email" required>
			 </div>
			 <div>
			 	 <label for="password">Password</label>
				 <br>
				 <input type="password" id="password" name="password" required>
			 </div>
			 <div>
				 <button type="button" id="submit_field" name="submit_here" class="btn btn-success">Click</button>
			 </div>
		 </form>	
	</div>	 


<?php get_footer() ?>