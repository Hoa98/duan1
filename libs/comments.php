<?php 
require_once "database.php";

//Hàm hiển thị toàn bộ bình luan cua khach
function list_all_comment_custom(){
    $sql = "SELECT comments.*,products.name as product_name,customers.name,phone from comments 
    inner join customers on comments.id_customer = customers.id
    inner join products on comments.id_product = products.id
     ORDER BY comments.id DESC";
    return query_exe($sql);
}

//Hàm hiển thị toàn bộ bình luan cua thanh vien
function list_all_comment_member(){
    $sql = "SELECT comments.*,products.name as product_name, phone, members.name from comments 
    inner join products on comments.id_product = products.id
    inner join members on comments.id_member = members.id
     ORDER BY comments.id DESC";
    return query_exe($sql);
}

//Hàm hiển thị toàn bộ bình luan cua thanh vien
function list_parent_comment_member($parent_id){
    $sql = "SELECT comments.*,products.name as product_name, phone, members.name from comments 
    inner join products on comments.id_product = products.id
    inner join members on comments.id_member = members.id where parent_id =$parent_id
     ORDER BY comments.id DESC";
    return query_exe($sql);
}
//Hàm hiển thị toàn bộ bình luan cua khach
function list_parent_comment_custom($parent_id){
    $sql = "SELECT comments.*,products.name as product_name,customers.name,phone from comments 
    inner join customers on comments.id_customer = customers.id
    inner join products on comments.id_product = products.id where parent_id =$parent_id
     ORDER BY comments.id DESC";
    return query_exe($sql);
}
//Hàm lấy ra 1 bản ghi
function list_one_comment($id,$value){
    return listOne('comments',$id,$value);
}
//Thêm dữ liệu vào bảng
function insert_comment($content,$id_product,$id_customer,$id_member,$rating,$approve,$parent_id){
    $data =[
        'content' => $content,
        'id_product' => $id_product,
        'id_customer' => $id_customer,
        'id_member' => $id_member,
        'rating'=> $rating,
        'approve' => $approve,
        'parent_id' => $parent_id
    ];
    return insert('comments',$data);
}

//function phê duyệt bình luận
function comment_approve($id,$approve) {
    $data = ['approve'=>$approve];
    update('comments', $data, 'id', $id);
}
//function Xóa dữ liệu bình luận
function comment_delete($id) {
    delete('comments', 'id', $id);
}
//Hiển thị tất cả comment thành viên đã được duyệt
function comment_member_list_approve($id_product) {
    $sql = "SELECT comments.*,members.images as c_images, name from comments 
    inner join members on members.id = comments.id_member
    WHERE approve=1 and id_product=$id_product ORDER BY comments.id DESC";
    return query_exe($sql);
}
//Khách
function comment_custom_list_approve($id_product) {
    $sql = "SELECT comments.*,customers.images as c_images, name from comments 
    inner join customers on comments.id_customer = customers.id
    WHERE approve=1 and id_product=$id_product ORDER BY comments.id DESC";
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

//Hiển thị comment khach sử dụng đệ quy
function comment_recursive($parent,$level,$id_product,&$newArray){
    $source1 = comment_custom_list_approve($id_product);
    $source2 = comment_member_list_approve($id_product);
    $source= array_merge($source1,$source2);
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

