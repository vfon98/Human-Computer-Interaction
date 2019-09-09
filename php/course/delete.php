<?php
	session_start();
	if (isset($_GET['id']) && $_SESSION['logged_role'] == 'student') {
		require_once '../connection.php';
		$c_id = $_GET['id'];
		$sql = "DELETE FROM courses WHERE id='$c_id'";
		$conn->query($sql);
		header('location: '.$_SERVER['HTTP_REFERER']);
	}
	else {
		header('location: ../../views/unauthorized.php');
	}
?>