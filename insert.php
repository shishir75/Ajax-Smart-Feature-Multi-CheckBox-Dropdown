<?php include 'includes/header.php'; ?>


<?php

	if (!empty($_POST)) {
		$username = $getFromU->checkInput($_POST['username']);
		$name = $getFromU->checkInput($_POST['name']);
		$status = $getFromU->checkInput($_POST['status']);

		$add = $getFromU->create('users', array('username' => $username, 'name' => $name, 'status' => $status));

		if ($add) {
			echo '<p class="bg-success text-white text-center p-3 font-weight-bold mb-3 mt-2 rounded">Data Inserted Successfully</p>';
		?>

		<div id="employee_table">
			<table class="table table-striped table-bordered text-center">
				<thead>
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Username</th>
						<th scope="col">Name</th>
						<th scope="col">Status</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$users = $getFromU->viewUsers();
						foreach ($users as $user) {
							$user_id = $user->user_id;
							$username = $user->username;
							$name = $user->name;
							$status = $user->status;
					?>
					<tr>
						<td><?php echo $user_id; ?></td>
						<td><?php echo $username; ?></td>
						<td><?php echo $name; ?></td>
						<td><?php echo ucfirst($status); ?></td>
						<td>
							<button id="<?php echo $user_id; ?>" class="btn btn-warning edit_data">Edit</button>
							<input type="button" name="view" id="<?php echo $user_id; ?>" class="btn btn-primary view_data" value="View">
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>

		<?php
		}else {
			echo '<p class="bg-danger text-white text-center p-3 font-weight-bold mb-3 mt-2 rounded">Data Not Inserted!</p>';
		}
	}

?>



<?php include 'includes/footer.php'; ?>


<script>
	$(document).ready(function() {

		// Edit Data Starts
		$('.edit_data').on('click', function() {
			var user_id =	$(this).attr('id');

			$.ajax({
				url: 'fetch.php',
				method: 'POST',
				data: {user_id:user_id},
				success: function(data) {
					$('#update_details').html(data);
					$('#editEmpModal').modal('show');
				}
			}); // Ajax End
		}); // Edit Data Ends


		// Update Data Starts
		$('#update').on('click', function() {
			$.ajax({
				url: 'update_data.php',
				method: 'POST',
				data: $('#updateForm').serialize(),
				success: function(data) {
					alert('One Record Upadte Successfully');
					$('#editEmpModal').modal('hide');
					location.reload();
				}
			}); // Ajax End
		}); // Update Data Ends

		// Insert Data Starts
		$("#insert_form").on('submit', function(event) {
			event.preventDefault();
			if ($('#username').val() === '') {
				alert('Username is Required');
			}else if ($('#name').val() === '') {
				alert('Name is Required');
			}else if ($('#status').val() === '') {
				alert('Status is Required');
			}else{
				$.ajax({
					url: 'insert.php',
					method: 'POST',
					data: $('#insert_form').serialize(),
					success: function(data){
						//$('#insert_form')[0].reset();
						$('#add_data_modal').modal('hide');
						$('#employee_table').html(data);
					}
				});
			}

		}); // Insert Data End


		// View Data Starts
		$(".view_data").on('click', function() {
			var id =	$(this).attr('id');
		  $.ajax({
		  	url: 'view.php',
		    type: 'POST',
		    data: {id:id},
		    success: function(data){
		    	$('#employee_detail').html(data);
		    	$('#dataModal').modal('show');
		    }
     	}); // Ajax End
		}); // View Data End

	});



</script>