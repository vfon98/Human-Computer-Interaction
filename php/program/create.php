<?php
	if (isset($_POST['name']) && isset($_POST['tuition'])) {
		$name = $_POST['name'];
		$duration = $_POST['duration']." năm";
		$begin_at = $_POST['begin-at'];
		$tuition = $_POST['tuition'];
		require_once '../connection.php';
		$sql = "INSERT INTO programs (name, duration, begin_at, tuition) 
			VALUES ('$name', '$duration', '$begin_at', '$tuition')";
		$conn->query(htmlspecialchars($sql));
		header("location: ".$_SERVER['HTTP_REFERER']);
	}
?>