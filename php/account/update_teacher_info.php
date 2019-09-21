<?php
	session_start();
	if (isset($_POST) && $_SESSION['logged_role'] == 'teacher') {
		echo '<pre>'; print_r($_POST); echo '</pre>';
		require_once '../connection.php';
		$t_name = $_POST['t_name'];
		$t_email = $_POST['t_email'];
		$t_username = $_POST['t_username'];

		$user_id = $_POST['user_id'];
		$new_pass = md5($_POST['new_pass']);
		$sql = "UPDATE teachers SET name='$t_name', email='$t_email'
				WHERE username='$t_username'";
		$conn->query($sql);

		$sql = "UPDATE accounts SET password='$new_pass' WHERE id='$user_id'";
		if ($conn->query($sql)) {
			header('location: /views/success/info_changed.php');
			exit;
		}
	}
	header('location: /views/error/unauthorized.php');
?>