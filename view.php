<?php include 'includes/header.php'; ?>
<?php
	if (isset($_POST['id'])) {
		$user_id = $_POST['id'];
		$result = $getFromU->viewUserByID($user_id);

		$user_id = $result->user_id;
		$username = $result->username;
		$name = $result->name;
		$status = $result->status;
	?>
		<table class="table table-bordered">
			<tr>
				<td width="30%">User ID : </td>
				<td width="70%"><?php echo $user_id; ?></td>
			</tr>
			<tr>
				<td width="30%">Username : </td>
				<td width="70%"><?php echo $username; ?></td>
			</tr>

			<tr>
				<td width="30%">Name : </td>
				<td width="70%"><?php echo $name; ?></td>
			</tr>

			<tr>
				<td width="30%">Status : </td>
				<td width="70%"><?php echo $status; ?></td>
			</tr>
		</table>
	<?php } ?>

<?php include 'includes/footer.php'; ?>