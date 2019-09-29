<?php
	session_start();
	if (isset($_GET['id']) && $_SESSION['logged_role'] == 'manager') {
		$id = $_GET['id'];
		require_once '../../php/connection.php';
		$sql = "DELETE FROM subjects WHERE id='$id'";
		echo $sql;
		$conn->query($sql);

		$sql = "DELETE FROM program_subject WHERE subject_id='$id'";
		$conn->query($sql);

		header('location: '.parse_url($_SERVER['HTTP_REFERER'])['path'].'?m=del');
	}
	else {
		header('location: ../../views/error/unauthorized.php');
	}
?>