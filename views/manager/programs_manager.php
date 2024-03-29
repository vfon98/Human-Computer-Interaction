<?php require 'check_role.php'; ?>
<?php include '../template/header.php'; ?>

<div class="container-fluid p-3" id="root">
    <div class="row">
        <!-- ADD NEW PROGRAM MODEL -->
        <div class="col-md-12">
            <button class="btn btn-success mb-2" data-toggle="modal" data-target="#modalAdd">
                <i class="fa fa-plus"></i> <span i18n lang-key="addPro">Thêm mới CTDT</span>
            </button>
        </div>

        <div class="modal fade" id="modalAdd" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title" i18n lang-key="addPro">Thêm mới CTDT</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="/php/program/create.php" method="POST">
                        <input type="hidden" name="manager-acc" value="<?php echo $_SESSION['logged_user'] ?>">
                        <fieldset class="form-group">
                            <label i18n lang-key="proName">Tên chương trình</label>
                            <input name="name" type="text" class="form-control" placeholder="Nhập tên chương trình" i18n-place="Enter program's name" maxlength="50" autofocus required>
                        </fieldset>
                        <fieldset class="form-group row col-4">
                            <label i18n lang-key="duration">Thời gian đào tạo</label>
                            <div class="input-group">
                                <input name="duration" type="number" class="form-control" min="1" max="10" step="0.5" value="4">
                                <div class="input-group-append">
                                    <span class="input-group-text" i18n lang-key="years">Năm</span>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <label i18n lang-key="beginDate">Ngày bắt đầu</label>
                            <input name="begin-at" type="date" class="form-control" required>
                        </fieldset>
                        <fieldset class="form-group">
                            <label i18n lang-key="tuition">Học phí</label>
                            <div class="input-group">
                                <input name="tuition" type="number" class="form-control" placeholder="Đơn vị: VND" i18n-place="Unit: VND" min="0" max="1000000000" step="1000" value="1000000">
                                <div class="input-group-append">
                                    <span class="input-group-text">VND</span>
                                </div>
                            </div>
                        </fieldset>
                    <button class="btn btn-success"><span i18n lang-key="addPro">Thêm chương trình</span> <i class="fa fa-angle-double-right"></i></button>
                    </form>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> <span i18n lang-key="close">Đóng</span></button>
                </div>
              </div>
            </div>
          </div>
        <!-- TABLE OF PROGRAMS -->
        <div class="col-12">
            <div class="card shadow p-0 mb-4">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0 text-center" i18n lang-key="proControl">Danh sách CTDT đang quản lý</h5>
                </div>
                <div class="card-body py-2">
                    <div class="table-responsive-lg">
                        <table class="text-center table text-nowrap table-inverse table-striped table-hover" id="tbl-programs">
                            <thead>
                                <tr>
                                    <th i18n lang-key="no">STT</th>
                                    <th i18n lang-key="proName" class="text-left">Tên chương trình</th>
                                    <th i18n lang-key="duration">Thời gian</th>
                                    <th i18n lang-key="beginDate">Ngày bắt đầu</th>
                                    <th i18n lang-key="tuition">Học phí</th>
                                    <th i18n lang-key="manage">Quản lý</th>
                                    <th i18n lang-key="option">Tùy chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php require '../../php/program/manager_get_all.php'; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MODAL FOR PROGRAM UPDATE -->
<div class="modal fade" id="modal-update-program" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" i18n lang-key="updatePro">Chỉnh sửa chương trình đào tạo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/php/program/update.php" method="POST">
                <div class="modal-body py-2">
                    <input type="hidden" name="p_id" id="hidden-program-id" value="">
                    <fieldset class="form-group">
                        <label i18n lang-key="proName">Tên chương trình</label>
                        <input id="inp-program-name" type="text" class="form-control" placeholder="Nhập tên chương trình" maxlength="50" readonly required>
                    </fieldset>
                    <fieldset class="form-group row col-4">
                        <label i18n lang-key="duration">Thời gian đào tạo</label>
                        <div class="input-group">
                            <input name="p_duration" id="inp-duration" type="number" class="form-control" min="1" max="10" step="0.5" value="4">
                            <div class="input-group-append">
                                <span class="input-group-text" i18n lang-key="years">Năm</span>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="form-group">
                        <label i18n lang-key="beginDate">Ngày bắt đầu</label>
                        <input name="p_begin_at" id="inp-begin-date" type="date" class="form-control">
                    </fieldset>
                    <fieldset class="form-group">
                        <label i18n lang-key="tuition">Học phí</label>
                        <div class="input-group">
                            <input name="p_tuition" id="inp-tuition" type="number" class="form-control" placeholder="Đơn vị: VND" min="0" max="1000000000" step="1000" value="1000000">
                            <div class="input-group-append">
                                <span class="input-group-text">VND</span>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary"><i class="fa fa-download"></i> <span i18n lang-key="update">Lưu thay đổi</span></button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> <span i18n lang-key="close">Đóng</span></button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    $(document).ready(function() {
        $('#tbl-programs').DataTable({
            dom: "<'row'<'col-md-6'l><'col-md-6'f>>tip",
            ordering: false,
            language: {
                url: "/assets/lang-vi.json"
            },
            initComplete: function () {
                // Change lang after dtTable loaded
                if (sessionStorage.getItem('currentLang') === 'en') {
                    changeLangEN();
                }
            }
        });

        $('#js-toggle-lang').click(function() {
            changeLocaleUnit();
        });
        if (sessionStorage.getItem('currentLang') === 'en') {
            changeLocaleUnit();
        }

        $('.js-btn-update').click(function() {
            let tr = $(this).closest('tr');
            let p_name = tr.find('td').eq(1).text();
            let duration = tr.find('td').eq(2).text().split(" ")[0];
            let old_date = tr.find('td').eq(3).text().split('/');
            let tuition = tr.find('td').eq(4).text().split(" ")[0].replace(/,/g, '');

            $('#inp-program-name').val(p_name);
            $('#inp-duration').val(duration);
            $('#inp-begin-date').val(`${old_date[2]}-${old_date[1]}-${old_date[0]}`);
            $('#inp-tuition').val(tuition);
        });

    });
    function passIdToModal(id) {
        $('#hidden-program-id').val(id.toString());
    }
    function changeLocaleUnit() {
        $('#tbl-programs tr').each(function () {
            let moneyRow = $(this).find('td').eq(4);
            moneyRow.text(moneyRow.text().replace(/,/g, '.'));
        });
        $('#tbl-programs tr').each(function () {
            let dateRow = $(this).find('td').eq(3);
            let date = dateRow.text().split('/');
            dateRow.text(date[2]+'/'+date[1]+'/'+date[0]);
        });
    }
</script>

<?php include '../template/footer.php'; ?>
