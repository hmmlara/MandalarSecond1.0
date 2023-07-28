<?php
session_start();
include_once "controller/profileController.php";
include_once "controller/followController.php";

$from_id=$_SESSION['user_id'];
$to_id=$_GET['id'];
$getalluserlist = new ProfileController();
$getAllUser = $getalluserlist->getUserList();
$followUser=new FollowController();
$getAllFollow=$followUser->getAllFollow();
//var_dump($getAllFollow);

// foreach ($getAllFollow as $key => $getfollow) {
//     # code...
//     if($from_id==$getfollow["from_id"] && $to_id==$getfollow["to_id"])
//     {
//         $id=$getfollow['id'];
//         echo $id."//////////////";
//     }

// }
$followresult=$followUser->followingUser($from_id,$to_id);
//var_dump($followresult);

if($followresult[0]['follow_exists']=="1")
{
    $condition="true";
}else{
    $condition="false";
}


// if($followresult==false){
//     $condition="false";
//     echo "false";
// }





if($_SESSION['user_id']==$_GET['id'])
{
    header("location:profile.php");
}

if(isset($_GET['id']))
{
    $user_id=$_GET['id'];
}


foreach ($getAllUser as $key => $user) {
    if ($user['user_id'] == $_GET['id']) {
        $userid = $user['user_id'];
        $userfname = $user["fname"];
        $userlname = $user["lname"];
        $userbio = $user['bio'];
        $useremail = $user['email'];
        $userimg = $user['img'];
        $userbio = $user['bio'];
    }
}

// if(isset($_POST["follow"]))
// {
//     $from_id=$_SESSION['user_id'];
//     $to_id=$_GET['id'];
//     $follow=$followUser->following($from_id,$to_id);
// }


include_once "nav.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/search.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

</head>
<body>
		<input type="hidden" id="from_id" value="<?php echo $from_id?>">
		<input type="hidden" id="to_id" value="<?php echo $to_id?>">
		<!-- <input type="hidden" id="id" value="<?php echo $id?>"> -->
		<input type="hidden" id="followcon" value="<?php echo $condition?>">

<div class="container">
        <div class="row ">
            <div class="col-md-12 "
                style="height: 200px; border-top-left-radius:1em; border-top-right-radius:1em; background-color:#627E8B">

            </div>
        </div>
        <div class="row bg-white shadow"
            style="height:340px; border-bottom-left-radius:1em; border-bottom-right-radius:1em">
            <!-- profile -->
            <div class="col-md-12" style="">
                <div class="userprofile">
                    <img src="image/user-profile/<?php echo $userimg; ?>" alt="" class="userimg ml-3">
                </div>
                <div class="dropdown float-end mt-4 mr-3">

                    <a href="" data-bs-toggle="dropdown" aria-expanded="false"><i
                            class="fa-solid fa-ellipsis-vertical fa-xl  text-muted"></i></a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#editprofilemodel"
                                href="#">Report</a></li>
                        <!-- <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                    </ul>
                </div>
                <h3 class="username">
                    <?php echo $userfname . " " . $userlname; ?>
                </h3>
                <h5 class="address text-muted mb-4">Mandalay, Myanmar</h5>
                <h6 class="address text-muted mb-4">
                    <?php if (!empty($userbio)) {
                        echo $userbio;
                    } else {
                        echo "No Bio ....";
                    } ?>
                </h6>
                <i class="fa-brands fa-square-facebook fa-xl icon" style="color: #3b5998;"></i>
                <i class="fa-brands fa-square-twitter fa-xl icon" style="color: #1da1f2;"></i>
                <i class="fa-brands fa-square-google-plus fa-xl icon" style="color: #4285f4;"></i>
                <form action="" method="post">
                    <div class="allbtn">
                        <button class="messageuser btn btn-info">Message</button>
                                           
                        <button class="logout btn btn-primary d-none" id="follow" name="follow">Follow</button>
                      
                        <button class="btn btn-warning d-none " id="unfollow">UnFollow</button>
                    </div>
                </form>
                
            </div>

        </div>
    </div>
    <script src="js/follow.js"></script>
</body>
</html>