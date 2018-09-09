<?php include 'includes/header.php'; ?>

<div class="container-fluid text-center mb-2">
    <div class="row">
        <div class="col-12">
            <h1>Ajax - Add Field</h1>
            <h4>Developed By: SHISHIR</h4>
            <h5>Using PHP, PDO, jQuery</h5>
        </div>
    </div>
</div>

<div id="show-response" class="col-6 offset-3 text-center"></div>

<div class="container-fluid" style=" margin-top: 50px;">

	<div class="row">

		<div class="col-6 offset-3">
				<form name="add_name" id="add_name">
					<table class="table table-bordered" id="dynamic_field">
						<tr>
							<td><input type="text" name="name[]" id="name" class="form-control name_list" placeholder="Enter Your Skill" ></td>
							<td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
						</tr>
					</table>
					<input type="submit" name="submit" id="submit" value="Submit" class="btn btn-primary">
				</form>
		</div>
	</div>
</div>

<?php include 'includes/footer.php'; ?>

<script>
	$(document).ready(function() {

		var i = 1;
		$("#add").click(function() {
			i++;
			$("#dynamic_field").append('<tr id="row'+i+'"><td><input type="text" name="name[]" id="name" class="form-control name_list" placeholder="Enter Your Name"></td><td><button name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>')
		}); // Add End

		$(document).on('click', '.btn_remove', function() {

			var button_id = $(this).attr('id');
			$('#row'+button_id+'').remove();

		}); // btn_remove End

		$("#submit").click(function() {
			$.ajax({
				url: 'add.php',
				method: 'POST',
				data: $('#add_name').serialize(),
				success: function(data) {
					if (!data.error) {
						$('#add_name')[0].reset();
						$("#show-response").html(data);
					}
				}
			}); // Ajax End
			return false;

		}); // Submit End

}); // Document Ready End

</script>