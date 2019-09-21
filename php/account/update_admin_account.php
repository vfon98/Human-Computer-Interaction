<?php
	session_start();
	if (isset($_POST) && $_SESSION['logged_role'] == 'admin') {
		echo '<pre>'; print_r($_POST); echo '</pre>';
		require_once '../connection.php';
		$user_id = $_POST['user_id'];
		$new_pass = md5($_POST['new_pass']);
		$sql = "UPDATE accounts SET password='$new_pass' WHERE id='$user_id'";
		if ($conn->query($sql)) {
			header('location: /views/success/info_changed.php');
			exit;
		}
	}
	header('location: /views/error/unauthorized.php');
?>