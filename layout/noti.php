<?php if (isset($btnLogin)) : ?>
    <?php if (isset($_SESSION['customer'])) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> Đăng nhập thành công!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php else : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong> Tên đăng nhập hoặc mật khẩu không đúng!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
<?php endif; ?>
<?php if (isset($btnRegister)) : ?>
    <?php if (array_filter($errors) == false) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> Đăng ký thành công!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php else : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong> Đăng ký thất bại!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
<?php endif; ?>
<?php if (isset($btnBooking)) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong> Đặt lịch thành công!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>