<?php
	session_start();
	if (isset($_POST) && $_SESSION['logged_role'] == 'student') {
		$avg_mark = $_POST['avg_mark'];
		$p_id = $_POST['p_id'];
		$st_id = $_POST['st_id'];
		require_once '../connection.php';
		$sql = "UPDATE program_student
				SET is_graduated=1, avg_mark='$avg_mark'
				WHERE program_id='$p_id' AND student_id='$st_id' AND status='Đăng ký'";
		$conn->query($sql);
	}
	else {
		header('location: /views/error/unauthorized.php');
	}
?>