<?php get_header(); ?>

<div class="page-sinf=gle-soiree">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<?php
					if(have_posts()):
						while (have_posts()) : the_post();
				?>
							<h1 class="page-title"><?php echo get_the_title();get_option('admin_email');?></h1>
							<p class="fade" id="rsvp-response-text"></p>
							<div class="row content text">
								<div class="col-lg-12 text-center">
									<div><?php echo wpautop(get_the_content());?></div>
								</div>
							</div>
							<div class="row soiree_dates text">
								<div class="col-lg-6 text-center">
									<div>Soiree Date:</div>
									<div><?php echo get_field('event_date');?></div>
								</div>
								<div class="col-lg-6 text-center">
									<div>Last Registration Date:</div>
									<div><?php echo get_field('last_date');?></div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 rsvp text">
									<p class="row link text-center">Already have a guest account?? RSVP HERE</p>
									<form id="verification_form" class="text-left form-horizontal">
											<input type="hidden" value="verify_credentials" name="action">
											<label for="email">ENTER YOUR EMAIL</label>
											<br>
											<input type="email"  id="guest_email" name="guest_email" required class="form-control input-lg" placeholder="enter your email here">
										 	<label for="password">PASSWORD</label>
											<br>
											<input type="password" id="password" name="password" required class="form-control input-lg" placeholder="enter your password here">
										<br>
											<button type="button" id="submit_field" name="submit_here" class="btn btn-primary btn-md btn-block ">RSVP</button>
									</form>
								</div>
								<div class="col-md-8 rsvp text">
									<?php
										$page = get_page_by_title("Register Guest");
										$link_register_page = get_page_link($page->ID) . "?eid=" . $post->ID;
									?>
									<p class="row link text-center"> If not! then hurry up and become a guest user by:</p>
									 <a class="btn btn-primary btn-lg" role="button" href="<?php echo $link_register_page;?>" target="_blank">REGISTERING HERE</a>
								</div>
							</div>
				<?php
						endwhile;
					endif;
					wp_reset_query();
				?>
			</div>
		</div>
	</div>
</div>

<?php get_footer();?>