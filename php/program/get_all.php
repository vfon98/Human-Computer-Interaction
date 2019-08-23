<?php
	require_once '../php/connection.php';
	$sql = 'SELECT * FROM programs';
	$result = $conn->query($sql);
	$i = 1;
	while($row = $result->fetch_assoc()) {
		echo 
		'<tr>
			<td>'.$i++.'</td>
			<td>'.$row['name'].'</td>
			<td>'.$row['tuition'].' VND</td>
		</tr>';
	}
?>