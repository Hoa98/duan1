<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    time_delete($id);
    $_SESSION['message'] = "Xóa dữ liệu thành công";
    header('location:' . ROOT . 'admin/?page=time');
    die;
}
if (isset($_POST['btn-del'])) {
    extract($_REQUEST);
    foreach ($id as $id_time) {
        time_delete($id_time);
    }
    $_SESSION['message'] = "Xóa dữ liệu thành công";
    header('location:' . ROOT . 'admin/?page=time');
    die;
}

$time = list_all_time();
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
            <h6 class="m-0 font-weight-bold text-primary">Danh sách khung giờ <a href="<?= ROOT ?>admin/?page=time&action=add" class="btn btn-primary ml-3">Thêm mới</a></h6>
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
                                <th>Mã khung giờ</th>
                                <th>Khung giờ</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                            <th>
                                <input type="checkbox" name="checkall" class="checkall">
                                </th>
                                <th>Mã khung giờ</th>
                                <th>Khung giờ</th>
                                <th>Thao tác</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($time as $t) : ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="id[]" id="" value="<?= $t['id'] ?>">
                                    </td>
                                    <td><?= $t['id'] ?></td>
                                    <td><?= $t['time'] ?></td>
                                    <td>
                                        <a href="<?= ROOT ?>admin/?page=time&action=edit&id=<?= $t['id'] ?>" class="btn btn-success"><i class="far fa-edit"></i></a>
                                        <a href="<?= ROOT ?>admin/?page=time&id=<?= $t['id'] ?>" onclick="return confirm('Bạn có chắc muốn xóa không')" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary" id="btndel-category" name="btn-del">Xóa mục đánh dấu</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->