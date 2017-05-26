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
			<h1> <?php get_the_title(); ?> </h1>
		</div>
		<div class="entry-content">
			<h3> <?php get_the_content(); ?> </h3>	
		</div>
		<div class="soiree_date">
			<span class="event_date">Soiree Date:</span>
			<?php get_field('event_date'); ?>
		</div>		
		<div class="soiree_date">
			<span class="last_date">Last Registration Date:</span>
			<?php get_field('last_date'); ?>
		</div>	
		<div class="button">
			<a href=" http://public.dev/rsvp/" target="_blank">Click Here to RSVP for this Event</a>
		</div>

	<?php endwhile;	 ?>

<?php get_footer(); ?>