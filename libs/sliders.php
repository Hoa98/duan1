<?php 
require_once "database.php";
//Hàm hiển thị toàn bộ danh mục
function list_all_slider(){
    return listAll('sliders');
}
//Ham hien thi danh muc theo gioi han
function slider_list_limit($limit, $nRows) {
    $sql = "SELECT * from sliders order by id desc limit $limit, $nRows";
    return query($sql);
}

//Hàm lấy ra 1 bản ghi
function list_one_slider($id){
    return listOne('sliders','id',$id);
}
//Thêm dữ liệu vào bảng
function insert_slider($name,$images,$link){
    $data =[
        'name' => $name,
        'images' => $images,
        'link' => $link
    ];
    return insert('sliders',$data);
}

//function cập nhật
function slider_update($id, $name, $images,$link) {
    $data = ['name'=>$name,'images'=>$images,'link'=>$link];
    update('sliders', $data, 'id', $id);
}
//function Xóa dữ liệu slide
function slider_delete($id) {
    $row = list_one_slider($id);
    
    if ( $row ) {
        //Xóa cả hình khi xóa dữ liệu
        $images = "../images/slider/" . $row['images'];
        
        if ( file_exists($images)) {
            unlink($images);
        } 
        delete('sliders', 'id', $id);
    }
}