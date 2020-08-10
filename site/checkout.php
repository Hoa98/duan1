<?php
//nguoi dung chua dăng nhap
if (isset($_REQUEST['btnDelete'])) {
    extract($_REQUEST);
    unset($_SESSION['cart'][$id]);
    header('Location: ' . ROOT . '?page=cart');
    die();
  }

  if (isset($_REQUEST['btnXoaCart'])) {
    extract($_REQUEST);
    unset($_SESSION['cart']);
    header('Location: ' . ROOT . '?page=cart');
    die();
  }
  
  //nguoi dung da dang nhap
  if (isset($_REQUEST['btnXoa'])) {
    extract($_REQUEST);
    unset($_SESSION['cartCustom'][$_SESSION['customer']['id']][$id]);
    header('Location: ' . ROOT . '?page=cart');
    die();
  }
  if (isset($_REQUEST['btnXoaCartCustom'])) {
    extract($_REQUEST);
    unset($_SESSION['cartCustom'][$_SESSION['customer']['id']]);
    header('Location: ' . ROOT . '?page=cart');
    die();
  }
?>