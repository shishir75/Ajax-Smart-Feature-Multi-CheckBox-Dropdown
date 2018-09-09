$(document).ready(function() {

	// Check All Boxes Code Starts
	$("#selectAllBoxes").click(function(event) {
		if (this.checked) {
			$(".checkBoxes").each(function() {
				this.checked = true;
			});
		}else{
			$(".checkBoxes").each(function() {
				this.checked = false;
			});
		}
	});
	// Check All Boxes Code Ends










}); // Document Ready Function Ends
