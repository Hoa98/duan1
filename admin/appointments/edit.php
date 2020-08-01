<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $app = list_one_appointment($id);
    $customer = custom_check('id', $app['id_customer']);
    $app_detail = all_app_detail($app['id']);
}
if (isset($_POST['btnsave'])) {
    extract($_REQUEST);
    if (empty($id_service)) {
        $errors['errors_service'] = 'Vui lòng chọn dịch vụ';
    }
    if (array_filter($errors) == false) {
        appointment_update($id,$cancel);
        app_book_delete($id);
        foreach ($id_service as $s) {
            insert_app_detail($id,$s);
        }
        $_SESSION['message'] = "Cập nhật dữ liệu thành công";
        header('Location:' . ROOT . 'admin/?page=appointment');
        die();
    }
}
$service = service_list_all();

?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Đặt lịch hẹn</h6>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate onsubmit="return check()">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="phone">Số điện thoại</label>
                            <input name="phone" id="phone" value="<?= isset($customer['phone']) ? $customer['phone'] : '' ?>" class="form-control" readonly>
                        </div>
                        <input type="hidden" name="id" value="<?=$app['id']?>">
                        <div class="form-group">
                            <label for="cancel">Trạng thái</label>
                            <select name="cancel" id="multi-selectbox" class="form-control">
                                <option value="0" <?= $app['cancel'] == 0 ? 'selected' : '' ?>>Sắp tới</option>
                                <option value="1" <?= $app['cancel'] == 1 ? 'selected' : '' ?>>Chờ phục vụ</option>
                                <option value="2" <?= $app['cancel'] == 2 ? 'selected' : '' ?>>Đang phục vụ</option>
                                <option value="3" <?= $app['cancel'] == 3 ? 'selected' : '' ?>>Hoàn thành</option>
                                <option value="4" <?= $app['cancel'] == 4 ? 'selected' : '' ?>>Đã hủy lịch</option>
                            </select>
                        </div>

                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <!--Load categories (danh mục sản phẩm)-->
                            <label class="d-block">Chọn dịch vụ</label>
                            <?php foreach ($service as $s) : ?>
                                <?php foreach ($app_detail as $detail) : ?>
                                    <?php if($detail['id_service']==$s['id']): ?>
                                        <input type="checkbox" id="service<?= $s['id'] ?>" checked name="id_service[]" value="<?= $s['id'] ?>">
                                <label for="service<?= $s['id'] ?>"><?= $s['name'] ?></label><br>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <input type="checkbox" id="service<?= $s['id'] ?>" name="id_service[]" value="<?= $s['id'] ?>">
                                <label for="service<?= $s['id'] ?>"><?= $s['name'] ?></label><br>
                            <?php endforeach; ?>
                            <?php if (isset($errors['errors_service'])) : ?>
                                <p class="text-danger mt-2"><?= $errors['errors_service'] ?></p>
                            <?php endif; ?>
                            <p class="text-danger mt-2" id="msg-service"></p>
                        </div>
                    </div>
                </div>
                <button type="submit" name="btnsave" class="btn btn-primary">Ghi lại</button>
            </form>
        </div>
    </div>

</div>
<script>
    function check() {
        var flag = true;
        console.log('dsss');
        var service = document.getElementsByName("id_service[]");
        var str = '';
        for (var i = 0; i < service.length; i++) {
            if (service[i].checked) {
                str = service[i].value;
            }
        }
        if (str == "" || str == null) {
            document.getElementById('msg-service').innerHTML = "Vui lòng chọn ít nhất một dịch vụ";
            flag = false;
        }
        if (!flag) {
            return false;
        } else {
            return true;
        }
    }
</script>