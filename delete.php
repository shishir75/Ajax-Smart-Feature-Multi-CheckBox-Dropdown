<?php include 'includes/header.php'; ?>


<?php
		if (isset($_POST['ids'])) {
			$user_id = $_POST['ids'];
			$result = $getFromU->delete_user($user_id);
		}
?>



<?php include 'includes/footer.php'; ?>