<?php
	session_start();
	if (isset($_POST) && $_SESSION['logged_role'] == 'admin') {
		require '../../php/connection.php';
		$acc_role = $_POST['acc-role'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$username = $_POST['username'];
		$pass = md5($_POST['pass']);

		if ($acc_role == 'teacher') {
			$sql = "INSERT INTO accounts (username, password, role) 
				VALUES ('$username', '$pass', 'teacher')";
			$conn->query($sql);

			$sql = "INSERT INTO teachers (name, email, username)
				VALUES ('$name', '$email', '$username')";
			$conn->query($sql);
		}
		else if ($acc_role == 'manager') {
			$sql = "INSERT INTO accounts (username, password, role) 
				VALUES ('$username', '$pass', 'manager')";
			$conn->query($sql);
		}
		header('location: '.$_SERVER['HTTP_REFERER']);
	}
	else {
		header('location: ../error/unauthorized.php');
	}
?>