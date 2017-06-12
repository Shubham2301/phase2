<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<style type="text/css">
			.table_container{
				margin-top: 40px;
			}
		</style>
	</head>

	<body>
		
		<h1>Guest attendance for events</h1> 
		<div class="select-button">
			<?php
				$args = array('post_type' => 'soiree','posts_per_page' => 10);
				$loop = new WP_Query( $args);
				if($loop->have_posts()):
			?>
			<form id="event_form_data">
				<select name="event_id">
					<?php while ($loop->have_posts()) : $loop->the_post(); ?>
						<option value="<?php echo get_the_ID(); ?>"><?php echo get_the_title();?></option>
					<?php endwhile; ?>
				</select>
				<?php endif; ?>
				<input type="hidden" name="action" value="get_event_users">
				<button type="button" class="btn btn-primary btn-sm" id="soiree-form-submit">List Guests</button>
			</form>
		</div>
		<div class="container table_container">
			<div class="row">
				<div class="col-md-12">
					<table class="table table-striped table-bordered event_users_table" id="event_users_table">
						<thead>
							<tr>
								<th>#</th>
								<th>Guest Name</th>
								<th>RSVP Date</th>
								<th>status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
		</div>
	</body>	
