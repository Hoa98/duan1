<?php 
if(isset($_SESSION['member'])){
    $customer = list_one_member($custom['id']);
}else{
    $customer = custom_list_one($custom['id']);
}

?>
<section class="booking">
    <div class="nav-order">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-all-tab" data-toggle="pill" href="#pills-all" role="tab"
                    aria-controls="pills-all" aria-selected="false">Tất cả</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                    aria-controls="pills-profile" aria-selected="false">Sắp tới</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                    aria-controls="pills-home" aria-selected="false">Chờ phục vụ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab"
                    aria-controls="pills-contact" aria-selected="false">Đang phục vụ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-finish-tab" data-toggle="pill" href="#pills-finish" role="tab"
                    aria-controls="pills-finish" aria-selected="false">Hoàn thành</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-cancel-tab" data-toggle="pill" href="#pills-cancel" role="tab"
                    aria-controls="pills-cancel" aria-selected="false">Đã hủy</a>
            </li>
        </ul>
    </div>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
            all
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            chờ phục vụ
        </div>
        <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            Dang
        </div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
            Da
        </div>
        <div class="tab-pane fade" id="pills-finish" role="tabpanel" aria-labelledby="pills-finish-tab">
            hoàn thành
        </div>
        <div class="tab-pane fade" id="pills-cancel" role="tabpanel" aria-labelledby="pills-cancel-tab">
            hủy
        </div>
    </div>
</section>