<?php
	if (true) {
		require_once '../../php/connection.php';
		$sql = "SELECT id, name FROM teachers";
		$result = $conn->query($sql);
		while ($row = $result->fetch_assoc()) {
			echo
			'<option value="'.$row['id'].'">'.$row['name'].'</option>';
		}
	}
?>