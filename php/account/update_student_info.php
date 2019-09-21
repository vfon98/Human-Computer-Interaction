<?php
	session_start();
	if (isset($_POST) && $_SESSION['logged_role'] == 'student') {
		echo '<pre>'; print_r($_POST); echo '</pre>';
		require_once '../connection.php';
		$st_name = $_POST['st_name'];
		$st_birthday = $_POST['st_birthday'];
		$st_email = $_POST['st_email'];
		$st_address = $_POST['st_address'];
		$st_username = $_POST['st_username'];

		$user_id = $_POST['user_id'];
		$new_pass = md5($_POST['new_pass']);
		$sql = "UPDATE students 
				SET name='$st_name', birthday='$st_birthday', email='$st_email', address='$st_address'
				WHERE username='$st_username'";
		$conn->query($sql);

		$sql = "UPDATE accounts SET password='$new_pass' WHERE id='$user_id'";
		if ($conn->query($sql)) {
			header('location: /views/success/info_changed.php');
			exit;
		}
	}
	header('location: /views/error/unauthorized.php');
?>