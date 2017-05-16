<?php

/**
 * Template Name: Landing
 */

acf_form_head(); ?>
<?php get_header(); ?>	

	<div id="primary">
		<div id="content" role="main">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				
				<h1><?php  the_title(); ?></h1>
				
				<?php //the_content(); ?>
				
				<?php  
					acf_form(array(
						'post_id' 	      => 'new_post',
						'post_title'      => true,
						'post_content'    => true,
						'form'			  => true,
						'new_post' 	      => array(
								'post_type'   => 'guest',
								'post_status' => 'publish'
						),
						'submit_value'	  => 'Create a new guest'	
					));	
					//acf_form();
				?>

			<?php endwhile; ?>

		</div>
	</div>

<?php get_footer(); ?>