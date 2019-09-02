<?php
	// Derived views program_detail.php
	if (isset($_GET['id'])) {
		$p_id = $_GET['id'];
		require_once '../../php/connection.php';
		$sql = "SELECT id, sub_id, name FROM subjects
				WHERE id NOT IN (
				    SELECT subject_id FROM program_subject WHERE program_id='$p_id'
				);";
		$result = $conn->query($sql);
		while ($row = $result->fetch_assoc()) {
			echo
			'<option value="'.$row['id'].'">'.$row['sub_id'].' - '.$row['name'].'</option>';
		}
	}
	else {
		header("location: ../error/unauthorizied.php");
	}
?>