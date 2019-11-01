<?php
	if ($_SESSION['logged_role'] == 'student') {
		require_once '../../php/connection.php';
		$st_id = $_SESSION['student_id'];
		$sql = "SELECT sub_id, s.name as s_name, t.name as t_name, mark, count, ss.id as ss_id, pst.program_id as p_id, pst.is_graduated
			FROM students st JOIN program_student pst ON st.id=pst.student_id
			JOIN program_subject ps ON ps.program_id=pst.program_id
			JOIN subjects s ON s.id=ps.subject_id
			JOIN teachers t ON t.id=s.teacher_id
			LEFT JOIN student_subject ss ON ss.subject_id=s.id AND ss.student_id=st.id
			WHERE st.id='$st_id' AND pst.status='Đăng ký'";
		$result = $conn->query($sql);
		if ($result->num_rows <= 0) {
			echo 
			'<tr>
				<td colspan="7" class="text-center text-danger"><h5 i18n lang-key="noSub">Chưa có môn nào trong CTDT</h5></td>
			</tr>';
			exit;
		}
		// =======================
		$i = 1;
		// NUMBER OF PASSED SUBJECTS AND TOTAL SUBJECTS
		$passed_nums = 0;
		$subjects_nums = $result->num_rows;
		//
		$total_mark = 0;
		$avg_mark = 0;
		$mark_rows = 0;
		$check_icon = '<span class="font-weight-bold text-success">&#x2713;</span>';
		// $check_icon = '<i class="fa fa-check text-success"></i>';
		while ($row = $result->fetch_assoc()) {
			$has_mark = $row['mark'] === NULL ? false : true;
			$is_graduated = $row['is_graduated'];
			$p_id = $row['p_id'];
			echo
			'<tr>
				<td>'.$i++.'</td>
				<td>'.$row['sub_id'].'</td>
				<td>'.$row['s_name'].'</td>
				<td>'.$row['t_name'].'</td>
				<td>'.$row['count'].'</td>
				<td style="font-weight: 550">'.($has_mark ? $row['mark'] : '<span>Chưa có</span>').'</td>
				<td>
					'.($row['mark'] >= 5.5 ? $check_icon : 
						($has_mark && $row['count'] != 2 ? 
							'<a href="/php/student/retest.php?ss_id='.$row['ss_id'].'" class="btn btn-link text-danger p-0">Thi lại <i class="fa fa-undo"></i></a>' : 
							'<i class="fa fa-times text-danger"></i>')).'
				</td>
			</tr>';
			if ($has_mark) {
				$total_mark += $row['mark'];
				$mark_rows++;
			}
			if ($row['mark'] >= 5.5) {
				$passed_nums++;
			}
		}
		$mark_rows != 0 && $avg_mark = round($total_mark / $mark_rows, 2);
	}
?>
<tr class="bg-light">
	<form action="/php/student/export_mark_excel.php" method="POST">
		<input type="hidden" name="avg_mark" value="<?php echo $avg_mark ?>">
		<td colspan="3" class="font-italic text-secondary text-left">* Điểm tối đa của lần thi lại là 5.5</td>
		<td colspan="4" class="text-right">
				<strong>Điểm trung bình: <?php echo $avg_mark ?></strong>
				<button type="submit" class="btn btn-success ml-3"><i class="fa fa-cloud-download"></i> Xuất file Excel</button>
				<?php
				if ($passed_nums === $subjects_nums) {
					if (!$is_graduated) {
						echo '<button id="btn-graduation" type="button" class="btn btn-info"><i class="fa fa-paper-plane"></i> <span i18n lang-key="requestGraduation">Xét tốt nghiệp</span></button>';
					}
					else {
						echo '<button class="btn btn-danger" disabled><i class="fa fa-check-circle"></i> Đã xét tốt nghiệp</button>';
					}
				}
				?>
			</form>
		</td>
	</form>
</tr>

<script>
	$(document).ready(function() {
		$('#btn-graduation').click(function(event) {
			$.post('/php/student/register_for_graduation.php', {
				st_id: <?php echo $_SESSION['student_id'] ?>,
				p_id: <?php echo $p_id ?>,
				avg_mark: <?php echo $avg_mark ?>
			}).then(res => {
				console.log(res);
				location.reload();
			});
		});
	});
</script>