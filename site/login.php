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
    if(empty($customer['password'])){
      if(check_member($phone)){
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
    }else{
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
    }
  } else {
    $error['phone'] = "Tên đăng nhập không đúng";
  }
}

if (isset($_POST['btnRegister'])) {
  extract($_REQUEST);
  $okUpload = false;
  $cus=custom_check('phone', $phone);
  if (checkType($_FILES['images']['name'], array('jpg', 'png', 'gif', 'tiff')) && checkSize($_FILES['images']['size'], 0, 5 * 1024 * 1024)) {
      $okUpload = true;
      $images = uniqid() . $_FILES['images']['name'];
  }else {
      $images = 'user.svg';
  }
  if (checkType($_FILES['images']['name'], array('jpg', 'png', 'gif', 'tiff')) == false && $_FILES['images']['size'] > 0) {
      $errors['errors_img'] = 'File không đúng định dạng';
  }
  if (empty($name)) {
      $errors['errors_name'] = 'Vui lòng nhập họ tên';
  }
  if (empty($phone)) {
      $errors['errors_phone'] = 'Vui lòng nhập số điện thoại';
  }
  if ($cus=custom_check('phone', $phone) > 0 && !empty($cus['password'])) {
      $errors['errors_phone'] = 'Số điện thoại đã tồn tại';
  }
  if (empty($email)) {
      $errors['errors_email'] = 'Vui lòng nhập một địa chỉ email hợp lệ';
  }
  if (custom_check('email', $email) > 0) {
      $errors['errors_email'] = 'Địa chỉ email đã tồn tại';
  }
  if (empty($password)) {
      $errors['errors_password'] = 'Vui lòng nhập mật khẩu';
  }
  if (empty($address)) {
      $errors['errors_address'] = 'Địa chỉ không được để trống';
  }
  if (array_filter($errors) == false) {
    $cus=custom_check('phone', $phone);
    if(empty($cus['password'])){
      custom_change($cus['id'], $password,$name,$address, $images,$email);
    }else{
      custom_insert($name, $password, $phone, $address, $email, $images);
    }
    if ($okUpload) {
      move_uploaded_file($_FILES['images']['tmp_name'], 'images/users/' . $images);
  }
      $_SESSION['message'] = "Đăng ký thành công";
      header('location:' . $_SERVER['REQUEST_URI']);
      die();
  }
}
