<?php
	if ($_SESSION['student_is_paid'] == 1) {
		header('location: /views/student');
		exit;
	}
?>
<div class="modal fade" id="modal-tuition">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Vui lòng thanh toán học phí !</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
			</div>
			<div class="modal-body pb-0">
				<p><b>Tên chương trình: </b><?php echo $row['p_name']; ?></p>
				<p><b>Thời gian đào tạo: </b><?php echo $row['duration']; ?></p>
				<p><b>Ngày đăng ký: </b><?php echo $row['created_at']; ?></p>
				<p><b>Học phí: </b><?php echo number_format($row['tuition']); ?> VND</p>
			</div>
			<div class="modal-footer">
				<form action="/php/student/student_pay_tuition.php" method="POST" id="form-tuition">
					<input type="hidden" name="st_id" value="<?php echo $row['st_id'] ?>">
					<button type="submit" class="btn btn-success">
						Thanh toán <i class="fa fa-shopping-cart"></i>
					</button>
				</form>
				<button class="btn btn-danger" data-dismiss="modal">Trở về <i class="fa fa-reply"></i></button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
	$(document).ready(function() {
		$('#modal-tuition').modal('show');
		$('#form-tuition').submit(function(event) {
			if (!confirm("Xác nhận thanh toán")) {
				event.preventDefault();
			}
		});
	});
</script>