<?php
if (isset($_SESSION['member'])) {
  $customer = list_one_member($_SESSION['member']['id']);
  $phone = $customer['phone'];
  $name = $customer['name'];
  $address = $customer['address'];
  if (empty($_SESSION['cartCustom'][$_SESSION['customer']['id']])) {
    header('location: ' . ROOT . '?page=cart');
  }
} elseif (isset($_SESSION['customer'])) {
  $customer = custom_list_one($_SESSION['customer']['id']);
  $phone = $customer['phone'];
  $name = $customer['name'];
  $address = $customer['address'];
  if (empty($_SESSION['cart'])) {
    header('location: ' . ROOT . '?page=cart');
  }
}
//nguoi dung chua dăng nhap
//Xoa 1 san pham trong gio
if (isset($_REQUEST['btnDelete'])) {
  extract($_REQUEST);
  unset($_SESSION['cart'][$id]);
  header('Location: ' . ROOT . '?page=cart');
  die();
}
//Xoa gio
if (isset($_REQUEST['btnXoaCart'])) {
  extract($_REQUEST);
  unset($_SESSION['cart']);
  header('Location: ' . ROOT . '?page=cart');
  die();
}

//nguoi dung da dang nhap
//Xoa 1 sp trong gio
if (isset($_REQUEST['btnXoa'])) {
  extract($_REQUEST);
  unset($_SESSION['cartCustom'][$_SESSION['customer']['id']][$id]);
  header('Location: ' . ROOT . '?page=cart');
  die();
}
//xoa gio
if (isset($_REQUEST['btnXoaCartCustom'])) {
  extract($_REQUEST);
  unset($_SESSION['cartCustom'][$_SESSION['customer']['id']]);
  header('Location: ' . ROOT . '?page=cart');
  die();
}

/////====================Dat hang===================

if (isset($_REQUEST['btnOrder'])) {
  extract($_REQUEST);
  if (isset($_SESSION['customer'])) {
    $cart = $_SESSION['cartCustom'][$_SESSION['customer']['id']];
    if (isset($_SESSION['member'])) {
      $customer = custom_check('phone', $_SESSION['member']['phone']);
      if ($customer > 0) {
        insert_order($customer['id'], $address, $phone);
        $order = list_top_order($customer['id']);
      } else {
        $cu = guest_insert($name, $phone, $address, 'user.svg');
        $customer = custom_check('phone', $phone);
        insert_order($customer['id'], $address, $phone);
        $order = list_top_order($customer['id']);
      }
      foreach ($cart as $key => $value) {
        $pro = product_list_one('id', $value['id']);
        insert_detail($order['id'], $value['id'], $value['quantity']);
      }
    } else {
      insert_order($_SESSION['customer']['id'], $address, $phone);
      $order = list_top_order($_SESSION['customer']['id']);
      foreach ($cart as $key => $value) {
        $pro = product_list_one('id', $value['id']);
        insert_detail($order['id'], $value['id'], $value['quantity']);
      }
    }
    unset($_SESSION['cartCustom'][$_SESSION['customer']['id']]);
  } else {
    $cart = $_SESSION['cart'];
    $custom = custom_check('phone', $phone);
    if ($custom > 0) {
      if (empty($custom['password'])) {
        custom_update($custom['id'], $name, $address, 'user.svg');
        $cus = custom_check('phone', $phone);
        $id_customer = $cus['id'];
      }
    } else {
      $cu = guest_insert($name, $phone, $address, 'user.svg');
      $cus = custom_check('phone', $phone);
      $id_customer = $cus['id'];
    }
    insert_order($id_customer, $address, $phone);
    $order = list_top_order($id_customer);
    foreach ($cart as $key => $value) {
      $pro = product_list_one('id', $value['id']);
      insert_detail($order['id'], $value['id'], $value['quantity']);
    }
    unset($_SESSION['cart']);
  }

  header('Location: ' . ROOT . '?page=cart');
  die();
}
?>
<!-- bradcam_area_start -->
<div class="bradcam_area breadcam_bg overlay">
  <h3>Thanh toán</h3>
