<?php
	session_start();
	if ($_SESSION['logged_role'] == 'student' && isset($_GET['id'])) {
		require_once '../connection.php';
		$ps_id = $_GET['id'];
		$sql = "UPDATE program_student SET status='Tạm hoãn' WHERE status='Đăng ký'";
		$conn->query($sql);

		$sql = "UPDATE program_student SET status='Đăng ký' WHERE id='$ps_id' AND status='Tạm hoãn'";
		$conn->query($sql);
		header('location: ../../views/success/program_activated.php');
	}
	else {
		header('location: ../../views/error/unauthorized.php');
	}
?>