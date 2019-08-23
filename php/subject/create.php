<?php
	if(isset($_POST['sub-id']) && isset($_POST['name']) && isset($_POST['teacher'])) {
		$sub_id = $_POST['sub-id'];
		$name = $_POST['name'];
		$teacher_id = $_POST['teacher'];
		require '../../php/connection.php';
		$sql = "INSERT INTO subjects (sub_id, name, teacher_id) 
			VALUES ('$sub_id', '$name', $teacher_id)";
		echo $sql;
		$conn->query(htmlspecialchars($sql));
		header('location: '.$_SERVER['HTTP_REFERER']);
	}
	else {
		echo "failed";
	}
?>