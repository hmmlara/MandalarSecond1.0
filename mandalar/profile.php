<?php
include_once "nav.php";

// session_start();
include_once "controller/profileController.php";
include_once "controller/userController.php";
include_once "controller/nrcController.php";
include_once "controller/kpayController.php";
include_once "./controller/postController.php";


$post_controller = new PostController();
$post_list = $post_controller->getPostList();

// var_dump($post_list);


$getalluserlist = new ProfileController();
$getAllUser = $getalluserlist->getUserList();

$enterNrcimg = new NrcController();



$updateUserDetails = new UserController();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    echo $user_id;
} else {
    header("Location:Home.php");
}

$post_controller = new PostController();
$getuserpost = $post_controller->getUserList($user_id);



foreach ($getAllUser as $key => $user) {
    if ($user['user_id'] == $_SESSION["user_id"]) {
        $userid = $user['user_id'];
        $userfname = $user["fname"];
        $userlname = $user["lname"];
        $userbio = $user['bio'];
        $useremail = $user['email'];
        $userimg = $user['img'];
        // $userbio = $user['bio'];
        $userwallet = $user["wallet"];
        // echo $user_id;
    }
}
$getNrcUser = $enterNrcimg->getAll();
//  var_dump($getNrcUser);
$wait = null; // Set a default value before the loop
foreach ($getNrcUser as $key => $wait) {
    if ($wait['to_id'] == $userid) {
        $wait = $wait["status"];
    } else {
        $wait = 2;
    }
}

// echo $wait;
// $wait = null; // Set a default value before the loop

// foreach ($getNrcUser as $key => $waitItem) {
//     if ($waitItem['to_id'] == $userid) {
//         $wait = $waitItem['status']; // Update the value of $wait
//         echo $wait;
//     }else{
//         $wait=2;
//     }
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
if (isset($_POST['enterNRC'])) {
    $error = false;
    if (isset($_POST['nrcNumber'])) {
        $nrcNumber = $_POST['nrcNumber'];
        //echo $nrcNumber;
    } else {
        $error = true;
    }

    if (isset($_FILES['fimg'])) {
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
    } else {
        $error = true;
    }


    if (isset($_FILES['bimg'])) {
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
    } else {
        $error = true;
    }

    if ($error == false) {
        $Nrc = $enterNrcimg->enterNrc($userid, $nrcNumber, $frontfilename, $backfilename);
        echo $nrcNumber;
        header("Location: " . $_SERVER['PHP_SELF']);
    }
}


//kpay
if (isset($_POST["sand_money"])) {
    $error_status = false;
    if (isset($_POST['amount'])) {
        $amount = $_POST['amount'];
    } else {
        $error = true;
    }

    if (isset($_POST['kpay_phonenumber'])) {
        $kpay_phone = $_POST['kpay_phonenumber'];
    } else {
        $error = true;
    }

    if (isset($_POST['kpay_name'])) {
        $kpay_name = $_POST['kpay_name'];
    } else {
        $error = true;
    }

    if (isset($_FILES['kpayimg'])) {
        $kpay_img = $_FILES['kpayimg']['name'];
        // echo $kpay;
        $filesize = $_FILES['kpayimg']['size'];
        $allowed_files = ['jpg', 'png', 'jpeg', 'svg'];
        $temp_path = $_FILES['kpayimg']['tmp_name'];

        $fileinfo = explode('.', $kpay_img);
        $filetype = end($fileinfo);
        $maxsize = 2000000000;
        if (in_array($filetype, $allowed_files)) {
            if ($filesize < $maxsize) {
                move_uploaded_file($temp_path, 'image/kpay_img/' . $kpay_img);
            } else {
                echo "file size exceeds maximum allowed";
            }
        }
    } else {
        $error = true;
    }


    if ($error_status == false) {
        $enterWallet = $updateUserDetails->enterKpay($userid, $amount, $kpay_name, $kpay_phone, $kpay_img);
    }
}


$getKpay_history = new kpayController();
$getKpay = $getKpay_history->getTransfarhistory($user_id);



