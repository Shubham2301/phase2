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
							$event_id = 245;
							$meta_key = "event_users";
							$event_users = get_post_meta( $event_id, $meta_key, true );
							foreach( $event_users as $user_id => $event_user ):
								?>
									<tr>
										<td><?php echo $user_id; ?></td>
										<td><?php echo $event_user['name']; ?></td>
										<td><?php echo $event_user['rsvp_date']; ?></td>
										<td><?php echo $event_user['status']; ?></td>
									</tr>
								<?php
							endforeach;
						?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</body>	
