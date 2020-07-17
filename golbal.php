<?php 
session_start();
/*
 * Định nghĩa các url cần thiết được sử dụng trong website
 */
define('ROOT','http://localhost/Ass_DA1/');

function check_session(){
    if(isset($_SESSION['user'])){
        header('location:'.ROOT.'admin');
        die;
    }
    return;
}
function check_role(){
    if(isset($_SESSION['user'])){
        if($_SESSION['user']['role']==1){
            return;
        }
        if($_SESSION['user']['role']==0){
            header('location:'.ROOT);die;
        }
    }
    //TH người dùng chưa đăng nhập
    header('location:'.ROOT.'admin/login.php');
}

/**
 * Kiểm tra sự tồn tại của một tham số trong request
 * @param string $fieldname là tên tham số cần kiểm tra
 * @return boolean true tồn tại
 */
function exist_param($fieldname){
    return array_key_exists($fieldname, $_REQUEST);
}
/**
 * Lưu file upload vào thư mục
 * @param string $fieldname là tên trường file
 * @param string $target_dir thư mục lưu file
 * @return tên file upload
 */
function save_file($fieldname, $target_dir){
    $file_uploaded = $_FILES[$fieldname];
    $file_name = basename($file_uploaded["name"]);
    $target_path = $target_dir . $file_name;
    move_uploaded_file($file_uploaded["tmp_name"], $target_path);
    return $file_name;
}
/**
 * Tạo cookie
 * @param string $name là tên cookie
 * @param string $value là giá trị cookie
 * @param int $day là số ngày tồn tại cookie
 */
function add_cookie($name, $value, $day){
    setcookie($name, $value, time() + (86400 * $day), "/");
}
/**
 * Xóa cookie
 * @param string $name là tên cookie
 */
function delete_cookie($name){
    add_cookie($name, "", -1);
}
/**
 * Đọc giá trị cookie
 * @param string $name là tên cookie
 * @return string giá trị của cookie
 */
function get_cookie($name){
    return $_COOKIE[$name]??'';
}
