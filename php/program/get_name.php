<?php
	require_once '../php/connection.php';
	$sql = "SELECT id, name FROM programs";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {
		echo
		'<option value="'.$row['id'].'">'.$row['name'].'</option>';
	}
?>