<?php
	require '../../php/connection.php';
	$sql = "SELECT MAX(id) as max_id FROM subjects";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$next_id = sprintf("CT%'03d", $row['max_id'] + 1);
?>