<?php
	// SESSION ALREADY STARTED
	// LOAD check_role.php first
	if (isset($logged_user) && isset($logged_role)) {
		require_once '../../php/connection.php';
		$sql = "SELECT *, s.name as st_name, p.name as p_name 
			FROM students s JOIN programs p ON s.program_id = p.id 
			WHERE username='$logged_user'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
	}
?>