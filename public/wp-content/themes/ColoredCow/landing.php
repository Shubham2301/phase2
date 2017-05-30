<?php
/**
 * Template Name: Landing
 */
?>

<?php get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<?php
				$args = array('post_type' => 'soiree', 'posts_per_page' => 1);
				$loop = new WP_Query( $args);
				if($loop->have_posts()){
					while ($loop->have_posts()) : $loop->the_post();
			?>	
					<div class="soiree_name">
						<h1><?php echo get_the_title();?></h1>
					</div>
					<div class="entry-content">
						<h3><?php echo get_the_content();?></h3>	
					</div>
					<div class="soiree_date">
						<h4><span class="event_date">Soiree Date:</span></h4>
						<h4><?php echo get_field('event_date');?></h4>
					</div>		
					<div class="soiree_date">
						<h4><span class="last_date">Last Registration Date:</span></h4>
						<h4><?php echo get_field('last_date');?></h4>
					</div>	
					<div class="link">
						<?php
							$page=get_page_by_title("RSVP"); 
							$link_rsvp=get_page_link($page->ID); 
						?>
						<button class="btn btn-success form-control"><a href="<?php echo $link_rsvp;?>" target="_blank">Click Here to RSVP for this Event</a></button>
					</div>
					<br>
					<div class="link">
						<?php
							$page=get_page_by_title("Register Guest");
							$link_register_page=get_page_link($page->ID);
						?>
						<button class="btn btn-success form-control"><a href="<?php echo $link_register_page;?>" target="_blank">Click Here to Register for this Event</a></button>
					</div>

			<?php
					endwhile;
				}
				wp_reset_query(); 
			?>
		</div>
	</div>
</div>
<?php get_footer();?>