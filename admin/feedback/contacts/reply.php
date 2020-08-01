<?php
$contact = list_one_contact('id',$_GET['id']);
if (isset($_POST['btnsave'])) {
    extract($_REQUEST);
    if (empty($content)) {
        $errors['errors-content'] = 'Vui lòng nhập nội dung';
    }if(array_filter($errors)==false){
        insert_reply_contact($content,$_SESSION['member']['id'],$contact['id']);
    $_SESSION['message'] = "Gửi email thành công";
    header('Location:' . ROOT . 'admin/?page=contact');
    die();
    }
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Trả lời </h6>
        </div>
        <div class="card-body">
        <form action="" method="post" class="needs-validation" novalidate>
                        <div class="form-group">
                            <label for="content">Nội dung</label>
                            <textarea name="content" id="detail" class="form-control" rows="5" required></textarea>
                            <div class="invalid-feedback">
                            Vui lòng nhập nội dung
                                </div>
                            <?php if(isset($errors['errors-content'])): ?>
                            <p class="text-danger mt-2"><?=$errors['errors-content']?></p>
                            <?php endif; ?>
                        </div>
                        <button type="submit" name="btnsave" class="btn btn-primary">Ghi lại</button>
                    </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->