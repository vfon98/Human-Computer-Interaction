<?php
	function getAccType($acc_type) {
		switch ($acc_type) {
			case 'manager':
				return 'Quản lý';
			case 'teacher':
				return 'Giáo viên';
			case 'student':
				return 'Sinh viên';
			default:
				return 'Lỗi';
		}
	}
	if (isset($_SESSION['logged_role']) && $_SESSION['logged_role'] == 'admin') {
		require_once '../../php/connection.php';
		$sql = "SELECT * FROM accounts WHERE role != 'admin' ORDER BY id DESC";
		$result = $conn->query($sql);
		$i = 1;
		while ($row = $result->fetch_assoc()) {
			echo
			'<tr>
				<td>'.$i++.'</td>
				<td>'.$row['username'].'</td>
				<td>'.getAccType($row['role']).'</td>
				<td class="p-2">
					<button data-toggle="modal" data-target="#modal-change-password"
						onclick="passIdToModal('.$row['id'].')" type="button" class="btn btn-danger"
					>
						<i class="fa fa-wrench" aria-hidden="true"></i> Đổi MK
					</button>
				</td>
			</tr>';
		}
	}
?>