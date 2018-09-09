<?php include 'includes/header.php'; ?>



<div class="container-fluid text-center mb-2">
    <div class="row">
        <div class="col-12">
            <h1>Delete Confim with Bootstrap Modal</h1>
            <h4>Developed By: SHISHIR</h4>
            <h5>Using PHP, PDO, jQuery</h5>
        </div>
    </div>
</div>

<?php include_once 'delete_modal.php'; ?>

<form method="post">
	<div class="container-fluid" style=" margin-top: 50px;">

		<div class="row">
			<div class="col-10 offset-1">
				<form method="POST">
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
								<td><a rel="<?php echo $user_id; ?>" href="javascript:void(0)" class="delete_link">Delete</a></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</form>
			</div>
		</div>
	</div>
</form>


<?php include 'includes/footer.php'; ?>


<script>
	$(document).ready(function() {

		$(".delete_link").on('click', function() {

		 var id =	$(this).attr('rel');

		 var delete_url = "includes/deleteConfirm.php?delete=" + id + "";

		 $(".modal_delete_link").attr('href', delete_url);

		 $('#exampleModal').modal('show');

		});

	});
</script>