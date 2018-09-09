<?php include 'includes/header.php'; ?>

<div class="container-fluid text-center mb-2">
    <div class="row">
        <div class="col-12">
            <h1>Sweet Alert Delete Confim</h1>
            <h4>Developed By: SHISHIR</h4>
            <h5>Using PHP, PDO, jQuery</h5>
        </div>
    </div>
</div>

<div class="container-fluid" style=" margin-top: 50px;">

	<div class="row">
		<div class="col-10 offset-1">
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
							<!-- <td><a rel="<?php //echo $user_id; ?>" href="javascript:void(0)" class="delete_link">Delete</a></td> -->
							<td><button id="<?php echo $user_id; ?>" class="btn btn-danger delete_link">Delete</button></td>

						</tr>
						<?php } ?>
					</tbody>
				</table>

		</div>
	</div>
</div>

<?php include 'includes/footer.php'; ?>

<script>
	$(document).ready(function() {

		$(".delete_link").on('click', function() {
			var th = $(this);
		  var id =	$(this).attr('id');

		  swal({
			  title: "Are you sure?",
			  text: "You will not be able to recover this imaginary file!",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonClass: "btn-danger",
			  confirmButtonText: "Yes, Delete",
			  cancelButtonClass: "btn-info",
			  cancelButtonText: "No, Back",
			  closeOnConfirm: false,
			  closeOnCancel: false
			},
			function(isConfirm) {
			  if (isConfirm) {
			  	$.ajax({
				    type: 'POST',
				    url: 'delete.php',
				    data: {ids:id},
				    success: function(data){
				    	th.parents('tr').hide();
				    }
		     	}); // Ajax End

			    swal("Deleted!", "Your imaginary file has been deleted.", "success");
			  } else {
			    swal("Cancelled", "Your imaginary file is safe :)", "error");
			  }
			}); // Swal End

	}); // Delete Link End

}); // Document Ready End

</script>