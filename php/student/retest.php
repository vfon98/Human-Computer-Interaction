<?php
	session_start();
	if (isset($_GET['ss_id']) && $_SESSION['logged_role'] == 'student') {
		$ss_id = $_GET['ss_id'];
		require_once '../connection.php';
		$sql = "SELECT count FROM student_subject WHERE id='$ss_id'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		// CHECK IF MAX OF ATTEMPT
		if ($row['count'] > 2) {
			header('location: '.$_SERVER['HTTP_REFERER']);
			exit;
		}
		$sql = "UPDATE student_subject 
				SET mark=NULL, count=count+1
				WHERE id='$ss_id'";
		$conn->query($sql);
		header('location: '.$_SERVER['HTTP_REFERER']);
	}
?>