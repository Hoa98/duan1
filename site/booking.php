<?php 
if(isset($_SESSION['customer'])){
    $phone=$_SESSION['customer']['phone'];
    $name=$_SESSION['customer']['name'];
}
if (isset($_POST['btnBooking'])) {
    extract($_REQUEST);
    if(empty($id_service)){
        $errors['errors_service'] = 'Vui lòng chọn dịch vụ';
    }if (array_filter($errors) == false) {
    $custom = custom_check('phone', $phone);
    if($custom>0){
        $id_customer = $custom['id'];
    }else{
       $cu = custom_insert($name, '', $phone,'', '', 'user.svg');
       $cus = custom_check('phone', $phone);
       $id_customer = $cus['id'];
    }
     insert_appointment($id_member, $id_customer, $day, $id_time);
    $booking=list_top_app($id_customer);
    foreach($id_service as $s){
        insert_app_detail($booking['id'],$s);
    }
    $_SESSION['message'] = "Thêm dữ liệu thành công";
    header('location:' . $_SERVER['REQUEST_URI']);
    die();
}
}
?>