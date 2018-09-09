<?php include_once '../core/init.php'; ?>


<?php
	if (isset($_GET['delete'])) {
		$user_id = $_GET['delete'];
		$result = $getFromU->delete_user($user_id);
		header('Location: ../deleteConfirmModal.php');
	}

?>