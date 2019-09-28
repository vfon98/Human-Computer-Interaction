		</div>
		<!-- /#page-content-wrapper -->

	</div>

	<script>
		$(document).ready(function() {
			if (performance && performance.navigation.type === 0) {
			<?php
				if (isset($_GET['m'])) {
					$method = $_GET['m'];
					if ($method == 'add') {
						echo 'toastr.success("Thêm thành công !", "Thông báo");';
					}
					elseif ($method == 'del') {
						echo 'toastr.error("Xóa thành công !", "Thông báo");';
					}
					elseif ($method == 'delay') {
						echo 'toastr.info("Tạm hoãn thành công !", "Thông báo");';
					}
					elseif ($method == 'new') {
						echo 'toastr.success("Đăng ký thêm CTDT thành công !", "Thông báo");';
					}
					elseif ($method == 'delay_failed') {
						echo 'toastr.error("Không thể tạm hoãn tất cả CTDT !", "Thông báo");';
					}
					elseif ($method == 'created') {
						echo 'toastr.success("Tạo mới thành công !", "Thông báo");';
					}
					elseif ($method == 'changed') {
						echo 'toastr.info("Thay đổi thành công !", "Thông báo");';
					}
					elseif ($method == 'paid') {
						echo 'toastr.success("Thanh toán học phí thành công !", "Thông báo");';
					}
					elseif ($method == 'graded') {
						echo 'toastr.success("Đã lưu điểm sinh viên !", "Thông báo");';
					}
				}
			?>
			}
		});
		// HANDLE TOGGLE MENU BUTTOn
		$("#menu-toggle").click(function(e) {
			e.preventDefault();
			$("#wrapper").toggleClass("toggled");
		});
	</script>
</body>
</html>