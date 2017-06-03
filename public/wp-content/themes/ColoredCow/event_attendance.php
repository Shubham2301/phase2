<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<h1>Guest attendance for events</h1> 
	</head>

	<body>
		<div class "select-button">
			<select>
			  <option>soiree1</option>
			  <option>soiree2</option>
			  <option>soiree3</option>
			  <option>soiree4</option>
			</select>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<table class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>Guest Name</th>
								<th>RSVP Date</th>
								<th>status</th>
							</tr>	
						</thead>
						<tbody>
							<?php 
									$args = array(
										'post_type'	   => 'guest',
										'meta_key'     => 'status',
										'meta_value'   => 'pending'
									);
								$query = new WP_Query( $args );
								if($query->have_posts()):
									while ($query->have_posts()) : $query->the_post();
										$post_id = get_the_ID();
							?>
										<tr>
											<td>1</td>
											<td><?php echo get_the_title($post_id);?></td>
											<td>test-1 date</td>
											<td><?php echo get_post_meta($post_id,'status',true); ?></td>
										</tr>
							<?php 
									endwhile; 
								endif;
							?>
							<!-- <tr>
								<td>2</td>
								<td>test-2 name</td>
								<td>test-2 date</td>
								<td>test-2 status</td>
							</tr> -->
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</body>	
