<?php

if (isset($_POST['btnsave'])) {
    extract($_REQUEST);
    if(empty($id_service)){
        $errors['errors_service'] = 'Vui lòng chọn dịch vụ';
    }if (array_filter($errors) == false) {
    $custom = custom_check('phone', $phone);
    if($custom>0){
        $id_customer = $custom['id'];
    }else{
        $cu = guest_insert('', $phone,'', 'user.svg');
       $cus = custom_check('phone', $phone);
       $id_customer = $cus['id'];
    }
     insert_appointment($id_member, $id_customer, $day, $id_time);
    $booking=list_top_app($id_customer);
    foreach($id_service as $s){
        insert_app_detail($booking['id'],$s);
    }
    $_SESSION['message'] = "Thêm dữ liệu thành công";
    header('Location:' . ROOT . 'admin/?page=appointment');
    die();
}
}
$member = member_list_role(3);
$date = date_create();
$service = service_list_all();
$customers = custom_list_all();
$time = list_all_time();
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Đặt lịch hẹn</h6>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate
                onsubmit="return check()">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="phone">Số điện thoại</label>
                            <input list="browsers" name="phone" id="phone" value="<?=isset($phone)?$phone:''?>"
                                class="form-control" placeholder="Nhập số điện thoại khách"
                                pattern="^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$" required>
                            <datalist id="browsers">
                                <?php foreach($customers as $c):?>
                                <option value="<?=$c['phone']?>"><?=$c['name']?>
                                    <?php endforeach; ?>
                            </datalist>
                            <div class="invalid-feedback">
                                Số điện thoại không đúng định dạng
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id_member">Chọn stylelist</label>
                            <select name="id_member" id="multi-selectbox" class="form-control">
                                <?php foreach ($member as $m) : ?>
                                <option value="<?= $m['id'] ?>"><?= $m['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="day">Chọn ngày hẹn</label>
                            <select name="day" id="day" class="form-control" required>
                                <option value="">Chọn ngày hẹn</option>
                                <option value="<?= date("Y-m-d") ?>">Hôm nay: <?= date("Y-m-d") ?></option>
                                <option value="<?= $date1 = date_format(date_modify($date, "+1 day"), "Y-m-d") ?>">Ngày
                                    mai: <?= $date1 ?></option>
                                <option value="<?= $date2 = date_format(date_modify($date, "+1 day"), "Y-m-d") ?>">Ngày
                                    kia: <?= $date2 ?></option>
                            </select>
                            <div class="invalid-feedback">
                                Vui lòng chọn ngày hẹn
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <!--Load categories (danh mục sản phẩm)-->
                            <label class="d-block">Chọn dịch vụ</label>
                            <select class="mul-select form-control" name="id_service[]" multiple="true" required>
                                <option value="">Chọn dịch vụ</option>
                                <?php foreach ($service as $s) : ?>
                                <option value="<?= $s['id'] ?>"><?= $s['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?php if (isset($errors['errors_service'])) : ?>
                            <p class="text-danger mt-2"><?= $errors['errors_service'] ?></p>
                            <?php endif; ?>
                            <div class="invalid-feedback">
                                Vui lòng chọn dịch vụ
                            </div>
                        </div>
                        <div class="form-group" id="result">
                            <label for="id_time">Chọn giờ hẹn</label>
                            <select name="id_time" id="id_time" class="form-control" required>
                                <option value="" selected>Chọn giờ hẹn</option>
                                <?php foreach ($time as $t) : ?>
                                <option value="<?= $t['id'] ?>"><?= $t['time'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                Vui lòng chọn giờ hẹn
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" name="btnsave" class="btn btn-primary">Ghi lại</button>
            </form>
        </div>
    </div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('#multi-selectbox').change(function() {
        var id = $('#multi-selectbox').val();
        var day = $('#day').val();
        $.post("appointments/xuly.php", {
            id: id,
            day: day
        }, function(data) {
            $('#result').html(data);
        });
    });
    $('#day').change(function() {
        var id = $('#multi-selectbox').val();
        var day = $('#day').val();
        $.post("appointments/xuly.php", {
            id: id,
            day: day
        }, function(data) {
            $('#result').html(data);
        });
    });
});
</script>