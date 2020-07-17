<?php
require_once "database.php";

//hàm lấy ra dữ liệu danh sách hàng hóa
function gallery_list_all() {
    $sql = "SELECT product_gallery.*, name from product_gallery inner join products on products.id = product_gallery.product_id ORDER BY id DESC";
    return query_exe($sql);
}

//Lấy ra 1 bản ghi hàng hóa the điều kiện id
function gallery_list_one($id) {
    return listOne('product_gallery', 'id', $id);
}

//Lấy ra tất cả  bản ghi anh sản phẩm the điều kiện product_id
function gallery_list($product_id){
    $sql = "SELECT * from product_gallery Where product_id=$product_id ORDER BY id DESC";
    return query_exe($sql);
}
//Chỉnh sửa dữ liệu hàng hóa
function gallery_update($id, $product_id, $images,$image_text) {
    $data = [        
        "product_id"=>$product_id,
        "images"=>$images,
        "image_text"=>$image_text,
    ];
    //var_dump($data);die;
    return update('product_gallery', $data,'id', $id);
}

//function thêm hàng hóa vào bảng hàng hóa
function gallery_insert($product_id, $images,$image_text) {
    $data = [        
        "product_id"=>$product_id,
        "images"=>$images,
        "image_text"=>$image_text,
    ];
    return insert('product_gallery', $data);
}

//Xóa hàng hóa
function gallery_delete($id) {
    $row = gallery_list_one($id);
    
    if ( $row ) {
        //Xóa cả hình khi xóa dữ liệu
        $images = "../images/products/" . $row['images'];
        
        if ( file_exists($images)) {
            unlink($images);
        } 
        delete('product_gallery', 'id', $id);
    }
}
