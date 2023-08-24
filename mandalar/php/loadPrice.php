<?php
include_once __DIR__."/../model/post.php";
$Post_model = new Post();
if(isset($_POST['id'])){
    $id = $_POST['id'];
   $result = $Post_model->load_min_max_price($id);
    echo json_encode($result);
}