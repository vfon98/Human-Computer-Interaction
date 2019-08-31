<div class="bg-dark border-right" id="sidebar-wrapper">
	<div class="sidebar-heading">QL Sinh Viên</div>
	<div class="list-group list-group-flush">
		<a href="/views/student" class="list-group-item list-group-item-action bg-dark active">
			Thông tin sinh viên
		</a>
		<a href="" class="list-group-item list-group-item-action bg-dark">Chương trình đào tạo</a>
		<a href="" class="list-group-item list-group-item-action bg-dark"></a>
		<?php 
			// SESSION INITIALIZED IN /php/student/get_by_username.php
			if ($_SESSION['student_is_paid'] == false) {
				echo 
				'<a class="list-group-item list-group-item-action bg-dark"
					data-toggle="modal" href="#modal-tuition"
				>Đóng học phí</a>';
			}
		?>
<!-- 				<a href="#" class="list-group-item list-group-item-action bg-dark">Events</a>
		<a href="#" class="list-group-item list-group-item-action bg-dark">Profile</a>
		<a href="#" class="list-group-item list-group-item-action bg-dark">Status</a> -->
	</div>
</div>