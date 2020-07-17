<?php 
require_once "database.php";

//Hàm hiển thị toàn bộ danh mục
function list_all_comment(){
    $sql = "SELECT comments.id,content,	id_product,account,id_user,users.images,fullname,approve,parent_id,date,products.name as product_name from comments inner join users on comments.id_user = users.id
    inner join products on comments.id_product = products.id
     ORDER BY comments.id DESC";
    return query_exe($sql);
}
//$id_cate là dữ liệu được lọc
function comment_list($approve) {
    $sql = "SELECT comments.id,content,	id_product,account,id_user,users.images,fullname,approve,parent_id,date,products.name as product_name from comments inner join users on comments.id_user = users.id 
   inner join products on comments.id_product = products.id
    WHERE approve=$approve ORDER BY comments.id DESC";
    return query_exe($sql);
}
//Hàm lấy ra 1 bản ghi
function list_one_comment($id,$value){
    return listOne('comments',$id,$value);
}
//Thêm dữ liệu vào bảng
function insert_comment($content,$id_product,$id_user,$approve,$parent_id){
    $data =[
        'content' => $content,
        'id_product' => $id_product,
        'id_user' => $id_user,
        'approve' => $approve,
        'parent_id' => $parent_id
    ];
    return insert('comments',$data);
}

//function cập nhật bình luận
function comment_approve($id,$approve) {
    $data = ['approve'=>$approve];
    update('comments', $data, 'id', $id);
}
//function Xóa dữ liệu bình luận
function comment_delete($id) {
    delete('comments', 'id', $id);
}
//Hiển thị tất cả comment đã được duyệt
function comment_list_all($id_product) {
    $sql = "SELECT comments.id,content,	id_product,id_user,images,fullname,approve,parent_id,date from comments inner join users on comments.id_user = users.id WHERE approve=1 and id_product=$id_product ORDER BY comments.id DESC";
    return query_exe($sql);
}

//Hàm hiển thị chi tiết bình luận theo mã hàng hóa
function comment_select_by_pro($id_product){
    $sql = "SELECT c.*,account, p.name FROM comments c inner JOIN products p ON p.id=c.id_product
    inner join users on c.id_user= users.id
     WHERE c.id_product=$id_product ORDER BY date DESC";
    return query_exe($sql);
}

//Thống kê bình luận theo hàng hóa
function statistical_comment(){
    $sql = "SELECT p.id, p.name, COUNT(*) so_luong, MIN(c.date) cu_nhat, MAX(c.date) moi_nhat
    FROM comments c 
    JOIN products p ON p.id=c.id_product 
    GROUP BY p.id, p.name
    HAVING so_luong > 0";
    return query_exe($sql);
}

//Hiển thị comment sử dụng đệ quy
function comment_recursive($parent,$level,$id_product,&$newArray){
    $source = comment_list_all($id_product);
    if(count($source)>0){
        foreach ($source as $key => $value){
            if($value['parent_id'] == $parent){
                $value['level'] = $level;
                $newArray[] = $value;
                unset($source[$key]);
                $newParent = $value['id'];
                comment_recursive($newParent,$level + 1,$id_product,$newArray);
            }
        }
    }
}