</div>
<!-- bradcam_area_end -->
<section class="checkout section-padding">
  <div class="container">
    <div class="row">
      <div class="col-7">
        <div class="text-center">
          <h3>Thông tin thanh toán</h3>
        </div>
        <?php if (isset($_SESSION['customer'])) : ?>
          <div class="row mb-5 mt-3">
            <div class="col-2">
              <img src="images/users/<?= $customer['images'] ?>" alt="avatar" width="50">
            </div>
            <div class="col-10">
              <p><?= $_SESSION['customer']['name'] ?> (<?= $_SESSION['customer']['phone'] ?>)</p>
            </div>
          </div>
        <?php endif; ?>
        <form action="" method="post" class="form-contact needs-validation" novalidate>
          <div class="form-group">
            <label for="">Họ tên</label>
            <input type="text" name="name" value="<?= isset($name) ? $name : '' ?>" placeholder="Tên của bạn" class="form-control" title="Họ tên không bao gồm số" pattern="[a-zA-Z\s'-'\sáàảãạăâắằấầặẵẫậéèẻ ẽêẹếềểễệóòỏõọôốồổỗộ ơớờởỡợíìỉĩịđùúủũụưứ? ?ửữựÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠ ƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼ? ??ÊỀỂỄỆỈỊỌỎỐỒỔỖỘỚỜỞ ỠỢỤỨỪỬỮỰỲỴÝỶỸửữựỵ ỷỹ]{1,20}" required />
            <div class="invalid-feedback">
              Họ tên không đúng định dạng
            </div>
          </div>
          <div class="form-group">
            <label for="">Địa chỉ</label>
            <textarea name="address" class="form-control" minlength="5" cols="30" rows="5" required><?= isset($address) ? $address : '' ?></textarea>
            <div class="invalid-feedback">
              Địa chỉ có ít nhất 5 ký tự
            </div>
          </div>
          <div class="form-group">
            <label for="">Số điện thoại</label>
            <input type="text" name="phone" value="<?= isset($phone) ? $phone : '' ?>" placeholder="Số điện thoại" class="form-control" pattern="^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$" required />
            <div class="invalid-feedback">
              SĐT không hợp lệ
            </div>
          </div>
          <a href="<?= ROOT ?>?page=cart" class="boxed-btn3 mr-5">Giỏ hàng</a>
          <button type="submit" name="btnOrder" class="boxed-btn3">Đặt hàng</button>
        </form>
      </div>


      <div class="col-5 checkout-table">
        <h4>Giỏ hàng</h4>
        <?php if (isset($_SESSION['customer'])) : ?>
          <table>
            <tbody>
              <?php if (isset($_SESSION['cartCustom'][$_SESSION['customer']['id']])) : ?>
                <?php foreach ($_SESSION['cartCustom'][$_SESSION['customer']['id']] as $cartCustom) : ?>
                  <tr>
                    <td>
                      <img src="images/products/<?= $cartCustom['images'] ?>" alt="ảnh sản phẩm" width="50">
                    </td>
                    <td><?= $cartCustom['name'] ?></td>
                    <td><?= number_format(($cartCustom['price'] - ($cartCustom['price'] * $cartCustom['sale'])) * $cartCustom['quantity'], 0, ',', '.') . 'đ' ?></td>
                  </tr>
                <?php endforeach; ?>
                <tr>
                  <td colspan="2">Tổng tiền</td>
                  <td><?= number_format(total_price($_SESSION['cartCustom'][$_SESSION['customer']['id']]), 0, ',', '.') . 'đ' ?></td>
                </tr>
              <?php else : header('Location: ' . ROOT . '?page=cart'); ?>
              <?php endif; ?>
            </tbody>
          </table>
        <?php elseif (isset($_SESSION['cart'])) : ?>
          <table>
            <tbody>
              <?php foreach ($_SESSION['cart'] as $cart) : ?>
                <tr>
                  <td>
                    <img src="images/products/<?= $cart['images'] ?>" alt="ảnh sản phẩm" width="50">
                  </td>
                  <td><?= $cart['name'] ?></td>
                  <td><?= number_format(($cart['price'] - ($cart['price'] * $cart['sale'])) * $cart['quantity'], 0, ',', '.') . 'đ' ?></td>
                </tr>
              <?php endforeach; ?>
              <tr>
                <td colspan="2">Tổng tiền</td>
                <td><?= number_format(total_price($_SESSION['cart']), 0, ',', '.') . 'đ' ?></td>
              </tr>
            </tbody>
          </table>
        <?php else : header('Location: ' . ROOT . '?page=cart'); ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>