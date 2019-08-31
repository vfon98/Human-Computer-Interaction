<?php
	if (isset($_POST) && $_SESSION['logged_role'] == 'manager') {
		$program_id = $_POST['program-id'];
		$subject_id = $_POST['subject-id'];

		require_once '../../php/connection.php';
		$sql = "INSERT INTO program_subject (program_id, subject_id) 
			VALUES ($program_id, $subject_id)";
		echo "$sql";
		$conn->query($sql);
		header('location: '.$_SERVER['HTTP_REFERER']);
	}
	else {
		header('location: ../views/error/unauthorized.php');
	}
?>