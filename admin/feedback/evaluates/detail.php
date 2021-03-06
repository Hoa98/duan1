<?php

if (isset($_POST['btn-del'])) {
    extract($_REQUEST);
    foreach ($id as $id_evaluate) {
        evaluate_delete($id_evaluate);
    }
    $_SESSION['message'] = "Xóa dữ liệu thành công";
    header('location:' . ROOT . 'admin/?page=evaluate');
    die;
}
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $evaluate = list_parent_evaluate($id);
}

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
            <h6 class="m-0 font-weight-bold text-primary">Trả lời đánh giá</h6>
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
                                <th>Mã đánh giá</th>
                                <th>Tên tài khoản</th>
                                <th>Dịch vụ</th>
                                <th>Nội dung</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                            <th>
                                <input type="checkbox" name="checkall" class="checkall">
                                </th>
                                <th>Mã đánh giá</th>
                                <th>Tên tài khoản</th>
                                <th>Dịch vụ</th>
                                <th>Nội dung</th>
                                <th>Thao tác</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($evaluate as $e) : ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="id[]" id="" value="<?= $e['id'] ?>">
                                    </td>
                                    <td><?= $e['id'] ?></td>
                                    <td><?= $e['account'] ?></td>
                                    <td><?= $e['services_name'] ?></td>
                                    <td><?= $e['content'] ?></td>
                                    <td>
                                    <a href="<?= ROOT ?>admin/?page=evaluate&action=reply&id=<?=$e['id'] ?>" class="btn btn-success d-block p-2 w-75 mb-2"><i class="fas fa-reply"></i></a>
                                    <a href="<?= ROOT ?>admin/?page=evaluate&action=detail&id=<?= $e['id'] ?>" class="btn btn-primary  d-block p-2 w-75 mb-2"><i class="fas fa-info-circle"></i></a>
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