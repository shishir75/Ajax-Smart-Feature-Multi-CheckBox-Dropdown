<?php include 'includes/header.php'; ?>


<?php

	if (isset($_POST['user_id'])) {
		$user_id = $_POST['user_id'];
		$row = $getFromU->viewUserByID($user_id);

		$username = $row->user_id;
		$username = $row->username;
		$name = $row->name;
		$status = $row->status;
?>

	<div class="form-group">
		<label for="username">Username</label>
		<input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" value="<?php echo $username; ?>">
	</div>
	<div class="form-group">
		<label for="name">Name</label>
		<input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="<?php echo $name; ?>">
	</div>
	<div class="form-group">
		<label for="status">Status</label>
		<select name="status" class="form-control" id="status" value="<?php echo $status; ?>">
			<option value="">------ Select Option ------</option>
			<option value="published">Publish</option>
			<option value="draft">Draft</option>
		</select>
	</div>
	<input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>">


<?php } ?>

<?php include 'includes/footer.php'; ?>