<?php
	session_start();
	if($_SESSION['logged_role'] == 'manager' 
		&& isset($_POST['sub-id']) && isset($_POST['name']) && isset($_POST['teacher'])) {
		$sub_id = $_POST['sub-id'];
		$name = $_POST['name'];
		$teacher_id = $_POST['teacher'];
		require '../../php/connection.php';
		$sql = "INSERT INTO subjects (sub_id, name, teacher_id) 
			VALUES ('$sub_id', '$name', $teacher_id)";
		echo $sql;
		$conn->query(htmlspecialchars($sql));
		header('location: '.parse_url($_SERVER['HTTP_REFERER'])['path'].'?m=created');
	}
	else {
		header('location: ../../views/error/unauthorized.php');
	}
?>