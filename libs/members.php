<?php
/*
    Các hàm làm việc với bảng thành viên
*/
require_once "database.php";

//Hàm lấy ra 1 bản ghi
function list_one_member($id){
    return listOne('members','id',$id);
}
//Lay ra tat ca member tru tai khoan dang nhap
function member_list_all($id){
    $sql = "SELECT * from members Where id != $id ORDER BY id DESC";
    return query_exe($sql);
}

function member_list(){
    $sql = "SELECT * from members ORDER BY id DESC";
    return query_exe($sql);
}
//Hàm lấy ra danh sách members theo role
function member_list_role($role){
    $sql = "SELECT * from members Where role = $role";
    return query_exe($sql);
}

function member_check($id,$value){
    return listOne('members',$id,$value);
}


//Phân trang nếu có nhiều tài khoản
function member_list_limit($limit, $nRows) {
    $sql = "SELECT * from members order by id desc limit $limit, $nRows";
    return query_exe($sql);
}

//Thêm
function member_insert($account, $password, $fullname,$address,$phone, $email, $images, $role) {
    $data = [
        'account'=>$account,
        'password'=>password_hash($password,PASSWORD_DEFAULT),
        'fullname'=>$fullname,
        'address'=>$address,
        'phone'=>$phone,
        'email'=>$email,
        'images'=>$images,
        'role'=>$role
    ];
    insert('members', $data);
}

//Cập nhật
function member_update($id, $role) {
    $data = [
        'role'=>$role
    ];
    update('members', $data, 'id', $id);
}

//Đổi mật khẩu
function member_change_password($id, $password) {
    $data = [
        'password'=>password_hash($password,PASSWORD_DEFAULT),
    ];
    update('members', $data, 'id', $id);
}
//Đổi email
function member_change_email($id, $email) {
    $data = [
        'email'=>$email,
    ];
    update('members', $data, 'id', $id);
}
//Đổi số điện thoại
function member_change_phone($id, $phone) {
    $data = [
        'phone'=>$phone,
    ];
    update('members', $data, 'id', $id);
}
//Đổi địa chỉ
function member_update_limit($id, $fullname,$address,$images) {
    $data = [
        'fullname'=>$fullname,
        'address'=>$address,
        'images'=>$images
    ];
    update('members', $data, 'id', $id);
}
//Xóa 
function member_delete($id) {
    return delete('members', 'id', $id);
}
//Tìm kiếm theo account khác tai khoan dang nhap
function search_member($name,$id,$value){
    $sql = "SELECT *  FROM members Where account Like '%$name%' and $id != $value ORDER BY id DESC";
    return query_exe($sql);
}

//Update time_code
function update_code_member($id,$code,$time_code){
    $data = [
        'code'=>$code,
        'time_code'=>$time_code
    ];
    update('members', $data, 'id', $id);
}

//Kiểm tra membername khi login
function check_member($account){
    $sql = "SELECT * from members WHERE account='$account' or phone='$account' or email='$account'";
    $member = query($sql);
    if(count($member)>0){
        return $member[0];
    }
    return false;
}