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
					acf_form();
				?>

			<?php endwhile; ?>

		</div>
	</div>

<?php get_footer(); ?>