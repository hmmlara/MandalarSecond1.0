<?php 
include_once __DIR__."/../model/post.php";
if(isset($_POST['flitteringData'])){
    $Post_Modal = new Post();
    $flitteringData = json_decode($_POST['flitteringData']) ;

    $FliteringResult = $Post_Modal->getPostByFlitter($flitteringData);
    $FliteringResultWithImage = [];

    foreach ($FliteringResult as $key => $value) {
        // var_dump($value['photo_folder']);
        $images = glob('../image/post_img/' . $value['photo_folder'] . '/*.{jpg,jpeg,png,gif,jfif}', GLOB_BRACE);

        $react = $Post_Modal->getPostReaction($value['id']);
        if (isset($react)){
            $value += array('Post_Reaction'=>$react["count_react"]);

        }
        if(isset($images[0])){
            $value += array('product_image'=>$images[0]);

        }
        $count_favorite = $Post_Modal->getPostFavorite($value['id']);
        if(isset($count_favorite)){
            $value += array("product_fav" => $count_favorite['count_favorite']);
        };

        $viewCount = $Post_Modal->selectViewCount($value['id']);
        if(isset($viewCount)){
            $value += array("view_count" => $viewCount["view_count"]);
        };

        $FliteringResultWithImage[] = $value;


    }
 
    echo json_encode($FliteringResultWithImage);
}

