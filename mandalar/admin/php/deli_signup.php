<?php
include_once "../../controller/deliveryController.php";
$delivery_controller=new DeliveryController();
$name=$_POST['name'];
$phone=$_POST['phone'];
$password=$_POST['password'];
$nrc=$_POST['nrc'];
$deli_profile_img_name = $_FILES['deli_profile_img']['name'];
$deli_profile_img_type = $_FILES['deli_profile_img']['type'];
$deli_profile_img_tmp_name = $_FILES['deli_profile_img']['tmp_name'];
$time=time();
$new_deli_profile_img_name=$time.$deli_profile_img_name;
move_uploaded_file($deli_profile_img_tmp_name,"../../image/deli_profile/".$new_deli_profile_img_name);

$front_nrc_image_name = $_FILES['front_nrc_image']['name'];
$front_nrc_image_type = $_FILES['front_nrc_image']['type'];
$front_nrc_image_tmp_name = $_FILES['front_nrc_image']['tmp_name'];
$time=time();
$new_front_nrc_image_name=$time.$front_nrc_image_name;
move_uploaded_file($front_nrc_image_tmp_name,"../../image/deli_front_nrc_img/".$new_front_nrc_image_name);

$back_nrc_image_name = $_FILES['back_nrc_image']['name'];
$back_nrc_image_type = $_FILES['back_nrc_image']['type'];
$back_nrc_image_tmp_name = $_FILES['back_nrc_image']['tmp_name'];
$time=time();
$new_back_nrc_image_name=$time.$back_nrc_image_name;
move_uploaded_file($back_nrc_image_tmp_name,"../../image/deli_back_nrc_img/".$new_back_nrc_image_name);
$city=$_POST['city'];

$delivery_controller->registerDelivery($name,$phone,$password,$nrc,$new_deli_profile_img_name,$new_front_nrc_image_name,$new_back_nrc_image_name,$city);

echo "success";
?>