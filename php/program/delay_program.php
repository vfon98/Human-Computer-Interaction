<?php
	session_start();
	if ($_SESSION['logged_role'] == 'student' && isset($_GET['id'])) {
		require_once '../connection.php';
		$ps_id = $_GET['id'];
		$sql = "UPDATE program_student SET status='Tạm hoãn' WHERE id='$ps_id' AND status='Đăng ký'";
		$conn->query($sql);
		header('location: '.$_SERVER['HTTP_REFERER']);
	}
	else {
		header('location: ../../views/error/unauthorized.php');
	}
?>