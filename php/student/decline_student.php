<?php
	if (isset($_GET['id']) && $_SESSION['logged_role'] ==  'manager') {
		$id = $_GET['id'];
		require_once '../../php/connection.php';
		// GET USERNAME
		$sql = "SELECT username FROM students WHERE id='$id'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$username = $row['username'];
		// DELETE FROM students AND accounts
		$sql = "DELETE FROM students WHERE id='$id'";
		$conn->query($sql);

		$sql = "DELETE FROM accounts WHERE username='$username'";
		$conn-> query($sql);

		header("location: /views/manager/registrars.php");
	}
	else {
		header('location: ../views/error/unauthorized.php');
	}
?>