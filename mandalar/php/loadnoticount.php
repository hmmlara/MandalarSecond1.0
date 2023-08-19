<?php 
include_once __DIR__."/../model/noti.php";
echo "2020";
echo $_POST['user_id'];
 echo $_GET['user_id'];
if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
       $result = $NOtiModal->LoadNoTiCount($user_id);
    echo "error".$result['notiCount'];
}

?>