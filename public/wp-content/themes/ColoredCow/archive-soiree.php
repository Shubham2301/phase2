<?php get_header(); ?>
<div class="archieve-soiree-page">
	<?php
		if(have_posts()):
			while (have_posts()) : the_post();
			$last_date = strtotime(get_field('last_date'));
			$current_date = strtotime(date("Y-m-d"));
	?>			
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<?php 
								$soiree_link = '#';
								if($current_date <= $last_date){
									$soiree_link = get_the_permalink();
								}
							?>
							<h1 class="page-title text-center"><a href="<?php echo $soiree_link; ?>"><?php echo get_the_title();?></a></h1>
						</div>
						<div class="col-xs-12 content text text-center">
							<div><?php echo wpautop(get_the_content());?></div>
						</div>
						<div class="col-xs-12 col-lg-6 soiree_dates text text-center">
							<div >Soiree Date:</div>
							<div><?php echo date("d-m-Y",strtotime(get_field('event_date')));?></div>
						</div>
						<div class="col-xs-12 col-lg-6 text-center soiree_dates text">
							<div >Last Registration Date:</div>
							<div><?php echo date("d-m-Y",strtotime(get_field('last_date')));?></div>
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