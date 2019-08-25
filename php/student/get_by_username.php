<?php
	// SESSION ALREADY STARTED
	// LOAD check_role.php first
	if (isset($logged_user) && isset($logged_role)) {
		require_once '../../php/connection.php';
		$sql = "SELECT *, s.name as st_name, s.id as st_id, p.name as p_name 
			FROM students s JOIN programs p ON s.program_id = p.id 
			WHERE username='$logged_user'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();

		$_SESSION['student_is_paid'] = $row['is_paid'];
	}
	else {
		header('location: /');
	}
?>