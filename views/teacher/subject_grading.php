<?php require 'check_role.php'; ?>
<?php include '../template/header.php'; ?>

<div class="container-fluid pt-2">
	<div class="row">
		<div class="col">
			<div class="card shadow">
				<div class="card-header text-center pb-1 bg-info text-white">
					<h4>Chấm điểm môn học</h4>
				</div>
				<div class="card-body">
					<div class="form-group">
						<label for="js-sel-subject"><strong>Chọn môn học: </strong></label>
						<select class="custom-select col-md-5 ml-1" id="js-sel-subject" autofocus>
							<option selected disabled>-- Vui lòng chọn môn học --</option>
							<?php include '../../php/subject/get_options_by_teacher_id.php'; ?>
						</select>
					</div>
					<div id="ajax-content">
						<!-- AJAX LOADED HERE -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$('#js-sel-subject').change(function() {
			let s_id = $(this).val();
			ajaxGetStudentList(s_id);
		});
		<?php
		if (isset($_GET['s_id'])) {
			$s_id = $_GET['s_id'];
			echo "ajaxGetStudentList($s_id);";
		}
		?>
	});
	
	function ajaxGetStudentList(s_id) {
		$.post('../../php/subject/get_by_suject_and_teacher.php', {
			s_id: s_id
		}).then(res => {
			$('#ajax-content').html(res);
		});
	}
</script>

<?php include '../template/footer.php'; ?>