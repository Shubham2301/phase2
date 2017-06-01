<?php
/**
 * Template Name: Landing
 */
?>

<?php get_header(); ?>

<div class="page-landing">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<?php
					$args = array('post_type' => 'soiree', 'posts_per_page' => 1);
					$loop = new WP_Query( $args);
					if($loop->have_posts()):
						while ($loop->have_posts()) : $loop->the_post();
				?>
								<h1 class="page-title"><?php echo get_the_title();?></h1>
								<div class="row content text">
									<div class="col-lg-12 text-center">
														<div><?php echo get_the_content();?></div>
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
				<?php
						endwhile;
					endif;
					wp_reset_query(); 
				?>
			</div>
		</div>
	</div>
	<br>
	<div class="container">
		<?php
			$page=get_page_by_title("RSVP"); 
			$link_rsvp=get_page_link($page->ID); 
		?>
		<p class="row link text">Already have a guest account?? <a class="btn btn-info btn-lg" role="button" href="<?php echo $link_rsvp;?>" target="_blank">RSVP HERE</a></p>
		<?php
			$page=get_page_by_title("Register Guest");
			$link_register_page=get_page_link($page->ID);
		?>
		<p class="row link text"> If not! then hurry up and become a guest user by: <a class="btn btn-info btn-lg" role="button" href="<?php echo $link_register_page;?>" target="_blank">REGISTERING HERE</a></p>
	</div>
</div>

			
		
<?php get_footer();?>