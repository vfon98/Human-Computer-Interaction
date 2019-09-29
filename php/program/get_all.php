<?php
	require_once '../php/connection.php';
	$sql = "SELECT *, DATE_FORMAT(begin_at, '%d/%m/%Y') as begin_at FROM programs";
	$result = $conn->query($sql);
?>