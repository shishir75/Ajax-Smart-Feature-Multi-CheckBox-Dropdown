<?php include 'includes/header.php'; ?>


<?php

	if (isset($_POST)) {
		$user_id = $_POST['user_id'];
		$username = $_POST['username'];
		$name = $_POST['name'];
		$status = $_POST['status'];

		$getFromU->update('users', $user_id, array('username' => $username, 'name' => $name, 'status' => $status));
	}
?>

<?php include 'includes/footer.php'; ?>