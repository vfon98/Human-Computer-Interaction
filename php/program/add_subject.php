<?php
	if (isset($_POST)) {
		$program_id = $_POST['program-id'];
		$subject_id = $_POST['subject-id'];

		require_once '../../php/connection.php';
		$sql = "INSERT INTO program_subject (program_id, subject_id) 
			VALUES ($program_id, $subject_id)";
		echo "$sql";
		$conn->query($sql);
	}
?>