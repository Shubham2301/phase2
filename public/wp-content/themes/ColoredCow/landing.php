<?php
/**
 * Template Name: Landing
 */
?>

<?php get_header(); ?>
<?php
	$args = array( 'post_type' => 'soiree', 'posts_per_page' => 1 );
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post();
?>	
		<div class="soiree_name">
			<h1><?php echo get_the_title();?></h1>
		</div>
		<div class="entry-content">
			<h3><?php echo get_the_content();?></h3>	
		</div>
		<div class="soiree_date">
			<h4><span class="event_date">Soiree Date:</span></h4>
			<h4><?php echo get_field('event_date'); ?></h4>
		</div>		
		<div class="soiree_date">
			<h4><span class="last_date">Last Registration Date:</span></h4>
			<h4><?php echo get_field('last_date'); ?></h4>
		</div>	
		<div class="button">
			<a href=" http://public.dev/rsvp/" target="_blank">Click Here to RSVP for this Event</a>
		</div>
		
<?php endwhile;	 ?>

<?php get_footer(); ?>