<?php
	session_start();
	if ($_SESSION['logged_role'] == 'student' && isset($_GET['id'])) {
		require_once '../connection.php';
		$st_id = $_SESSION['student_id'];
		$sql = "SELECT COUNT(*) as count FROM program_student WHERE status='Đăng ký' AND student_id='$st_id'";
		$result= $conn->query($sql);
		$row = $result->fetch_assoc();
		if ($row['count'] > 1) {
			$ps_id = $_GET['id'];
			$sql = "UPDATE program_student SET status='Tạm hoãn' WHERE id='$ps_id' AND status='Đăng ký'";
			// die($sql);
			$conn->query($sql);
			header('location: '.parse_url($_SERVER['HTTP_REFERER'])['path'].'?m=delay');
		}
		else {
			header('location: '.parse_url($_SERVER['HTTP_REFERER'])['path'].'?m=delay_failed');
		}
	}
	else {
		header('location: ../../views/error/unauthorized.php');
	}
?>