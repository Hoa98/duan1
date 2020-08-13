<?php
/*
    Các hàm làm việc với bảng khách hàng
*/
require_once "database.php";
// lấy ra 1 bản ghi theo id
function custom_list_one($id){
    return listOne('customers','id', $id);
}

//Kiểm tra user đã tồn tại chưa
function custom_check($id,$values){
    return listOne('customers',$id, $values);
}
//Lay ra tat ca khách hàng
function custom_list_all(){
    $sql = "SELECT * from customers ORDER BY id DESC";
    return query_exe($sql);
}

//Thêm
function custom_insert($name, $password, $phone,$address, $email, $images) {
    $data = [
        'name'=>$name,
        'password'=>password_hash($password,PASSWORD_DEFAULT),
        'phone'=>$phone,
        'address'=>$address,
        'email'=>$email,
        'images'=>$images
    ];
    insert('customers', $data);
}

function guest_insert($name, $phone,$address, $images) {
    $data = [
        'name'=>$name,
        'phone'=>$phone,
        'address'=>$address,
        'images'=>$images
    ];
    insert('customers', $data);
}

function custom_change($id, $password,$name,$address, $images,$email) {
    $data = [
        'password'=>password_hash($password,PASSWORD_DEFAULT),
        'name'=>$name,
        'address'=>$address,
        'images'=>$images,
        'email'=>$email
    ];
    update('customers', $data, 'id', $id);
}
//Đổi mật khẩu
function custom_change_password($id, $password) {
    $data = [
        'password'=>password_hash($password,PASSWORD_DEFAULT)
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
function custom_update($id, $name,$address,$images) {
    $data = [
        'name'=>$name,
        'address'=>$address,
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
function update_code_custom($id,$code,$time_code){
    $data = [
        'code'=>$code,
        'time_code'=>$time_code
    ];
    update('customers', $data, 'id', $id);
}

//Kiểm tra customname khi login
function check_custom($name){
    $sql = "SELECT * from customers WHERE phone='$name' or email='$name'";
    $custom = query_exe($sql);
    if(count($custom)>0){
        return $custom[0];
    }
    return false;
}