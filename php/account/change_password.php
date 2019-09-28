<?php
	session_start();
	if (isset($_POST) && $_SESSION['logged_role'] == 'admin') {
		require_once '../connection.php';
		$acc_id = $_POST['acc-id'];
		$new_pass = md5($_POST['new-pass']);
		$sql = "UPDATE accounts SET password='$new_pass' WHERE id='$acc_id'";
		$conn->query($sql);
		header('location: '.parse_url($_SERVER['HTTP_REFERER'])['path'].'?m=changed');
	}
	else {
		header('location: ../../views/error/unauthorized.php');
	}
?>