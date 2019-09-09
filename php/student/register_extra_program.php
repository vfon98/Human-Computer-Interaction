<?php
	session_start();
	if ($_SESSION['logged_role'] == 'student' && isset($_POST)) {
		require_once '../connection.php';
		print_r($_POST);
		$p_id = $_POST['p_id'];
		$st_id = $_POST['st_id'];
		$sql = "INSERT INTO program_student (program_id, student_id)
				VALUES ('$p_id', '$st_id')";
		echo $sql;
		$conn->query($sql);
		header('location: '.$_SERVER['HTTP_REFERER']);
	}
	else {
		header('location: ../../views/error/unauthorized.php');
	}
?>