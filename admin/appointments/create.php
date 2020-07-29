<?php
if (isset($_POST['btnsave'])) {
    extract($_REQUEST);
    $custom = custom_check('phone',$phone);
    insert_appointment($id_member, $id_customer, $day, $id_time);
    $_SESSION['message'] = "Thêm dữ liệu thành công";
    header('Location:' . ROOT . 'admin/?page=appointment');
    die();
}
    // $day = date("Y-m-d");
    // $time = appointment_list_time(4,$day);
    // $member = member_list_time(3,$day);
    $time = list_all_time();
    $member = member_list_role(3);
$date= date_create();
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
            <form action="" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                <div class="row">
                    <div class="col-6">
                    <div class="form-group">
                            <label for="phone">Số điện thoại</label>
                            <input type="text" name="phone" id="phone" value="<?= isset($phone) ? $phone : '' ?>" class="form-control" placeholder="Nhập số điện thoại khách" required>
                            <div class="invalid-feedback">
                                Vui lòng nhập số điện thoại khách hàng
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Tên khách hàng</label>
                            <?php if(isset($custom['name'])):?>
                            <input type="text" name="name" id="name" value="<?= $custom['name']?>" class="form-control" placeholder="Nhập tên khách hàng">
                           <?php elseif(isset($name)):?>
                            <input type="text" name="name" id="name" value="<?=$name?>" class="form-control" placeholder="Nhập tên khách hàng">
                           <?php else: ?>
                            <input type="text" name="name" id="name" value="" class="form-control" placeholder="Nhập tên khách hàng">
                            <?php endif; ?>
                            <div class="invalid-feedback">
                                Vui lòng nhập tên khách hàng
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id_member">Chọn stylelist</label>
                            <select name="id_member" id="id_member" class="form-control">
                            <option value="" selected>Chọn stylelist</option>
                                <?php foreach ($member as $m) : ?>
                                        <option value="<?= $m['id'] ?>"><?= $m['fullname'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="day">Chọn ngày hẹn</label>
                            <select name="day" id="day" class="form-control">
                                        <option value="<?= date("Y/m/d") ?>">Hôm nay: <?= date("d/m/Y") ?></option>
                                        <option value="<?= $date1= date_format(date_modify($date,"+1 day"),"Y/m/d") ?>">Ngày mai: <?= date_format(date_modify($date,"+0 day"),"d/m/Y") ?></option>
                                        <option value="<?= date_format(date_modify($date,"+1 day"),"Y/m/d") ?>">Ngày kia: <?= date_format(date_modify($date,"+0 day"),"d/m/Y") ?></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_time">Chọn giờ hẹn</label>
                            <select name="id_time" id="id_time" class="form-control">
                            <option value="" selected>Chọn giờ hẹn</option>
                                <?php foreach ($time as $t) : ?>
                                        <option value="<?= $t['id'] ?>"><?= $t['time'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                    <div class="form-group">
                            <!--Load categories (danh mục sản phẩm)-->
                            <label class="d-block">Chọn dịch vụ</label>
                                <?php foreach ($service as $s) : ?>
                                    <input type="checkbox" id="service<?= $s['id'] ?>"  name="id_service[]" value="<?= $s['id'] ?>">
                                    <label for="service<?= $s['id'] ?>"><?= $s['name'] ?></label><br>
                                <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <button type="submit" name="btnsave" class="btn btn-primary">Ghi lại</button>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->