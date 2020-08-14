<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $service = service_list_one('id', $id);
    $booking = list_one_appointment($_GET['id_booking']);
}
if (isset($_POST['btnSave'])) {
    extract($_REQUEST);
    insert_evaluate($content, $rating, $_SESSION['customer']['id'], $booking['id_member'], $service['id'], 0);
}
?>
<section>
    <h3 class="text-uppercase mb-5 text-center">Đánh giá dịch vụ</h3>
    <?php if (!isset($_SESSION['member'])) : ?>
        <form action="" method="post" class="needs-validation form-contact" novalidate>
            <div class="form-group">
                <input type="range" name="rating" min="0" max="5" value="0" step="0.5" id="backing3">
                <div class="rateit" data-rateit-backingfld="#backing3"></div>
                <textarea class="form-control" rows="3" minlength="5" name="content" placeholder="Nhận xét của bạn..." required></textarea>
                <div class="invalid-feedback">
                    Nhận xét có ít nhất 5 ký tự
                </div>
            </div>
            <button type="submit" class="boxed-btn3" name="btnSave">Gửi nhận xét</button>
        </form>
    <?php endif; ?>
</section>