<?php
	if (isset($_POST['btn-submit'])) {
		require_once '../connection.php';
		print_r($_POST);
		$name = $_POST['c-name'];
		$begin_at = $_POST['c-begin'];
		$end_at = $_POST['c-end'];
		$st_id = $_POST['st_id'];

		$sql = "INSERT INTO courses (name, begin_at, end_at, student_id) 
				VALUES ('$name', '$begin_at', '$end_at', '$st_id')";
		$conn->query($sql);
		header('location: '.$_SERVER['HTTP_REFERER']);
	}
?>