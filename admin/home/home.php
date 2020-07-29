<?php
$custom = count_row('customers');
$member = count_row('members');
$service = count_row('services');
$appointments = count_row('appointments');
$appointment = list_all_appointment();
$app_com = appointment_list_cancel('0');
$app_cancel = appointment_list_cancel('1');
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Bảng tin</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="bg-success p-3 text-white rounded-top">
                <div class="row">
                    <div class="col-6">
                        <i class="fas fa-users icon-3x"></i>
                    </div>
                    <div class="col-6 text-right">
                        <p class="qty-3x"><?=$custom?></p>
                        Khách hàng
                    </div>
                </div>
            </div>
            <div class="bg-gray-200 border-top p-3 rounded-bottom">
                <div class="row">
                    <div class="col-6"><a href="<?=ROOT?>/admin/?page=custom" class="text-success">Xem chi tiết</a></div>
                    <div class="col-6 text-right"><a href="<?=ROOT?>/admin/?page=custom" class="text-success"><i class="fas fa-arrow-alt-circle-right"></i></a></div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="bg-primary p-3 text-white rounded-top">
                <div class="row">
                    <div class="col-6">
                        <i class="fas fa-cut icon-3x"></i></i>
                    </div>
                    <div class="col-6 text-right">
                        <p class="qty-3x"><?=$service?></p>
                        Dịch vụ
                    </div>
                </div>
            </div>
            <div class="bg-gray-200 border-top p-3 rounded-bottom">
                <div class="row">
                    <div class="col-6"><a href="<?=ROOT?>/admin/?page=service" class="text-primary">Xem chi tiết</a></div>
                    <div class="col-6 text-right"><a href="<?=ROOT?>/admin/?page=service" class="text-primary"><i class="fas fa-arrow-alt-circle-right"></i></a></div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="bg-warning p-3 text-white rounded-top">
                <div class="row">
                    <div class="col-6">
                        <i class="fas fa-users icon-3x"></i>
                    </div>
                    <div class="col-6 text-right">
                        <p class="qty-3x"><?=$member?></p>
                        Nhân viên
                    </div>
                </div>
            </div>
            <div class="bg-gray-200 border-top p-3 rounded-bottom">
                <div class="row">
                    <div class="col-6"><a href="<?=ROOT?>/admin/?page=member" class="text-warning">Xem chi tiết</a></div>
                    <div class="col-6 text-right"><a href="<?=ROOT?>/admin/?page=member" class="text-warning"><i class="fas fa-arrow-alt-circle-right"></i></a></div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="bg-danger p-3 text-white rounded-top">
                <div class="row">
                    <div class="col-6">
                        <i class="far fa-calendar-alt icon-3x"></i>
                    </div>
                    <div class="col-6 text-right">
                        <p class="qty-3x"><?=$appointments?></p>
                        Lịch hẹn
                    </div>
                </div>
            </div>
            <div class="bg-gray-200 border-top p-3 rounded-bottom">
                <div class="row">
                    <div class="col-6"><a href="<?=ROOT?>/admin/?page=appointment" class="text-danger">Xem chi tiết</a></div>
                    <div class="col-6 text-right"><a href="<?=ROOT?>/admin/?page=appointment" class="text-danger"><i class="fas fa-arrow-alt-circle-right"></i></a></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Lịch hẹn  -->

    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Lịch hẹn sắp tới</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Tất cả lịch hẹn</a>
            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Lịch hẹn đã hủy</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <form action="<?=ROOT?>/admin/?page=appointment" method="POST" class="col-md-12">
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
                                    <?php foreach ($app_com as $ac) : ?>
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="id[]" id="" value="<?= $ac['id'] ?>">
                                            </td>
                                            <td><?= $ac['id'] ?></td>
                                            <td><?= $ac['account'] ?></td>
                                            <td><?= $ac['name'] ?></td>
                                            <td><?= $ac['phone'] ?></td>
                                            <td><?= $ac['day'] ?></td>
                                            <td><?= $ac['time'] ?></td>
                                            <td><?= ($ac['cancel']) ? 'Đã hủy' : 'Sắp tới' ?></td>
                                            <td>
                                                <a href="<?= ROOT ?>admin/?page=appointment&action=edit&id=<?= $ac['id'] ?>" class="btn btn-success"><i class="far fa-edit"></i></a>
                                                <a href="<?= ROOT ?>admin/?page=appointment&id=<?= $ac['id'] ?>" onclick="return confirm('Bạn có chắc muốn xóa không')" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
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
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <form action="<?=ROOT?>/admin/?page=appointment" method="POST" class="col-md-12">
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
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <form action="<?=ROOT?>/admin/?page=appointment" method="POST" class="col-md-12">
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
                                    <?php foreach ($app_cancel as $cancel) : ?>
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="id[]" id="" value="<?= $cancel['id'] ?>">
                                            </td>
                                            <td><?= $cancel['id'] ?></td>
                                            <td><?= $cancel['account'] ?></td>
                                            <td><?= $cancel['name'] ?></td>
                                            <td><?= $cancel['phone'] ?></td>
                                            <td><?= $cancel['day'] ?></td>
                                            <td><?= $cancel['time'] ?></td>
                                            <td><?= ($cancel['cancel']) ? 'Đã hủy' : 'Sắp tới' ?></td>
                                            <td>
                                                <a href="<?= ROOT ?>admin/?page=appointment&action=edit&id=<?= $cancel['id'] ?>" class="btn btn-success"><i class="far fa-edit"></i></a>
                                                <a href="<?= ROOT ?>admin/?page=appointment&id=<?= $cancel['id'] ?>" onclick="return confirm('Bạn có chắc muốn xóa không')" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
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
    </div>
</div>
<!-- /.container-fluid -->