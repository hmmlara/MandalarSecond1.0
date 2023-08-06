<?php
include_once "../../controller/postController.php";
$post_controller=new PostController();
$status=$_GET['status'];
$post_id=$_GET['post_id'];
$post_controller->deli_status_update($status,$post_id);
echo 'success';
?>