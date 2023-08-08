<?php
session_start();
include_once "controller/profileController.php";
include_once "controller/followController.php";
include_once "controller/kpayController.php";
include_once "./controller/postController.php";

if(isset($_SESSION['user_id']))
{
    $from_id=$_SESSION['user_id'];
    
    $followresult=$followUser->followingUser($from_id,$to_id);

    if($followresult[0]['follow_exists']=="1")
    {
        $condition="true";
    }else{
        $condition="false";
    }

    

    if($_SESSION['user_id']==$_GET['id'])
    {
        header("location:profile.php");
    }


}else{
    $fake_id=99;
}
$to_id=$_GET['id'];
$getalluserlist = new ProfileController();
$getAllUser = $getalluserlist->getUserList();
$followUser=new FollowController();
$getAllFollow=$followUser->getAllFollow();
$post_controller = new PostController();



//var_dump($followresult);



// if($followresult==false){
//     $condition="false";
//     echo "false";
// }





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
        $usernrc=$user["nrc"];
        // echo $usernrc;
    }
}

// if(empty($user))
// {
//     echo "/////";
// }else{
//     echo $usernrc;
// }



// if(isset($_POST["follow"]))
// {
//     $from_id=$_SESSION['user_id'];
//     $to_id=$_GET['id'];
//     $follow=$followUser->following($from_id,$to_id);
// }


include_once "nav.php";
$getKpay_history=new kpayController();
$getKpay=$getKpay_history->getTransfarhistory($userid);
$getuserpost = $post_controller->getUserList($userid);
//  var_dump($getuserpost);

// var_dump($getKpay);
?>
    <style>
        /* Custom select box style for MDB */
        
        .custom-select {
            display: block;
            width: 100%;
            height: 38px;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        
        .custom-select:focus {
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
        /* Style the arrow icon */
        
        .custom-select::after {
            content: '\f107';
            /* Font Awesome caret-down icon */
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            pointer-events: none;
        }
        /* Optional: Style the dropdown options */
        
        .custom-select option {
            padding: 10px;
            background-color: #fff;
            color: #495057;
        }
        /* Custom style for image selector */
        
        .image-selector {
            display: inline-block;
        }
        
        .image-selector .form-control {
            display: none;
        }
        
        .image-selector label {
            /* display: block; */
            margin-top: 8px;
            width: 100px;
            height: 100px;
            background-color: #f0f0f0;
            border: 2px dashed #ccc;
            border-radius: 8px;
            text-align: center;
            line-height: 100px;
            font-size: 24px;
            color: #666;
            cursor: pointer;
            transition: border-color 0.2s;
        }
        
        .image-selector img {
            max-width: 100%;
            max-height: 100%;
            border-radius: 8px;
            margin-top: 10px;
        }
        
        .image-selector label:hover {
            border-color: #333;
        }
        
        .image-selector label.plus-sign::before {
            content: '+';
        }
        /* Show the selected image preview */
        
        .image-selector .form-control:focus+img {
            display: block;
        }
        
        .preview-image {
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-right: 8px;
            margin-top: 8px;
            border-radius: 8px;
        }
        
        .image-previews img {
            /* display: flex; */
            vertical-align: top;
        }
        
        #PostBtn {
            position: fixed;
            right: 40px;
            bottom: 40px;
            padding: 30px;
            font-size: 20px;
            border-radius: 20px;
        }
        
        a {
            color: initial !important;
            
        }
    </style>

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
                <div id="" class="checkposition d-flex align-items-center justify-content-center" style="border: 3px solid white;">
                   
                   <i class="fa-solid fa-check <?php if(empty($usernrc)){echo "d-none";} ?>" style="color: #ffffff;"></i>

                   <i class="fa-solid fa-exclamation <?php if(!empty($usernrc)){echo "d-none";} ?>" style="color: #FF0000;"></i> 
                   
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
                        <?php if(isset($from_id)) {?>
                            <a href="chatapp/chat.php?user_id=<?php echo $to_id ?>" class="messageuser btn btn-info">Message</a>
                            <!-- <button class="messageuser btn btn-info">Message</button> -->
                                           
                            <button class="logout btn btn-primary d-none" id="follow" name="follow">Follow</button>
                      
                            <button class="btn btn-warning d-none " id="unfollow">UnFollow</button>
                        <?php }else{ ?>
                            <a href="" class="messageuser btn btn-info"  data-mdb-toggle="modal" data-mdb-target="#messageModal" id="messagefake">Message</a>
                            <div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Sign up to Message friends!</h5>
                                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <!-- <div class="modal-body">Sign up to follow friends</div> -->
                                    <div class="modal-footer d-flex align-items-center justify-content-center">
                                        <a  href="register.php" class="btn btn-secondary" data-mdb-dismiss="modal">Register</a>
                                        <a href="login.php" class="btn btn-primary">Login</a>
                                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                    </div>
                                    </div>
                                </div>
                            </div>
                            

                            <button class="logout btn btn-primary " data-mdb-toggle="modal" data-mdb-target="#followModal" id="followfake" >Follow</button>
                            

                            <!-- Modal -->
                            <div class="modal fade" id="followModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Sign up to follow friends!</h5>
                                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <!-- <div class="modal-body">Sign up to follow friends</div> -->
                                    <div class="modal-footer d-flex align-items-center justify-content-center">
                                        <a  href="register.php" class="btn btn-secondary" data-mdb-dismiss="modal">Register</a>
                                        <a href="login.php" class="btn btn-primary">Login</a>
                                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                    </div>
                                    </div>
                                </div>
                            </div>
                      
                          
                        <?php }?>
                    
                    </div>
                </form>
                
            </div>

        </div>
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
                    </ul>
                </div>
            </div>


            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide border rounded-4 shadow-4">
                        <div class="tab-content ">
                        <?php if(isset($getuserpost)){ ?>
                        <section id="products" class="">

                            <div class="row text-dark">
                                <?php foreach ($getuserpost as $post) {
                                # code...
                                ?>

                                <a href="productDetail.php?id=<?php echo $post['id'] ?>" class="col-md-4 col-sm-6  col-lg-3 mb-4" style="color:i" >
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
                                                       <?php echo $post['price'] ?>
                                                    </h5>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        <img src="image/user-profile/<?php echo $post['img'] ?>" class="rounded-circle profile-on-card" alt="Seller 1" />
                                                        <span class="ml-2 card-text">
                                                    <?php echo $post['full_name']; ?>
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

                                <?php } ?>
                            </div>
                        </section>
                        <?php }else{ ?>
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
                   
                    <!-- Add more swiper slides and tab content as needed -->
                </div>
            </div>
        </div>
    </section>
    </div>
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
    <script src="js/follow.js"></script>
</body>
</html>