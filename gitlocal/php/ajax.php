<?php
/*
	@! Perfect tables
	@@ Using jQuery
*/

include('functions.php');

	if(isset($_GET['r'])) {
		## Execute functions as per the request
		$r = clean_input($_GET['r']);
			## For deleting celeb information from the database
			if($r == 'delete_celeb') {
				if(isset($_GET['id'])) {
					$celeb_id = intval($_GET['id']);
						if(!empty($celeb_id)) {
							/*
								@@ Deleting the information
								Ideally, we should be deleting the entry from the database
							*/

							## Sending the response back to the page
							echo 'success,Information has been deleted.';
						} else {
							echo 'error,Empty values.';
						}
				} else {
					echo 'error,Invalid request made.';
				}
			}

			## For editing individual celeb information
			if($r == 'edit_celeb') {
				if(isset($_POST['value']) && isset($_POST['column']) && isset($_POST['row_id'])) {
					$new_value = clean_input($_POST['value']);
					$column = intval($_POST['column']);
					$c_id = intval($_POST['row_id']);
						if(!empty($column) && !empty($c_id)) {
							/*
								@@ Updating the information
								Ideally, we should be updating the entry in the database
							*/

							## Sending result back to the page
							echo 'success,'.$new_value;
						} else {
							echo 'error,Empty values.';
						}
				} else {
					echo 'error,Bad request.';
				}
			}
	} else {
		echo 'error,Invalid request made.';
	}