// var_dump($getKpay);
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
            <div class="col-md-12 " style="height: 200px; border-top-left-radius:1em; border-top-right-radius:1em; background-color:#627E8B">

            </div>
        </div>
        <div class="row bg-white shadow" style="height:340px; border-bottom-left-radius:1em; border-bottom-right-radius:1em">
            <!-- profile -->
            <div class="col-md-12" style="">
                <div class="userprofile">
                    <img src="image/user-profile/<?php echo $userimg; ?>" alt="" class="userimg ml-3">
                </div>

                <div id="" class="checkposition d-flex align-items-center justify-content-center">

                    <i class="fa-solid fa-check  <?php if ($wait == 0 || $wait == 2) {
                                                        echo "d-none";
                                                    } ?>" style="color: #ffffff;"></i>

                    <i class="fa-solid fa-exclamation <?php if ($wait == 1) {
                                                            echo "d-none";
                                                        } ?> " style="color: #FF0000;"></i>

                </div>

                <div class="dropdown float-end mt-4 mr-3">

                    <a href="" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical fa-xl  text-muted"></i></a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editprofilemodel" href="#">Edit Profile</a></li>
                        <li><a class="dropdown-item text-danger" href="logout.php">Log Out</a></li>
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
                <div class="money d-flex align-items-center">
                    <i class="fa-solid fa-circle-plus mx-2" data-mdb-toggle="modal" data-mdb-target="#money_modal"></i>
                    <!-- <input type="text" disabled class="money_box text-white  move text-right bg-transparent" value="<?php if (isset($userwallet)) {
                                                                                                                                echo $userwallet;
                                                                                                                            } else {
                                                                                                                                echo 0;
                                                                                                                            } ?>"> -->
                    <p class="money_box text-white  move text-center"><?php if (isset($userwallet)) {
                                                                            echo $userwallet;
                                                                        } else {
                                                                            echo 0;
                                                                        } ?></p>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="money_modal" tabindex="-1" data-mdb-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <p>Kpay Phone Number : 09751047472</p>
                                    <p>Kpay Name : U Kyaw Kyaw</p>
                                    <div class="form-outline mt-3">
                                        <input type="text" id="form13" class="form-control your_amount" name="amount" value="" />
                                        <label class="form-label" for="form13">Enter Your Amount</label>
                                    </div>
                                    <span class="text-danger error_amount"></span>

                                    <div class="form-outline mt-3">
                                        <input type="text" id="form13" class="form-control your_pho" name="kpay_phonenumber" />
                                        <label class="form-label" for="form13">Enter Your Kpay Phone Number</label>
                                    </div>
                                    <span class="text-danger error_phone"></span>

                                    <div class="form-outline mt-3">
                                        <input type="text" id="form13" class="form-control your_kpayName" name="kpay_name" />
                                        <label class="form-label" for="form13">Enter Your Kpay Name</label>
                                    </div>
                                    <span class="text-danger error_kpayName"></span>
                                    <br>
                                    <label for="" class="mt-3">Enter Your </label>
                                    <div class="my-3 d-flex justify-content-center kpay_show_box ">
                                        <img src="" alt="" id="show_kpay_img" required>
                                        <div class="plus">
                                            <i class="fa-solid fa-plus" id="add_Kpay"></i>
                                        </div>
                                    </div>
                                    <input type="file" name="kpayimg" class="d-none" id="Kpay_img" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary" id="send_kpayinfo" name="sand_money">Send</button>
                                </div>
                        </div>
                        </form>

                    </div>
                </div>
                <div class="allbtn d-flex">
                    <!-- Button trigger modal -->
                    <!-- <button type="button" class="btn btn-primary" data-mdb-toggle="modal"
                        data-mdb-target="#exampleModal">
                        Launch demo modal
                    </button> -->

                    <button type="button" class="btn btn-danger <?php if ($wait !== 2 || $wait == 0) {
                                                                    echo 'd-none';
                                                                } ?>" id="verify" data-mdb-toggle="modal" data-mdb-target="#vmodal">Verify Your Account</button>


                    <!-- Modal -->
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="modal fade" id="vmodal" tabindex="-1" data-mdb-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Verify Your Account</h5>
                                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-outline red mb-4 px-4">
                                            <input type="text" id="" name="nrcNumber" class="form-control" value="" />
                                            <label class="form-label " for="form12">Enter Your NRC Number</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="" class="mb-2 px-5">Enter Your</label>
                                                <div class="fimage-container  px-4">

                                                    <img src="" class="border border-1 rounded-3" width="100%" height="200px">
                                                </div>
                                                <input type="file" name="fimg" class="d-none" id="selfrontimg" required>
                                                <i class="fa-solid fa-plus plus-signfront" id="fplus"></i>

                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <label for="" class="mb-2 px-5">Enter Your</label>
                                                <div class="bimage-container px-4">
                                                    <img src="" class="border border-1 rounded-3" width="100%" height="200px">
                                                </div>
                                                <input type="file" class="d-none" name="bimg" id="selbackimg" required>
                                                <i class="fa-solid fa-plus plus-signback" id="bplus"></i>
                                            </div>
                                            <p class="text-danger"><?php if (!empty($error)) {
                                                                        echo "Plz Fill Correctly";
                                                                    } ?></p>
                                        </div>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-secondary" name="cancelmodel" data-mdb-dismiss="modal" id="canceljs">Cancle</button>
                                        <button type="submit" class="btn btn-primary" name="enterNRC" id="NRCbtn">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <button class="btn btn-success <?php if ($wait == 0) {
                                                        echo  '';
                                                    } else {
                                                        echo "d-none";
                                                    }  ?>" disabled id="wait">Waiting</button>

                    <!-- <button class="logout btn btn-danger ms-3">Log Out</button> -->
                </div>
            </div>

        </div>
    </div>
    <!-- Modal -->
    <form action="" method="post" enctype="multipart/form-data">
        <div class="modal fade" id="editprofilemodel" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <img src="image/user-profile/<?php echo $userimg; ?>" alt="" name="" class="edituserimg ml-3 ">
                        </div>
                        <!-- hidden file -->
                        <div class="hideinputfile">
                            <input type="file" name="image" id="inputphoto" class="d-none">
                        </div>
                        <div class="col-md-12 mt-5 d-flex">
                            <div class="col-md-6 ">
                                <input type="text" class="text-center border-bottom hideborder" name="update_fname" placeholder="Enter First Name" id="updateuser_fname" value="<?php echo $userfname ?>">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="text-center border-bottom hideborder" name="update_lname" placeholder="Enter Last Name" id="updateuse_lrname" value="<?php echo $userlname ?>">
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
                            <input type="text" class="text-center border-bottom hideborder" name="update_bio" id="" value="" placeholder="<?php if (!empty($userbio)) {
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
                            Post
                        </li>
                        <li class="nav-item" data-tab="1">
                            Tab 2
                        </li>
                        <li class="nav-item" data-tab="2">
                            <i class="fa-solid fa-clock-rotate-left mr-2"></i> History
                        </li>
                        <!-- Add more navigation items as needed -->
                    </ul>
                </div>
            </div>


            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide border rounded-4 shadow-4">
                        <div class="tab-content ">
                            <?php if (isset($post_list)) { ?>
                                <section id="products" class="">

                                    <div class="row ">
                                        <?php foreach ($post_list as $post) {
                                            // echo $post['seller_id'];
                                            if ($user_id == $post['seller_id']) {
                                                # code...
                                        ?>

                                                <a href="productDetail.php?id=<?php echo $post['id'] ?>" class="col-md-4 col-sm-6  col-lg-3 mb-4 ">
                                                    <div class="card product-card-by-nay">
                                                        <?php
                                                        $images = glob('image/post_img/' . $post['photo_folder'] . '/*.{jpg,png,gif}', GLOB_BRACE);
                                                        ?>
                                                        <img src="<?php echo $images[0] ?>" class="card-img-top product-image" alt="Product 1" />
                                                        <div class="card-body">
                                                            <div class=" product-card-title">
                                                                <h5>
                                                                    <?php echo $post['item'] ?>

                                                                </h5>
                                                                <h5>
                                                                    <?php echo $post["price"] ?>
                                                                </h5>
                                                            </div>
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <div class="d-flex align-items-center">
                                                                    <img src="image/user-profile/<?php echo $post['user_img'] ?>" class="rounded-circle profile-on-card" alt="Seller 1" />
                                                                    <span class="ml-2 card-text">
                                                                        <?php echo $post['fname'] . " " . $post['lname'] ?>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class=" product-info-box">
                                                                <div>
                                                                    <i class="far fa-heart mr-2"></i>
                                                                    <span class="reaction-count">5</span>
                                                                </div>
                                                                <div>
                                                                    <i class="far fa-plus-square ml-3"></i>
                                                                    <span class="save-count">18</span>
                                                                </div>

                                                                <div>
                                                                    <i class="far fa-eye ml-3"></i>
                                                                    <span class="view-count">50</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>

                                        <?php }
                                        } ?>
                                    </div>
                                </section>
                            <?php } else { ?>
                                <div class="d-flex align-items-center justify-content-center mt-5">
                                    <img src="../mandalar/image/some/no sell post.png" alt="">
                                </div>

                            <?php } ?>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="tab-content">Content for Tab 2</div>
                    </div>
                    <!-- kpay History -->
                    <div class="swiper-slide border rounded-4 shadow-4">
                        <div class="tab-content container">

                            <div class="row">
                                <?php if (!empty($getKpay)) {  ?>
                                    <!-- today -->
                                    <h4>Today</h4>
                                    <?php $previousMonth=null; ?>
                                    <?php foreach ($getKpay as $key => $gettransfer) {
                                        $transferDate = strtotime($gettransfer["date"]); // Convert date to timestamp

                                        // Get the month name
                                        $monthName = date("F", $transferDate);

                                        // Display the month heading when it's a new month
                                        if ($monthName !== $previousMonth) {
                                            echo '<h4>' . $monthName . '</h4>';
                                            $previousMonth = $monthName;
                                        }

                                    ?>

                                        <?php if ($monthName == "Today") { ?>

                                            <!-- <i class="fa-solid fa-money-bill-transfer" style="color: #3b71ca;"></i> -->
                                            <div class="col-md-12  d-flex align-items-center border">
                                                <div class="col-md-1 d-flex align-items-center justify-content-center">
                                                    <i class="fa-solid fa-money-bill-transfer fa-2xl" style="color: #3b71ca;"></i>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>Transfer To </p>
                                                    <p><?php echo $dateText; ?></p>
                                                    <p><?php echo  $gettransfer["date"]; ?></p>
                                                </div>
                                                <div class="col-md-4">
                                                    <h4>+<?php echo  $gettransfer["check_wallet"]; ?></h4>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                    <!-- nottoday -->

                                    <h4>Not today</h4>
                                    <?php foreach ($getKpay as $key => $gettransfer) {
                                        $transferDate = strtotime($gettransfer["date"]); // Convert date to timestamp
                                        $currentDate = strtotime(date("Y-m-d")); // Get current date timestamp

                                        // Extract first 5 digits from timestamps
                                        $transferDateDigits = substr($transferDate, 0, 5);
                                        $currentDateDigits = substr($currentDate, 0, 5);

                                        // Compare date digits
                                        if ($transferDateDigits === $currentDateDigits) {
                                            $dateText = "Today";
                                        } elseif ($transferDate === strtotime("-1 day", $currentDate)) {
                                            $dateText = "Yesterday";
                                        } else {
                                            $dateText = date("F", $transferDate); // Get full month name
                                            echo $dateText;
                                        }

                                    ?>

                                        <?php if ($dateText !== "Today") { ?>

                                            <!-- <i class="fa-solid fa-money-bill-transfer" style="color: #3b71ca;"></i> -->
                                            <div class="col-md-12  d-flex align-items-center border">
                                                <div class="col-md-1 d-flex align-items-center justify-content-center">
                                                    <i class="fa-solid fa-money-bill-transfer fa-2xl" style="color: #3b71ca;"></i>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>Transfer To </p>
                                                    <p><?php echo $dateText; ?></p>
                                                    <p><?php echo  $gettransfer["date"]; ?></p>
                                                </div>
                                                <div class="col-md-4">
                                                    <h4>+<?php echo  $gettransfer["check_wallet"]; ?></h4>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                <?php } else { ?>
                                    <div class="d-flex align-items-center justify-content-center mt-5">
                                        <img src="./image/some/no-transfer-money.png" alt="">
                                    </div>


                                <?php } ?>
                            </div>

                        </div>
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