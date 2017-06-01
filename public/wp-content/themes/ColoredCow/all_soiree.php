<?php
/**
 * Template Name: All-soirees
 */
?>

<?php get_header(); ?>
<div class="all-soiree-page">
	<?php
		$args = array('post_type' => 'soiree', 'posts_per_page' => 10);
		$loop = new WP_Query( $args);
		// query_posts($args);
		if($loop->have_posts()):
			while ($loop->have_posts()) : $loop->the_post();
			$last_date = strtotime(get_field('last_date'));
			$current_date = strtotime(date("d/m/y"));
	?>			
				<div class="container">
					<div class="row">
						<div class="col-md-12">	
							<h1 class="page-title text-center"><a href="<?php if($current_date <= $last_date){echo get_home_url();}?>"><?php echo get_the_title();?></a></h1>
						</div>
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
					</div>
				</div>		
	<?php 
			endwhile;
		endif;
		wp_reset_query();
	?>
</div>
<?php get_footer(); ?>