<?php include 'includes/header.php'; ?>


<?php

		$name = $_POST['name'];
		$number = count($name);

		if ($number > 0 && !empty($name[0]) ) {

			for ($i = 0; $i <$number ; $i++) {
				if (trim($name[$i]) != '' ) {
					$getFromU->create('skills', array('name' => $name[$i]));
				}
			}
			echo '<p class="bg-success text-white p-3 font-weight-bold rounded">Data Inserted Successfully</p>';

		}else {
			echo '<p class="bg-danger text-white p-3 font-weight-bold rounded">Enter Your Skills</p>';
		}
?>



<?php include 'includes/footer.php'; ?>