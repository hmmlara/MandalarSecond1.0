<?php
session_start();
include_once "../controller/postController.php";
$post_controller=new postController();
$id=6;
$item_name=$_POST['item_name'];
$brand=$_POST['brand'];
$options=$_POST['options'];
$post_category=$_POST['post_category'];
$post_subcategory=$_POST['post_subcategory'];
$price=$_POST['price'];
$text_area=$_POST['text_area'];
$status='none';
$uploadsDir = '../image/post_img/';

//   if (!file_exists($uploadsDir)) {
//     mkdir($uploadsDir, 0777, true);
//   }
// $time=time();
//   $imageFolder = uniqid($id.'image_'.$time, true);
//   $targetDir = $uploadsDir . $imageFolder . '/';

//   if (!file_exists($targetDir)) {
//     mkdir($targetDir, 0777, true);
//   }

//   $targetFile = $targetDir . basename($_FILES['post_img']['name']);

//   if (move_uploaded_file($_FILES['post_img']['tmp_name'], $targetFile)) {
//   } else {
//   }
if (!file_exists($uploadsDir)) {
  mkdir($uploadsDir, 0777, true);
}

$time = time();
$imageFolder = uniqid($id . 'image_' . $time, true);
$targetDir = $uploadsDir . $imageFolder . '/';

if (!file_exists($targetDir)) {
  mkdir($targetDir, 0777, true);
}

// Handle multiple image uploads
$uploadedFiles = count($_FILES['post_img']['name']);


for ($i = 0; $i < $uploadedFiles; $i++) {
  $name = $_FILES['post_img']['name'][$i];
  $tmp_name = $_FILES['post_img']['tmp_name'][$i];
  $targetFile = $targetDir . basename($name);

  if (move_uploaded_file($tmp_name, $targetFile)) {
    // The image has been successfully uploaded to the target directory.
  } else {
    // Error handling if the upload fails.
  }
}


$post_controller->add_post($id,$item_name,$brand,$options,$post_subcategory,$price,$text_area,$imageFolder,$status);

echo "success";

?>