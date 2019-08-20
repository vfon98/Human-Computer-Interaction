<?php
	print_r($_POST);
	if (isset($_POST['name']) && isset($_POST['tuition'])) {
		$name = $_POST['name'];
		$tuition = $_POST['tuition'];
		require_once '../connection.php';
		$sql = "INSERT INTO programs (name, tuition) VALUES ('$name', '$tuition')";
		$conn->query(htmlspecialchars($sql));
		header("location: ".$_SERVER['HTTP_REFERER']);
	}
?>