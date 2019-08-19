<?php
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		require_once '../../php/connection.php';
		$sql = "UPDATE students SET status='Đăng ký' WHERE id='$id'";
		$conn->query($sql);

		header("location: /views/manager/registrars.php");
	}
?>