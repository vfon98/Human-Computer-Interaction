<?php
	session_start();
	if ($_SESSION['logged_role'] == 'student' && isset($_POST)) {
		require_once '../connection.php';
		print_r($_POST);
		$p_id = $_POST['p_id'];
		$st_id = $_POST['st_id'];
		// CHECK MAX AMOUNT OF PROGRAM REGISTED
		$sql = "SELECT * FROM program_student WHERE student_id='$st_id' and status='Có ý thích'";
		$result = $conn->query($sql);
		if ($result->num_rows >= 1) {
			header('location: ../../views/error/max_program.php');
			exit;
		}

		$sql = "INSERT INTO program_student (program_id, student_id, is_paid, is_extra)
				VALUES ('$p_id', '$st_id', 0, 1)";
		echo $sql;
		$conn->query($sql);
		header('location: '.$_SERVER['HTTP_REFERER']);
	}
	else {
		header('location: ../../views/error/unauthorized.php');
	}
?>