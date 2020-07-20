<?php 
require_once "database.php";

//Hàm hiển thị toàn bộ danh mục
function list_all_time(){
    return listAll('word_time');
}

//Hàm lấy ra 1 bản ghi
function list_one_time($id){
    return listOne('word_time','id',$id);
}
//Thêm dữ liệu vào bảng
function insert_time($time){
    $data =[
        'time' => $time
    ];
    return insert('word_time',$data);
}

//function cập nhật loại hàng
function time_update($id, $time) {
    $data = ['time'=>$time];
    update('word_time', $data, 'id', $id);
}
//function Xóa dữ liệu loại hàng
function time_delete($id) {
        delete('word_time', 'id', $id);
}