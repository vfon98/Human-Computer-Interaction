<?php
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		require_once '../../php/connection.php';
		$sql = "DELETE FROM subjects WHERE id='$id'";
		echo $sql;
		$conn->query($sql);

		header('location: '.$_SERVER['HTTP_REFERER']);
	}
?>