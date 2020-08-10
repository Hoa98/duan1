<?php 
//Nếu đã đăng nhập rồi thì check_session
if (isset($_COOKIE['customer'])) {
    $phone = $_COOKIE['customer'];
    $password = $_COOKIE['pass'];
  }

extract($_REQUEST);
if (isset($btnLogin)) {
  if (check_custom($phone)) {
    $customer = check_custom($phone);
    if (password_verify($password, $customer['password'])) {
      $_SESSION['customer'] = $customer;
      header('location:' . $_SERVER['REQUEST_URI']);
      if (isset($remember)) {
        //Nếu người dùng nhớ mật khẩu thì lưu lại trong 30 ngày trong cookie
        setcookie('customer', $phone, time() + 3600 * 30, "/");
        setcookie('pass', $password, time() + 3600 * 30, "/");
      } else {
        //Ngược lại thì xóa cookie cũ đi
        setcookie('customer', $phone, time() - 3600 * 30, "/");
        setcookie('pass', $password, time() - 3600 * 30, "/");
      }
    } else {
      $error['password'] = "Mật khẩu không đúng";
    }
  }elseif(check_member($phone)){
    $member = check_member($phone);
    if (password_verify($password, $member['password'])) {
      $_SESSION['member'] = $member;
      $_SESSION['customer'] = $member;
      header('location:' . $_SERVER['REQUEST_URI']);
      if (isset($remember)) {
        //Nếu người dùng nhớ mật khẩu thì lưu lại trong 30 ngày trong cookie
        setcookie('customer', $customer, time() + 3600 * 30, "/");
        setcookie('pass', $pass, time() + 3600 * 30, "/");
      } else {
        //Ngược lại thì xóa cookie cũ đi
        setcookie('member', $customer, time() - 3600 * 30, "/");
        setcookie('pass', $pass, time() - 3600 * 30, "/");
      }
    } else {
      $error['password'] = "Mật khẩu không đúng";
    }
  } else {
    $error['phone'] = "Tên đăng nhập không đúng";
  }
}

?>