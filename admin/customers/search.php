<?php
extract($_REQUEST);
$result = search_custom($keyword);
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    custom_delete($id);
    $_SESSION['message'] = "Xóa dữ liệu thành công";
    header('location:' . ROOT . 'admin/?page=custom');
    die;
}
if (isset($_POST['btn-del'])) {
    extract($_REQUEST);
    foreach ($id as $id_custom) {
        custom_delete($id_custom);
    }
    $_SESSION['message'] = "Xóa dữ liệu thành công";
    header('location:' . ROOT . 'admin/?page=custom');
    die;
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách khách hàng tìm được với từ khóa "<?=isset($keyword)?$keyword:''?>"</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="" method="POST" class="col-12">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" name="checkall" class="checkall">
                                </th>
                                <th>Mã khách hàng</th>
                                <th>Họ tên</th>
                                <th>Số điện thoại</th>
                                <th>Ảnh đại diện</th>
                                <th>Email</th>
                                <th>Địa chỉ</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                            <th>
                                    <input type="checkbox" name="checkall" class="checkall">
                                </th>
                                <th>Mã khách hàng</th>
                                <th>Họ tên</th>
                                <th>Số điện thoại</th>
                                <th>Ảnh đại diện</th>
                                <th>Email</th>
                                <th>Địa chỉ</th>
                                <th>Thao tác</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($custom as $r) : ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="id[]"  value="<?= $r['id'] ?>">
                                    </td>
                                    <td><?= $r['id'] ?></td>
                                    <td><?= $r['name'] ?></td>
                                    <td><?= $r['phone'] ?></td>
                                    <td>
                                        <img src="../images/users/<?= $r['images'] ?>" width="90" alt="">
                                    </td>
                                    <td><?=$r['email']?></td>
                                    <td><?=$r['address']?></td>
                                    <td>
                                        <a href="<?= ROOT ?>admin/?page=custom&id=<?= $r['id'] ?>" onclick="return confirm('Bạn có chắc muốn xóa không')" class="btn btn-danger d-block p-2 w-75"><i class="far fa-trash-alt"></i></a>
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