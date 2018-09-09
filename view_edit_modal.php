<?php include 'includes/header.php'; ?>

<div class="container-fluid text-center mb-2">
    <div class="row">
        <div class="col-12">
            <h1>Ajax - View & Edit with Bootstrap Modal</h1>
            <h4>Developed By: SHISHIR</h4>
            <h5>Using PHP, PDO, jQuery</h5>
        </div>
    </div>
</div>

<div class="container-fluid" style=" margin-top: 50px;">

	<div class="row">

		<div class="col-10 offset-1">
			<button class="btn btn-primary mb-3" name="add" id="add" data-toggle="modal" data-target="#add_data_modal">Add New</button>

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
									<input type="button" name="edit" id="<?php echo $user_id; ?>" class="btn btn-info edit_data" value="Edit">
									<input type="button" name="view" id="<?php echo $user_id; ?>" class="btn btn-primary view_data" value="View">
								</td>


							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>

		</div>
	</div>
</div>


<!-- View Modal -->
<div class="modal fade" id="dataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="employee_detail">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<!-- Add Data Modal -->
<div class="modal fade" id="add_data_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form method="post" id="insert_form">
				  <div class="form-group">
				    <label for="username">Username</label>
				    <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
				  </div>
				  <div class="form-group">
				    <label for="name">Name</label>
				    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
				  </div>
				  <div class="form-group">
				    <label for="status">Status</label>
				    <select name="status" class="form-control" id="status">
				    	<option value="">------ Select Option ------</option>
				    	<option value="published">Publish</option>
				    	<option value="draft">Draft</option>
				    </select>
				  </div>
				  <!-- <input type="hidden" name="user_id" id="user_id"> -->
				  <input type="submit" name="insert" id="insert" value="Add User" class="btn btn-primary form-control">
				</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <!-- <button type="button" class="btn btn-primary">Add User</button> -->
      </div>
    </div>
  </div>
</div>




<!-- Edit Data Modal -->
<div class="modal fade" id="editEmpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    	<form method="post" id="updateForm">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body" id="update_details">

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
	        <input type="submit" name="update" id="update" value="Update User" class="btn btn-primary">
	      </div>
      </form>
    </div>
  </div>
</div>

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
						$('#insert_form')[0].reset();
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



}); // Document Ready End

</script>