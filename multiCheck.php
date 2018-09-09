<?php include 'includes/header.php'; ?>

<?php

	if (isset($_POST['checkBoxArray'])) {
		$checkbox_user_ids = $_POST['checkBoxArray'];

		foreach ($checkbox_user_ids as $checkbox_user_id) {

			$bulk_options = $_POST['bulk_options'];

			if (isset($bulk_options)) {
				switch ($bulk_options) {
					case 'published':
						$getFromU->update_status($bulk_options, $checkbox_user_id);
						break;

					case 'draft':
						$getFromU->update_status($bulk_options, $checkbox_user_id);
						break;

					case 'delete':
						$getFromU->delete_user($checkbox_user_id);
						break;

					case 'clone':
						$user = $getFromU->viewUserByID($checkbox_user_id);
						$username = $user->username;
						$name = $user->name;
						$status = $user->status;
						$getFromU->create("users", array("username" => $username, "name" => $name, "status" => $status));
						break;
				}
			}
		}
	}
?>

<div class="container-fluid text-center mb-2">
    <div class="row">
        <div class="col-12">
            <h1>Working with CheckBox</h1>
            <h4>Developed By: SHISHIR</h4>
            <h5>Using PHP, PDO, jQuery</h5>
        </div>
    </div>
</div>



<form method="post">
	<div class="container-fluid" style=" margin-top: 50px;">
		<div class="row">
			<div class="col-4 offset-1 mb-3">
				<select name="bulk_options" class="form-control">
					<option value="">--------- Select One ---------</option>
					<option value="published">Publish</option>
					<option value="draft">Draft</option>
					<option value="delete">Delete</option>
					<option value="clone">Clone</option>
				</select>
			</div>
			<div class="col-1">
				<input type="submit" name="submit" class="btn btn-success form-control" value="Apply"/>
			</div>
		</div>
		<div class="row">
			<div class="col-10 offset-1">
				<form method="POST">
					<table class="table table-striped table-bordered text-center">
						<thead>
							<tr>
								<th scope="col"><input type="checkbox"  id="selectAllBoxes"></th>
								<th scope="col">ID</th>
								<th scope="col">Username</th>
								<th scope="col">Name</th>
								<th scope="col">Status</th>
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
								<th scope="row">
									<input type="checkbox" class="checkBoxes" name="checkBoxArray[]" value="<?php echo $user_id; ?>">
								</th>
								<td><?php echo $user_id; ?></td>
								<td><?php echo $username; ?></td>
								<td><?php echo $name; ?></td>
								<td><?php echo ucfirst($status); ?></td>
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