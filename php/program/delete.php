<?php
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		require_once '../connection.php';
		$sql = "DELETE FROM programs WHERE id='$id'";
		$conn->query($sql);
	}
	header('location: '.$_SERVER['HTTP_REFERER']);
?>