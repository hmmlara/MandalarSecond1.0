<?php
include_once "../../controller/postController.php";
$post_controller=new PostController();
$post_list=$post_controller->send_post();
// Convert the array to JSON format
$jsonData = json_encode($post_list);

// Set the response content type to JSON
header('Content-Type: application/json');

// Output the JSON data
echo $jsonData;
?>