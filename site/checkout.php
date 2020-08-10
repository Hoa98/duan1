<?php
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
?>