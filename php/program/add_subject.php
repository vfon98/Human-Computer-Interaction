<?php
	// POST from view program_detail.php
	session_start();
	if (isset($_POST) && $_SESSION['logged_role'] == 'manager') {
		require_once '../../php/connection.php';
		$p_id = $_POST['program-id'];


		foreach ($_POST['subject-id'] as $s_id) {
			$sql = "INSERT INTO program_subject (program_id, subject_id) 
				VALUES ($p_id, $s_id)";
			$conn->query($sql);
		}

		header('location: '.$_SERVER['HTTP_REFERER']);
	}
	else {
		header('location: ../views/error/unauthorized.php');
	}
?>