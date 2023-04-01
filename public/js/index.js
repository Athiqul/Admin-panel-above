
		function confirmSubmit() {
			var confirmMsg = confirm("Are you sure you want to submit this form?");
			if (confirmMsg == true) {
				document.getElementById("myForm").submit();
			} else {
				return false;
			}
		}
