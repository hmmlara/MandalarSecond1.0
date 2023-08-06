<?php 
include_once __DIR__."/../model/post.php";

if(isset($_POST['flitteringData'])){
    $Post_Modal = new Post();
    $flitteringData = json_decode($_POST['flitteringData']) ;
    $FliteringResult = $Post_Modal->getPostByFlitter($flitteringData);
    $FliteringResultWithImage = [];

    foreach ($FliteringResult as $key => $value) {
        // var_dump($value['photo_folder']);
        $images = glob('../image/post_img/' . $value['photo_folder'] . '/*.{jpg,png,gif,jfifx  }', GLOB_BRACE);
        // var_dump($images);
        $value += array('product_image'=>$images[0]);
        $FliteringResultWithImage[] = $value;
    }
 
    echo json_encode($FliteringResultWithImage);
}