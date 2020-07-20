<?php
/*
    Các hàm làm việc với bảng khách hàng
*/
require_once "database.php";
//Kiểm tra user đã tồn tại chưa, lấy ra 1 bản ghi theo id
function custom_check($id){
    return listOne('customers','id', $id);
}
//Lay ra tat ca khách hàng
function custom_list(){
    $sql = "SELECT * from customers ORDER BY id DESC";
    return query_exe($sql);
}

//Thêm
function custom_insert($name, $password, $phone,$adress, $email, $images) {
    $data = [
        'name'=>$name,
        'password'=>password_hash($password,PASSWORD_DEFAULT),
        'phone'=>$phone,
        'adress'=>$adress,
        'email'=>$email,
        'images'=>$images
    ];
    insert('customers', $data);
}

//Đổi mật khẩu
function custom_change_password($id, $password) {
    $data = [
        'password'=>password_hash($password,PASSWORD_DEFAULT),
    ];
    update('customers', $data, 'id', $id);
}
//Đổi email
function custom_change_email($id, $email) {
    $data = [
        'email'=>$email,
    ];
    update('customers', $data, 'id', $id);
}
//Đổi số điện thoại
function custom_change_phone($id, $phone) {
    $data = [
        'phone'=>$phone,
    ];
    update('customers', $data, 'id', $id);
}
//Đổi địa chỉ
function custom_update($id, $name,$adress,$images) {
    $data = [
        'name'=>$name,
        'adress'=>$adress,
        'images'=>$images
    ];
    update('customers', $data, 'id', $id);
}
//Xóa 
function custom_delete($id) {
    return delete('customers', 'id', $id);
}
//Tìm kiếm theo ten
function search_custom($name){
    $sql = "SELECT *  FROM customers Where name Like '%$name%' ORDER BY id DESC";
    return query_exe($sql);
}

//Update time_code
function update_code($id,$code,$time_code){
    $data = [
        'code'=>$code,
        'time_code'=>$time_code
    ];
    update('customers', $data, 'id', $id);
}

//Kiểm tra customname khi login
function check_custom($name){
    $sql = "SELECT * from customers WHERE phone='$name' or email='$name'";
    $custom = query($sql);
    if(count($custom)>0){
        return $custom[0];
    }
    return false;
}