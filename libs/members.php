<?php
/*
    Các hàm làm việc với bảng thành viên
*/
require_once "database.php";
//Kiểm tra user đã tồn tại chưa
function user_check($id, $value){
    return listOne('users', $id, $value);
}
//Lay ra tat ca user tru tai khoan dang nhap
function user_list($id){
    $sql = "SELECT * from users Where id != $id ORDER BY id DESC";
    return query_exe($sql);
}
//Hàm lấy ra danh sách users theo role
function user_list_role($role){
    $sql = "SELECT * from users Where role = $role";
    return query_exe($sql);
}

//$activated là dữ liệu được lọc
function user_list_locked($activated,$id) {
    $sql = "SELECT * from users Where activated=$activated and id != $id ORDER BY id DESC";
    return query_exe($sql);
}
//Hàm lấy ra 1 bản ghi
function list_one_user($id,$value){
    return listOne('users',$id,$value);
}

//Phân trang nếu có nhiều tài khoản
function user_list_limit($limit, $nRows) {
    $sql = "SELECT * from users order by id desc limit $limit, $nRows";
    return query_exe($sql);
}

//Thêm
function user_insert($account, $password, $fullname,$adress,$phone,$gender, $email, $images, $activated, $role) {
    $data = [
        'account'=>$account,
        'password'=>password_hash($password,PASSWORD_DEFAULT),
        'fullname'=>$fullname,
        'adress'=>$adress,
        'phone'=>$phone,
        'gender'=>$gender,
        'email'=>$email,
        'images'=>$images,
        'activated'=>$activated,
        'role'=>$role
    ];
    insert('users', $data);
}

//Cập nhật
function user_update($id, $activated, $role, $update_at) {
    $update_at = date("Y-m-d");
    $data = [
        'activated'=>$activated,
        'role'=>$role,
        'update_at'=>$update_at
    ];
    update('users', $data, 'id', $id);
}

//Đổi mật khẩu
function user_change_password($id, $password) {
    $data = [
        'password'=>password_hash($password,PASSWORD_DEFAULT),
    ];
    update('users', $data, 'id', $id);
}
//Đổi email
function user_change_email($id, $email) {
    $data = [
        'email'=>$email,
    ];
    update('users', $data, 'id', $id);
}
//Đổi số điện thoại
function user_change_phone($id, $phone) {
    $data = [
        'phone'=>$phone,
    ];
    update('users', $data, 'id', $id);
}
//Đổi địa chỉ
function user_update_limit($id, $fullname,$adress,$gender,$images) {
    $data = [
        'fullname'=>$fullname,
        'adress'=>$adress,
        'gender'=>$gender,
        'images'=>$images
    ];
    update('users', $data, 'id', $id);
}
//Xóa 
function user_delete($id) {
    return delete('users', 'id', $id);
}
//Tìm kiếm theo account
function search_user($name,$id,$value){
    $sql = "SELECT *  FROM users Where account Like '%$name%' and $id != $value ORDER BY id DESC";
    return query_exe($sql);
}

//Update time_code
function update_code($id,$code,$time_code){
    $data = [
        'code'=>$code,
        'time_code'=>$time_code
    ];
    update('users', $data, 'id', $id);
}

//Kiểm tra username khi login
function check_user($account){
    $sql = "SELECT * from users WHERE account='$account' or phone='$account' or email='$account'";
    $user = query($sql);
    if(count($user)>0){
        return $user[0];
    }
    return false;
}