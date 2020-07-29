<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    appointment_delete($id);
    $_SESSION['message'] = "Xóa dữ liệu thành công";
    header('location:' . ROOT . 'admin/?page=appointment');
    die;
}
if (isset($_POST['btn-del'])) {
    extract($_REQUEST);
    foreach ($id as $id_appointment) {
        appointment_delete($id_appointment);
    }
    $_SESSION['message'] = "Xóa dữ liệu thành công";
    header('location:' . ROOT . 'admin/?page=appointment');
    die;
}

$appointment = list_all_appointment();
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <?php if (isset($_SESSION['message'])) : ?>
        <div class="card-header py-3 text-success">
            <h6 class="font-weight-bold"><?= $_SESSION['message'] ?></h6>
        </div>
    <?php endif; ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách lịch hẹn <a href="<?= ROOT ?>admin/?page=appointment&action=add" class="btn btn-primary ml-3">Thêm mới</a></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="" method="POST" class="col-md-12">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" name="checkall" class="checkall">
                                </th>
                                <th>Mã lịch hẹn</th>
                                <th>Thợ cắt</th>
                                <th>Tên khách hàng</th>
                                <th>Số điện thoại</th>
                                <th>Ngày cắt</th>
                                <th>Thời gian</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                            <th>
                                <input type="checkbox" name="checkall" class="checkall">
                                </th>
                                <th>Mã lịch hẹn</th>
                                <th>Thợ cắt</th>
                                <th>Tên khách hàng</th>
                                <th>Số điện thoại</th>
                                <th>Ngày cắt</th>
                                <th>Thời gian</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($appointment as $a) : ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="id[]" id="" value="<?= $a['id'] ?>">
                                    </td>
                                    <td><?= $a['id'] ?></td>
                                    <td><?= $a['account'] ?></td>
                                    <td><?= $a['name'] ?></td>
                                    <td><?= $a['phone'] ?></td>
                                    <td><?= $a['day'] ?></td>
                                    <td><?= $a['time'] ?></td>
                                    <td><?= ($a['cancel']) ? 'Đã hủy' : 'Sắp tới' ?></td>
                                    <td>
                                        <a href="<?= ROOT ?>admin/?page=appointment&action=edit&id=<?= $a['id'] ?>" class="btn btn-success"><i class="far fa-edit"></i></a>
                                        <a href="<?= ROOT ?>admin/?page=appointment&id=<?= $a['id'] ?>" onclick="return confirm('Bạn có chắc muốn xóa không')" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary" id="btndel-appointment" name="btn-del">Xóa mục đánh dấu</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->