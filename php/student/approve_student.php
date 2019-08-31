<?php
	if (isset($_GET['id']) && $_SESSION['logged_role'] == 'manager') {
		$id = $_GET['id'];
		require_once '../../php/connection.php';
		$sql = "UPDATE students SET status='Đăng ký' WHERE id='$id'";
		$conn->query($sql);

		header("location: /views/manager/registrars.php");
	}
	else {
		header('location: ../views/error/unauthorized.php');
	}
?>