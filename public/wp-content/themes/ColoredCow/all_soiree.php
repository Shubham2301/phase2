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
			$last_date_timestamp = strtotime(str_replace('/','-',get_field('last_date')));
			$event_date_timestamp = strtotime((str_replace('/','-',get_field('event_date'))));
			//$current_date_timestamp = strtotime(str_replace('/','-',date("d-m-Y")));
			$last_date = date("d-m-Y",$last_date_timestamp);
			$event_date = date("d-m-Y",$event_date_timestamp);
			$last_date = get_field('last_date');
			$current_date = date("Y-m-d");
			echo "<br>";
	?>			
				<div class="container">
					<div class="row">
						<div class="col-xs-12">	
							<h1 class="page-title text-center"><?php if($current_date <= $last_date):?><a href="<?php echo get_home_url();?>"
						<?php echo ">"; endif;?><?php echo get_the_title();?></a></h1>
						</div>
						<!-- <div class="row content text"> -->
							<div class="col-xs-12 content text text-center">
								<div><?php echo wpautop(get_the_content());?></div>
							</div>
						<!-- </div> -->
						<!-- <div class="row soiree_dates text"> -->
							<div class="col-xs-12 col-lg-6 soiree_dates text text-center">
								<div>Soiree Date:</div>
								<div><?php echo date("d-m-Y",strtotime(get_field('event_date')));?></div>
							</div>
							<div class="col-xs-12 col-lg-6 text-center soiree_dates text">
								<div>Last Registration Date:</div>
								<div><?php echo date("d-m-Y",strtotime(get_field('last_date')));?></div>
							</div>
						<!-- </div> -->
					</div>
				</div>
	<?php 
			endwhile;
		endif;
		wp_reset_query();
	?>
</div>

<?php get_footer(); ?>