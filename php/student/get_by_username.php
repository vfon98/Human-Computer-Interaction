<?php
	// SESSION ALREADY STARTED
	// LOAD check_role.php first
	if (isset($logged_user) && isset($logged_role)) {
		require_once '../../php/connection.php';
		$username = $_SESSION['logged_user'];
		// CHECK IF APPROVED ACCOUNT
		$sql = "SELECT COUNT(*) as count FROM students s JOIN program_student ps ON s.id = ps.student_id
				WHERE username='$username' AND status='Đăng ký'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		if ($row['count'] == 0) {
			session_unset();
			session_destroy();
			header('location: /views/error/unapproved.php');
			exit;
		}

		$sql = "SELECT s.id as st_id, s.name as st_name, DATE_FORMAT(birthday, '%d/%m/%Y') as birthday, email, address, 
					p.id as p_id, p.name as p_name, duration, tuition, s.created_at as created_at, is_paid
				FROM students s JOIN program_student ps JOIN programs p
				ON s.id = ps.student_id AND ps.program_id = p.id 
				WHERE username='$username' AND status='Đăng ký'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$p_id = $row['p_id'];

		$_SESSION['student_id'] = $row['st_id'];
		$_SESSION['student_is_paid'] = $row['is_paid'];
	}
	else {
		header('location: /views/error/unauthorized.php');
	}
?>