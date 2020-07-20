<?php
$id = $_GET['id'];
$time = list_one_time($id);
if (isset($_POST['btnUpdate'])) {
    extract($_REQUEST);
    time_update($id, $time);
    $_SESSION['message']= 'Cập nhật dữ liệu thành công';
    header('Location:'. ROOT . 'admin/?page=time');
    die();
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Sửa khung giờ </h6>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data"  class="needs-validation" novalidate>
                <div class="form-group">
                    <label for="time">Khung giờ</label>
                    <input type="text" name="time" id="time" class="form-control" placeholder="Nhập tên danh mục" required value="<?=isset($time)?$time:$time['time']?>">
                    <div class="invalid-feedback">
                                Vui lòng nhập khung giờ
                                </div>
                </div>
                <input type="hidden" name="id" value="<?= $time['id'] ?>">
                <button type="submit" name="btnUpdate" class="btn btn-primary">Ghi lại</button>
            </form>
        </div>
    </div>

</div>