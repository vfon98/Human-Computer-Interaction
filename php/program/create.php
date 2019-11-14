<?php
	session_start();
	if (isset($_POST) && $_SESSION['logged_role'] == 'manager') {
		$manager_acc = $_POST['manager-acc'];
		$name = $_POST['name'];
		$duration = $_POST['duration']." năm";
		$begin_at = $_POST['begin-at'];
		$tuition = $_POST['tuition'];
		require_once '../connection.php';
		$sql = "INSERT INTO programs (name, duration, begin_at, tuition, manager_acc) 
			VALUES ('$name', '$duration', '$begin_at', '$tuition', '$manager_acc')";
		$conn->query(htmlspecialchars($sql));
		header('location: '.parse_url($_SERVER['HTTP_REFERER'])['path'].'?m=add');
	}
?>