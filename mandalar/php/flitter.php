<?php 
include_once __DIR__."/../model/post.php";

if(isset($_POST['flitteringData'])){
    $Post_Modal = new Post();
    $flitteringData = json_decode($_POST['flitteringData']) ;
    $FliteringResult = json_encode($Post_Modal->getPostByFlitter($flitteringData));
    echo $FliteringResult;
}