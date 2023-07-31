<?php
session_start();

include_once "controller/profileController.php";
include_once "controller/userController.php";
include_once "controller/nrcController.php";

$getalluserlist = new ProfileController();
$getAllUser = $getalluserlist->getUserList();

$enterNrcimg=new NrcController();

$updateUserDetails = new UserController();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}

foreach ($getAllUser as $key => $user) {
    if ($user['user_id'] == $_SESSION["user_id"]) {
        $userid = $user['user_id'];
        $userfname = $user["fname"];
        $userlname = $user["lname"];
        $userbio = $user['bio'];
        $useremail = $user['email'];
        $userimg = $user['img'];
        $userbio = $user['bio'];
        echo $user_id;
    }
}
$getNrcUser=$enterNrcimg->getAll();
//var_dump($getNrcUser);

foreach ($getNrcUser as $key => $wait) {
    // var_dump($wait);
    # code...
    if($wait['to_id']==$userid)
    {
       
       $wait=$wait["status"];
        echo $wait;
    }
    
}
// if(empty($wait))
// {
//     // echo "/////////////////";
// }

$getPersonalInfo = $updateUserDetails->UserInfo($_SESSION['user_id']);
// var_dump($getPersonalInfo);
// echo $getPersonalInfo[0]['img'];


// save change btn
if (isset($_POST["save"])) {
    $error_status = false;
    if (!empty($_POST["update_fname"])) {
        $update_fname = $_POST["update_fname"];

    } else {
        $error_status = true;
    }

    if (!empty($_POST["update_lname"])) {
        $update_lname = $_POST["update_lname"];

    } else {
        $error_status = true;
    }


    if (empty($update_bio)) {
        $update_bio = $getPersonalInfo[0]['bio'];
    } else {
        $update_bio = $_POST['update_bio'];

    }


    if (empty($_FILES['image']['name'])) {
        $filename = $getPersonalInfo[0]["img"];
    } else {
        $filename = $_FILES['image']['name'];
        $filesize = $_FILES['image']['size'];
        $allowed_files = ['jpg', 'png', 'jpeg', 'svg'];
        $temp_path = $_FILES['image']['tmp_name'];

        $fileinfo = explode('.', $filename);
        $filetype = end($fileinfo);
        $maxsize = 2000000000;
        if (in_array($filetype, $allowed_files)) {
            if ($filesize < $maxsize) {
                move_uploaded_file($temp_path, 'image/user-profile/' . $filename);
            } else {
                echo "file size exceeds maximum allowed";
            }
        }
    }


    if ($error_status == false) {
        $updateUser = $updateUserDetails->UpdateUser($userid, $update_fname, $update_lname, $update_bio, $filename);
        header("Location: " . $_SERVER['PHP_SELF']);
      

    }
}

//update NRCNumber
if(isset($_POST['enterNRC']))
{
    $error=false;
    if(isset($_POST['nrcNumber']))
    {
        $nrcNumber=$_POST['nrcNumber'];
        //echo $nrcNumber;
    }else{
        $error=true;
    }

    if(isset($_FILES['fimg']))
    {
        $frontfilename = $_FILES['fimg']['name'];
        $filesize = $_FILES['fimg']['size'];
        $allowed_files = ['jpg', 'png', 'jpeg', 'svg'];
        $temp_path = $_FILES['fimg']['tmp_name'];
    
        $fileinfo = explode('.', $frontfilename);
        $filetype = end($fileinfo);
        $maxsize = 2000000000;
        if (in_array($filetype, $allowed_files)) {
            if ($filesize < $maxsize) {
                move_uploaded_file($temp_path, 'image/user_nrc/front_nrc/' . $frontfilename);
            } else {
                echo "file size exceeds maximum allowed";
            }
        }
    }else{
        $error=true;
    }
    

    if(isset($_FILES['bimg']))
    {
        $backfilename = $_FILES['bimg']['name'];
        // echo $filename;
        $filesize = $_FILES['bimg']['size'];
        $allowed_files = ['jpg', 'png', 'jpeg', 'svg'];
        $temp_path = $_FILES['bimg']['tmp_name'];
        $fileinfo = explode('.', $backfilename);
        $filetype = end($fileinfo);
        $maxsize = 2000000000;
        if (in_array($filetype, $allowed_files)) {
            if ($filesize < $maxsize) {
                move_uploaded_file($temp_path, 'image/user_nrc/back_nrc/' . $backfilename);
            } else {
                echo "file size exceeds maximum allowed";
            }
        }
    }else{
        $error=true;
    }

    if($error==false)
    {
         $Nrc=$enterNrcimg->enterNrc($userid,$nrcNumber,$frontfilename,$backfilename);
         echo $nrcNumber;
         header("Location: " . $_SERVER['PHP_SELF']);

    }
}


