<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    comment_delete($id);
    $_SESSION['message'] = "Xóa dữ liệu thành công";
    header('location:' . ROOT . 'admin/?page=comment');
    die;
}
if (isset($_POST['btn-del'])) {
    extract($_REQUEST);
    foreach ($id as $id_comment) {
        comment_delete($id_comment);
    }
    $_SESSION['message'] = "Xóa dữ liệu thành công";
    header('location:' . ROOT . 'admin/?page=comment');
    die;
}

$comment_custom = list_all_comment_custom();
$comment_member = list_all_comment_member();
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
            <h6 class="m-0 font-weight-bold text-primary">Danh sách bình luận </h6>
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
                                <th>Mã bình luận</th>
                                <th>Họ tên</th>
                                <th>Số điện thoại</th>
                                <th>Tên sản phẩm</th>
                                <th>Nội dung</th>
                                <th>Xếp hạng</th>
                                <th>Ngày bình luận</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>
                                    <input type="checkbox" name="checkall" class="checkall">
                                </th>
                                <th>Mã bình luận</th>
                                <th>Họ tên</th>
                                <th>Số điện thoại</th>
                                <th>Tên sản phẩm</th>
                                <th>Nội dung</th>
                                <th>Xếp hạng</th>
                                <th>Ngày bình luận</th>
                                <th>Thao tác</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($comment_custom as $cc) : ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="id[]" id="" value="<?= $cc['id'] ?>">
                                    </td>
                                    <td><?= $cc['id'] ?></td>
                                    <td><?= $cc['custom_name'] ?></td>
                                    <td><?= $cc['phone'] ?></td>
                                    <td><?= $cc['product_name'] ?></td>
                                    <td><?= $cc['content'] ?></td>
                                    <td><?= $cc['rating'] ?></td>
                                    <td><?= $cc['created_at'] ?></td>
                                    <td>
                                        <?php if ($cc['approve'] == 1) : ?>
                                            <a href="<?= ROOT ?>admin/?page=comment&action=reply&id=<?= $cc['id'] ?>" class="btn btn-success d-block p-2 w-75 mb-2"><i class="fas fa-reply"></i></a>
                                        <?php else : ?>
                                            <a href="<?= ROOT ?>admin/?page=comment&action=edit&id=<?= $cc['id'] ?>" class="btn btn-success d-block p-2 w-75 mb-2"><i class="fas fa-check"></i></a>
                                        <?php endif; ?>
                                        <a href="<?= ROOT ?>admin/?page=comment&action=detail&id=<?= $cc['id'] ?>" class="btn btn-primary  d-block p-2 w-75 mb-2"><i class="fas fa-info-circle"></i></a>
                                        <a href="<?= ROOT ?>admin/?page=comment&id=<?= $cc['id'] ?>" onclick="return confirm('Bạn có chắc muốn xóa không')" class="btn btn-danger d-block p-2 w-75 mb-2"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <?php foreach ($comment_member as $cm) : ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="id[]" id="" value="<?= $cm['id'] ?>">
                                    </td>
                                    <td><?= $cm['id'] ?></td>
                                    <td><?= $cm['fullname'] ?></td>
                                    <td><?= $cm['phone'] ?></td>
                                    <td><?= $cm['product_name'] ?></td>
                                    <td><?= $cm['content'] ?></td>
                                    <td><?= $cm['rating'] ?></td>
                                    <td><?= $cm['created_at'] ?></td>
                                    <td>
                                        <?php if ($cm['approve'] == 1) : ?>
                                            <a href="<?= ROOT ?>admin/?page=comment&action=reply&id=<?= $cm['id'] ?>" class="btn btn-success d-block p-2 w-75 mb-2"><i class="fas fa-reply"></i></a>
                                        <?php else : ?>
                                            <a href="<?= ROOT ?>admin/?page=comment&action=edit&id=<?= $cm['id'] ?>" class="btn btn-success d-block p-2 w-75 mb-2"><i class="fas fa-check"></i></a>
                                        <?php endif; ?>
                                        <a href="<?= ROOT ?>admin/?page=comment&action=detail&id=<?= $cm['id'] ?>" class="btn btn-primary  d-block p-2 w-75 mb-2"><i class="fas fa-info-circle"></i></a>
                                        <a href="<?= ROOT ?>admin/?page=comment&id=<?= $cm['id'] ?>" onclick="return confirm('Bạn có chắc muốn xóa không')" class="btn btn-danger d-block p-2 w-75 mb-2"><i class="far fa-trash-alt"></i></a>
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