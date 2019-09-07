<?php
	session_start();
	if (isset($_POST) && $_SESSION['logged_role'] == 'manager') {
		print_r($_POST);
		$arr_id = $_POST['selected-id'];
		foreach ($arr_id as $id) {
			echo $id . "  ";
		}
		die();
		$st_id = $_GET['id'];
		require_once '../../php/connection.php';
		$sql = "UPDATE students SET status='Đăng ký' WHERE id='$st_id'";
		$conn->query($sql);
		// UPDATE RELATIONSHIP
		$sql = "UPDATE program_student SET status='Đăng ký' WHERE student_id='$st_id'";
		$conn->query($sql);

		header("location: /views/manager/registrars.php");
	}
	else {
		header('location: /views/error/unauthorized.php');
	}
?>