include_once "nav.php";

?>
<link rel="stylesheet" href="mdbbootstrap/css/mdb.min.css">

<link rel="stylesheet" href="css/profile.css">
<link rel="stylesheet" href="css/search.css" />

<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<body>
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

                <div id="" class="checkposition d-flex align-items-center justify-content-center">
                   
                    <i class="fa-solid fa-check  <?php if($wait ==0 && empty($wait)){echo "d-none";} ?>" style="color: #ffffff;"></i>

                    <i class="fa-solid fa-exclamation <?php if($wait ==1){echo "d-none";} ?>" style="color: #FF0000;"></i> 
                    
                </div>
                
                <div class="dropdown float-end mt-4 mr-3">

                    <a href="" data-bs-toggle="dropdown" aria-expanded="false"><i
                            class="fa-solid fa-ellipsis-vertical fa-xl  text-muted"></i></a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editprofilemodel"
                                href="#">Edit Profile</a></li>
                        <li><a class="dropdown-item text-danger" href="#">Log Out</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
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
                <div class="allbtn d-flex">
                    <!-- Button trigger modal -->
                    <!-- <button type="button" class="btn btn-primary" data-mdb-toggle="modal"
                        data-mdb-target="#exampleModal">
                        Launch demo modal
                    </button> -->
                    
                    <button type="button" class="btn btn-danger <?php if(!empty($wait) || $wait != 0 || $wait !=1 ){echo 'd-none';} ?>" id="verify" data-mdb-toggle="modal" data-mdb-target="#vmodal">Verify Your Account</button>
                    

                    <!-- Modal -->
                    <form action="" method="post" enctype="multipart/form-data">
                    <div class="modal fade" id="vmodal" tabindex="-1" data-mdb-backdrop="static" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Verify Your Account</h5>
                                    <button type="button" class="btn-close" data-mdb-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-outline red mb-4 px-4">
                                        <input type="text" id="form12" name="nrcNumber" class="form-control" value="" />
                                        <label class="form-label "  for="form12">Enter Your NRC Number</label>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                        <label for="" class="mb-2 px-5">Enter Your</label>
                                            <div class="fimage-container  px-4">
                                                
                                                <img src=""  class="border border-1 rounded-3" width="100%" height="200px" >
                                            </div>
                                            <input type="file" name="fimg" class="d-none" id="selfrontimg" required>
                                            <i class="fa-solid fa-plus plus-signfront" id="fplus"></i>
                                            
                                        </div>
                                        <div class="col-md-12 mt-3">
                                        <label for="" class="mb-2 px-5">Enter Your</label>
                                            <div class="bimage-container px-4">
                                                <img src=""  class="border border-1 rounded-3"  width="100%" height="200px">
                                            </div>
                                            <input type="file" class="d-none" name="bimg" id="selbackimg" required>
                                            <i class="fa-solid fa-plus plus-signback" id="bplus"></i>
                                        </div>
                                        <p class="text-danger"><?php if(!empty($error)){echo "Plz Fill Correctly";} ?></p>
                                    </div>
                                    
                                   
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-secondary" name="cancelmodel"
                                        data-mdb-dismiss="modal" id="canceljs">Cancle</button>
                                    <button type="submit" class="btn btn-primary" name="enterNRC" id="NRCbtn">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                    
                    <button class="btn btn-success <?php if($wait==0  ){ echo  '';}else{ echo "d-none";}  ?>" disabled id="wait">Waiting</button>
                   
                    <!-- <button class="logout btn btn-danger ms-3">Log Out</button> -->
                </div>
            </div>

        </div>
    </div>
    <!-- Modal -->
    <form action="" method="post" enctype="multipart/form-data">
        <div class="modal fade" id="editprofilemodel" tabindex="-1" data-bs-backdrop="static"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profile</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body row text-center">
                        <!-- cross btn -->
                        <div id="cross" class="d-none">
                            <i class="fa-solid fa-xmark fa-xl cancel-icon  "></i>
                        </div>
                        <div class=" d-flex justify-content-center">
                            <img src="image/user-profile/<?php echo $userimg; ?>" alt="" name=""
                                class="edituserimg ml-3 ">
                        </div>
                        <!-- hidden file -->
                        <div class="hideinputfile">
                            <input type="file" name="image" id="inputphoto" class="d-none">
                        </div>
                        <div class="col-md-12 mt-5 d-flex">
                            <div class="col-md-6 ">
                                <input type="text" class="text-center border-bottom hideborder" name="update_fname"
                                    placeholder="Enter First Name" id="updateuser_fname"
                                    value="<?php echo $userfname ?>">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="text-center border-bottom hideborder" name="update_lname"
                                    placeholder="Enter Last Name" id="updateuse_lrname"
                                    value="<?php echo $userlname ?>">
                            </div>
                        </div>
                        <!-- <div class="col-md-12 mt-3">
                    <input type="text" class="text-center border-bottom hideborder" name="" id="" value="" placeholder="<?php if (!empty($userbio)) {
                        echo $userbio;
                    } else {
                        echo "Describe yourself...";
                    } ?>">
                </div> -->
                        <div class="col-md-12 mt-3">
                            <input type="text" class="text-center border-bottom hideborder" name="update_bio" id=""
                                value="" placeholder="<?php if (!empty($userbio)) {
                                    echo $userbio;
                                } else {
                                    echo "Describe yourself...";
                                } ?>">
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" name="save" class="btn btn-info" id="saveChangeBtn">Save changes</button>
                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <section class="mt-3">
        <div class="container overflow-hidden">
            <div class="flitter-tab">
                <div class="navbar">
                    <ul class="nav-list">
                        <li class="nav-item active" data-tab="0">
                            Tab 1
                        </li>
                        <li class="nav-item" data-tab="1">
                            Tab 2
                        </li>
                        <li class="nav-item" data-tab="2">
                            Tab 3
                        </li>
                        <!-- Add more navigation items as needed -->
                    </ul>
                </div>
            </div>


            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="tab-content">Content for Tab 1</div>
                    </div>
                    <div class="swiper-slide">
                        <div class="tab-content">Content for Tab 2</div>
                    </div>
                    <div class="swiper-slide">
                        <div class="tab-content">Content for Tab 3</div>
                    </div>
                    <!-- Add more swiper slides and tab content as needed -->
                </div>
            </div>
        </div>
    </section>
    <script src="mdbbootstrap/js/mdb.min.js"></script>

    <script src="js/jquery-3.7.0.min.js"></script>

    <script src="js/loader.js"></script>
    <script src="js/profile.js"></script>

    <script>
        // Initialize Swiper
        var swiper = new Swiper(".swiper-container", {
            slidesPerView: "auto",
            spaceBetween: 0,
        });

        // Get the navigation items
        const navItems = document.querySelectorAll(".nav-item");

        // Add click event listener to each navigation item
        navItems.forEach((item, index) => {
            item.addEventListener("click", () => {
                // Remove active class from all navigation items
                navItems.forEach((item) => item.classList.remove("active"));

                // Add active class to the clicked navigation item
                item.classList.add("active");

                // Slide to the corresponding tab
                swiper.slideTo(index);
            });
        });

        // Update active tab based on swiper slide change event
        swiper.on("slideChange", () => {
            // Get the active slide index
            const activeSlideIndex = swiper.activeIndex;

            // Remove active class from all navigation items
            navItems.forEach((item) => item.classList.remove("active"));

            // Add active class to the corresponding navigation item
            navItems[activeSlideIndex].classList.add("active");
        });
    </script>

</body>

</html>