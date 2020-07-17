<?php 
//Hàm hiển thị toàn bộ danh mục
function list_all_detail($order){
    $sql = "SELECT order_detail.*, name,images from order_detail inner join products on products.id= order_detail.id_product
    where id_order = $order
     ORDER BY id DESC";
    return query_exe($sql);
}

//Hàm lấy ra 1 bản ghi
function list_one_detail($id,$value){
    return listOne('order_detail',$id,$value);
}
//Thêm dữ liệu vào bảng
function insert_detail($id_order,$id_product,$price,$sale,$quantity,$total){
    $data =[
        'id_order' => $id_order,
        'id_product' => $id_product,
        'price' => $price,
        'sale'=> $sale,
        'quantity'=>$quantity,
        'total'=>$total
    ];
    return insert('order_detail',$data);
}

//function Xóa dữ liệu
function detail_delete($id) {
    delete('order_detail', 'id', $id);
}

//Hàm hiển thị toàn bộ hóa đơn theo id_user
function list_all_purchase($id_user,$id_order){
    $sql = "SELECT order_detail.*, name,images,products.id as id_pro, hoadon.total as hoadon_total from order_detail 
    inner join products on products.id= order_detail.id_product
    inner join hoadon on hoadon.id = order_detail.id_order
    where hoadon.id_user = $id_user and id_order=$id_order
     ORDER BY id DESC";
    return query_exe($sql);
}

//Hàm hiển thị toàn bộ hóa đơn theo id_user và trạng thai
function list_order_status($id_user,$id_order,$status){
    $sql = "SELECT order_detail.*, name,images,products.id as id_pro, hoadon.total as hoadon_total from order_detail 
    inner join products on products.id= order_detail.id_product
    inner join hoadon on hoadon.id = order_detail.id_order
    where hoadon.id_user = $id_user and id_order=$id_order and hoadon.status like '%$status%'
     ORDER BY id DESC";
    return query_exe($sql);
}

function list_status($id_user,$status){
    $sql = "SELECT order_detail.*, hoadon.total as hoadon_total from order_detail 
    inner join hoadon on hoadon.id = order_detail.id_order
    where hoadon.id_user = $id_user and  hoadon.status like '%$status%'
     ORDER BY id DESC";
    return query_exe($sql);
}
