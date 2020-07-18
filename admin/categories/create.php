<?php
if (isset($_POST['btnsave'])) {
    extract($_REQUEST);
    $okUpload = false;
    if (checkType($_FILES['images']['name'],array('jpg','png','gif','tiff')) && checkSize($_FILES['images']['size'],0,5*1024*1024)){
        $okUpload = true;
        $images = uniqid() . $_FILES['images']['name'];
    } 
    if(checkType($_FILES['images']['name'], array('jpg', 'png', 'gif', 'tiff'))==false && $_FILES['images']['size']>0){
        $errors['errors_img'] = 'File không đúng định dạng';
    }
    if (!file_exists($_FILES["images"]["tmp_name"])){
        $errors['errors_img'] = 'Vui lòng chọn ảnh danh mục';
    }
    if(array_filter($errors)==false){
    insert_category($name, $images);
    if ($okUpload) {
        move_uploaded_file($_FILES['images']['tmp_name'], '../images/categories/' . $images);
    }
    $_SESSION['message'] = "Thêm dữ liệu thành công";
    header('Location:' . ROOT . 'admin/?page=category');
    die();
}
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm danh mục sản phẩm </h6>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data"  class="needs-validation" novalidate>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name"  value="<?=isset($name)?$name:''?>" class="form-control" placeholder="Nhập tên danh mục" required>
                    <div class="invalid-feedback">
                                Vui lòng nhập tên danh mục sản phẩm
                                </div>
                </div>
                <div class="form-group">
                    <input type="file" name="images" class="form-file-input border" id="">
                    <?php if (isset($errors['errors_img'])) : ?>
                                <p class="text-danger mt-2"><?= $errors['errors_img'] ?></p>
                            <?php endif; ?>
                </div>
                <button type="submit" name="btnsave" class="btn btn-primary">Ghi lại</button>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->