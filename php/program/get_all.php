<?php
	require_once '../php/connection.php';
	$sql = 'SELECT * FROM programs';
	$result = $conn->query($sql);
?>