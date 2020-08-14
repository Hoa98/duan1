<?php 
require_once "database.php";

//Hàm hiển thị toàn bộ danh mục
function list_all_evaluate(){
    $sql="SELECT evaluates.*, customers.name as customer_name,customers.phone as customer_phone, account, services.name as services_name
    from evaluates inner join customers on customers.id = evaluates.id_customer
    inner join members on members.id=evaluates.id_member
    inner join services on services.id=evaluates.id_service where parent_id=0 order by evaluates.id desc";
    return query_exe($sql);
}
//Hàm hien thi danh gia theo parent_id
function list_parent_evaluate($parent_id){
    $sql="SELECT evaluates.*, customers.name as customer_name,customers.phone as customer_phone, account, services.name as services_name
    from evaluates inner join customers on customers.id = evaluates.id_customer
    inner join members on members.id=evaluates.id_member
    inner join services on services.id=evaluates.id_service where parent_id=$parent_id order by evaluates.id desc";
    return query_exe($sql);
}

//Hàm lấy ra 1 bản ghi
function list_one_evaluate($id,$value){
    return listOne('evaluates',$id,$value);
}
//Thêm dữ liệu vào bảng
function insert_evaluate($content,$rating,$id_customer,$id_member,$id_service,$parent_id){
    $data =[
        'rating' => $rating,
        'id_customer' => $id_customer,
        'id_member' => $id_member,
        'id_service' => $id_service,
        'content'=>$content,
        'parent_id' => $parent_id
    ];
    return insert('evaluates',$data);
}

//Sửa
function evaluate_edit($id,$content,$rating) {
    $data = ['content'=>$content,'content'=>$content];
    update('evaluates', $data, 'id', $id);
}
//function Xóa dữ liệu bình luận
function evaluate_delete($id) {
    delete('evaluates', 'id', $id);
}
//Hiển thị tất cả evaluate theo parent_id
function evaluate_list_parent($id_service,$parent_id) {
    $sql = "SELECT evaluates.*, name,images from evaluates inner join customers on customers.id = evaluates.id_customer
    where  id_service=$id_service and parent_id=$parent_id ORDER BY id DESC";
    return query_exe($sql);
}

//Hiển thị tất cả evaluate theo parent_id
function evaluate_ser_member($id_service) {
    $sql = "SELECT evaluates.*, name,images from evaluates inner join members on members.id = evaluates.id_member
    where  id_service=$id_service ORDER BY id DESC";
    return query_exe($sql);
}
function evaluate_ser_custom($id_service) {
    $sql = "SELECT evaluates.*, name,images from evaluates inner join customers on customers.id = evaluates.id_customer
    where  id_service=$id_service ORDER BY id DESC";
    return query_exe($sql);
}
//Hiển thị comment khach sử dụng đệ quy
function evaluate_recursive($parent,$level,$id_service,&$newArray){
    $source = evaluate_ser_custom($id_service);
    if(count($source)>0){
        foreach ($source as $key => $value){
            if($value['parent_id'] == $parent){
                $value['level'] = $level;
                $newArray[] = $value;
                unset($source[$key]);
                $newParent = $value['id'];
                evaluate_recursive($newParent,$level + 1,$id_service,$newArray);
            }
        }
    }
}