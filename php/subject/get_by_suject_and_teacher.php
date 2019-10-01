<?php
	session_start();
	if ($_POST['s_id']) {
		require_once '../connection.php';
		$t_id = $_SESSION['teacher_id'];
		$s_id = $_POST['s_id'];
		$sql = "SELECT st.id as st_id, st.name as st_name, st.email, ss.mark
			FROM subjects s JOIN program_subject ps ON s.id = ps.subject_id
			JOIN program_student pst ON pst.program_id = ps.program_id
			JOIN students st ON st.id = pst.student_id
			LEFT JOIN student_subject ss ON ss.student_id = st.id AND ss.subject_id = s.id
			WHERE pst.status='Đăng ký' AND s.id='$s_id'";
		$result = $conn->query($sql);
	}
?>
<form action="/php/student/grade_by_subject.php" method="POST" id="form-grading">
	<input type="hidden" name="s_id" value="<?php echo $s_id ?>">
	<table class="table table-inverse table-hover text-center table-striped mb-0">
		<thead>
			<th>STT</th>
			<th>Tên sinh viên</th>
			<th>Email</th>
			<th style="width: 180px">Điểm</th>
		</thead>
		<tbody>
			<?php
			$i = 1;
			if ($result->num_rows <= 0) {
				echo
				'<tr>
				<td colspan="4" class="text-center text-danger"><h5>Chưa có sinh viên đăng ký !</h5></td>
				</tr>';
				exit;
			}
			$has_mark = false;
			$is_all_unmarked = true;
			while ($row = $result->fetch_assoc()) {
				$has_mark = $row['mark'] !== NULL ? true : false;
				if ($has_mark) {
					$is_all_unmarked = false;
				}
				echo
				'<tr>
					<td>'.$i++.'</td>
					<td>'.$row['st_name'].'</td>
					<td>'.$row['email'].'</td>
					<td>'.
					'<input type="hidden" name="st_id[]" value="'.$row['st_id'].'">'.
					'<span class="js-mark-cell" style="font-weight: 550">'.($has_mark ? $row['mark'] : 'Chưa có').'</span>'
					.'</td>
				</tr>';
			}
			if ($is_all_unmarked) {
				echo
				'<tr class="bg-light">
					<td colspan="3"></td>
					<td colspan="1" class="text-center" id="js-btn-cell">
						<button type="button" class="btn btn-danger" id="btn-grading" onclick="enableGradingMode()">
							<i class="fa fa-lg fa-pencil-square-o"></i> Chấm điểm
						</button>
					</td>
				</tr>';
			}
			else {
				echo
				'<tr class="bg-light">
					<td colspan="3"></td>
					<td colspan="1" class="text-center" id="js-btn-cell">
						<button type="button" class="btn btn-dark" id="btn-grading" onclick="enableChangeMode()">
							<i class="fa fa-lg fa-wrench"></i> Sửa điểm
						</button>
					</td>
				</tr>';
			}
			?>
		</tbody>
	</table>
</form>
<script>
	var arr_mark = [];
	function enableGradingMode() {
		$('#form-grading').attr('action', '/php/student/grade_by_subject.php');
		console.log($('#form-grading').attr('action'));
		$('.js-mark-cell').html(
			`<input type="number" name="mark[]" class="inp-mark" style="width: 45px" 
				min="0" max="10" step=".1" value="5" required/>`
		);
		$('#js-btn-cell').html(
			`<button type="submit" class="btn btn-success mr-1"><i class="fa fa-check"></i> Lưu</button>
			<button type="button" onclick="cancelGradingMode()" class="btn btn-danger" id="btn-cancel"><i class="fa fa-times"></i> Hủy</button>`
		);
		$('.inp-mark').eq(0).focus().select();
	}
	function enableChangeMode() {
		$('#form-grading').attr('action', '/php/student/change_mark_by_subject.php');
		console.log($('#form-grading').attr('action'));
		// GET OLD MARKS
		arr_mark = [];
		$('.js-mark-cell').each(function(index, el) {
			let mark = parseFloat($(this).text());
			arr_mark.push(mark);
		});
		$('.js-mark-cell').html(
			`<input type="number" name="mark[]" class="inp-mark" style="width: 45px" 
				min="0" max="10" step=".1"/>`
		);
		// FILL INPUT WITH PREVIOUS VALUES
		$('.js-mark-cell input').each(function(index, el) {
			$(this).val(arr_mark[index]);
		});

		$('#js-btn-cell').html(
			`<button type="submit" class="btn btn-success mr-1"><i class="fa fa-check"></i> Lưu</button>
			<button type="button" onclick="cancelChangeMode()" class="btn btn-danger" id="btn-cancel"><i class="fa fa-times"></i> Hủy</button>`
		);
		$('.inp-mark').eq(0).focus().select();
	}
	function cancelGradingMode() {
		$('.js-mark-cell').html(
			'Chưa có'
		);
		$('#js-btn-cell').html(
			`<button type="button" class="btn btn-danger" id="btn-grading" onclick="enableGradingMode()">
				<i class="fa fa-lg fa-pencil-square-o"></i> Chấm điểm
			</button>`
		);
	}
	function cancelChangeMode() {
		$('.js-mark-cell').each(function(index, el) {
			if (!isNaN(arr_mark[index]))
				$(this).text(arr_mark[index]);
			else
				$(this).text('Chưa có');
		});
		$('#js-btn-cell').html(
			`<button type="button" class="btn btn-dark" id="btn-grading" onclick="enableChangeMode()">
				<i class="fa fa-lg fa-wrench"></i> Sửa điểm
			</button>`
		);
	}
</script>