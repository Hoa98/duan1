<div class="my-account">
                    <p class="my-account-title">Đổi Số điện thoại</p>
                    <p>Vui lòng nhập địa số điện thoại mới</p>
                </div>
                <form action="" method="post" novalidate class="needs-validation form-contact">
                    <div class="form-group row">
                        <div for="" class="col-sm-3 text-right">Số điện thoại</div>
                        <div class="col-sm-9">
                            <span class=""><?= $custom['phone'] ?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div for="" class="col-sm-3 text-right">Nhập số điện thoại mới</div>
                        <div class="col-sm-9">
                        <input type="text" class="form-control w-50" id="" name="phone" value="<?=isset($phone)?$phone:''?>" pattern="^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$" required>
                        <div class="invalid-feedback">
                            Số điện thoại không đúng định dạng
                        </div>
                        <?php if (isset($error['errors_phone'])) : ?>
            <p class="text-danger mb-0"><?= $error['errors_phone'] ?>
            </p>
          <?php endif; ?>
                        <button class="button button-contactForm boxed-btn mt-3" name="btnSave" type="submit">Xác nhận</button>
                        <a class="button button-contactForm boxed-btn mt-3 ml-3" href="<?=ROOT?>?page=profile&action=profile">Trở lại</a>
                        </div>
                    </div>
                   
                </form>