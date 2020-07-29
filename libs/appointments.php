<?php 
require_once "database.php";

//Hàm hiển thị toàn bộ danh mục
function list_all_appointment(){
    $sql = "SELECT appointments.*, account, customers.name,customers.phone ,time
    from appointments inner join customers on customers.id = appointments.id_customer
    inner join members on members.id = appointments.id_member
    inner join word_time on word_time.id = appointments.id_time ORDER BY id DESC";
    return query_exe($sql);
}

//Ham hien thi lich hen theo cancel
function appointment_list_cancel($cancel) {
    $sql = "SELECT appointments.*, account, customers.name,customers.phone ,time
    from appointments inner join customers on customers.id = appointments.id_customer
    inner join members on members.id = appointments.id_member
    inner join word_time on word_time.id = appointments.id_time where cancel = $cancel ORDER BY id DESC";
    return query_exe($sql);
}

//Hàm lấy ra 1 bản ghi
function list_one_appointment($id){
    return listOne('appointments','id',$id);
}
//Thêm dữ liệu vào bảng
function insert_appointment($id_member,$id_customer,$day,$id_time){
    $data =[
        'id_member' => $id_member,
        'id_customer'=>$id_customer,
        'day'=>$day,
        'id_time'=>$id_time,
        'cancel'=>'0'
    ];
    return insert('appointments',$data);
}

//function cập nhật loại hàng
function appointment_update($id, $id_member,$id_customer,$day,$id_time,$cancel) {
    $data = [
    'id_member' => $id_member,
    'id_customer'=>$id_customer,
    'day'=>$day,
    'id_time'=>$id_time,
    'cancel'=>$cancel
];
    update('appointments', $data, 'id', $id);
}
//function Xóa dữ liệu loại hàng
function appointment_delete($id) {
   return delete('appointments', 'id', $id);
}
