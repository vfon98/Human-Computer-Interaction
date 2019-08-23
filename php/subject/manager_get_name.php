<?php
	if (true) {
		require_once '../../php/connection.php';
		$sql = "SELECT id, sub_id, name FROM subjects";
		$result = $conn->query($sql);
		while ($row = $result->fetch_assoc()) {
			echo
			'<option value="'.$row['id'].'">'.$row['sub_id'].' - '.$row['name'].'</option>';
		}
	}
?>