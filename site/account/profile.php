<div class="my-account">
        <p class="my-account-title">Hồ Sơ Của Tôi</p>
        <p>Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
    </div>
    <form action="" method="post" enctype="multipart/form-data" novalidate class="needs-validation form-contact">
        <div class="row">
            <div class="col-10">
                <div class="form-group row">
                    <div for="" class="col-sm-3 text-right">Tên đăng nhập</div>
                    <div class="col-sm-9">
                        <span class=""><?= $custom['phone'] ?></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3  text-right col-form-label">Tên</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control w-75" name="name" id="" value="<?= $custom['name'] ?>" title="Họ tên không bao gồm số" pattern="[a-zA-Z\s'-'\sáàảãạăâắằấầặẵẫậéèẻ ẽêẹếềểễệóòỏõọôốồổỗộ ơớờởỡợíìỉĩịđùúủũụưứ? ?ửữựÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠ ƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼ? ??ÊỀỂỄỆỈỊỌỎỐỒỔỖỘỚỜỞ ỠỢỤỨỪỬỮỰỲỴÝỶỸửữựỵ ỷỹ]{1,20}" required>
                        <div class="invalid-feedback">
                            Họ tên không đúng định dạng
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div for="" class="col-sm-3 text-right">Email</div>
                    <div class="col-sm-9">
                        <span class=""><?= $custom['email'] ?></span><a href="?page=profile&action=email" class="ml-3 change">Thay đổi</a>
                    </div>
                </div>
                <div class="form-group row">
                    <div for="" class="col-sm-3 text-right">Số điện thoại</div>
                    <div class="col-sm-9">
                        <span class=""><?= $custom['phone'] ?></span><a href="?page=profile&action=phone" class="ml-3 change">Thay đổi</a>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3  text-right col-form-label">Địa chỉ</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control w-75" name="address" id="" value="<?= $custom['address'] ?>" required>
                        <div class="invalid-feedback">
                            Vui lòng nhập chính xác địa chỉ
                        </div>
                        <button class="button button-contactForm boxed-btn mt-3" name="btnUpdate" type="submit">Lưu</button>
                    </div>
                </div>
            </div>
            <div class="col-2 text-center border-left border-light">
                <img src="images/users/<?= $custom['images'] ?>" alt="" class="rounded-circle mb-3" width="70" height="70">
                <input type="hidden" name="image" value="<?= $custom['images'] ?>">
                <input type="file" name="images" id="">
                <?php if (isset($errors['errors_img'])) : ?>
                                <p class="text-danger mt-2"><?= $errors['errors_img'] ?></p>
                            <?php endif; ?>
            </div>
        </div>

    </form>