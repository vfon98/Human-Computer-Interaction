<?php
	session_start();
	if (isset($_SESSION['logged_user']) && $_SESSION['logged_role'] == 'admin') {
		$logged_user = $_SESSION['logged_user'];
		$logged_role = $_SESSION['logged_role'];
	}
	else {
		header('location: ../error/unauthorized.php');
		exit;
	}
?>