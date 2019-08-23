<?php
	require_once '../../php/connection.php';
	$sql = 'SELECT * FROM programs';
	$result = $conn->query($sql);
	$i = 1;
	while($row = $result->fetch_assoc()) {
		echo 
		'<tr>
			<td>'.$i++.'</td>
			<td class="text-left">'.$row['name'].'</td>
			<td>'.$row['duration'].'</td>
			<td>'.$row['begin_at'].'</td>
			<td>'.$row['tuition'].' &#8363;</td>
			<td>
				<a href="/views/manager/program_detail.php?id='.$row['id'].'" class="btn btn-warning"><i class="fa fa-cog"></i> Quản lý
				</a>
			</td>
			<td>
				<a href="/php/program/update.php?id='.$row['id'].'" class="btn btn-secondary js-btn-update"><i class="fa fa-wrench"></i> Sửa</a>

				<a href="/php/program/delete.php?id='.$row['id'].'" class="btn btn-danger js-btn-del"><i class="fa fa-trash-o"></i> Xóa</a>
			</td>
		</tr>';
	}
?>