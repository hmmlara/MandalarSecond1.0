<?php 
//session_start();
include_once "controller/profileController.php";
include_once "controller/userController.php";

$getalluserlist = new ProfileController();
$getAllUser = $getalluserlist->getUserList();



$updateUserDetails = new UserController();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    echo $user_id;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Buy and Sell Website</title>


    
    <!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="mdbbootstrap/css/mdb.min.css">

    <!-- <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" /> -->
    <link rel="stylesheet" href="../mandalar/fontawesome-free-6.4.0-web/css/all.min.css" />
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mdbootstrap/css/bootstrap.min.css" /> -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mdbootstrap/css/mdb.min.css" /> -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mdbootstrap/css/mdb.min.css" /> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" /> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" /> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" /> -->
    <link rel="stylesheet" href="css/products.css" />
    <link rel="stylesheet" href="css/category.css" />
    <link rel="stylesheet" href="css/nav.css" />
    <!-- <script src="bootstrap/js/bootstrap.bundle.min.js"></script> -->

    <link rel="stylesheet" href="css/nouislider.css">

    <!-- Flexslider  -->
    <!-- <link rel="stylesheet" href="css/flexslider.css"> -->

    <!-- Owl Carousel  -->
    <!-- <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css"> -->

    <!-- Theme style  -->
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/loader.css">
    <link rel="stylesheet" href="css/flitter.css" />

    
</head>

<body class="">
    <!-- Navigation -->


    <div id="page">
        <header id="aa-header">
            <!-- start header top  -->

            <!-- / header top  -->

            <!-- start header bottom  -->
            <div class="aa-header-bottom mb-4" style="background-color: #627E8B; ">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="aa-header-bottom-area">
                                <!-- logo  -->
                                <div class="aa-logo">
                                    <!-- Text based logo -->
                                    <img src="image/logoimg/logo-no-background.png" class="logo" width="200px"
                                        height="auto" alt="as">
                                    
                                </div>
                                <!-- / logo  -->
                                <!-- cart box -->
                                <div class="aa-cartbox">
                                    <div class=" d-flex justify-content-end" style="width: 230px;">
                                        <a class="aa-cart-link heart" href="home.php" >
                                            <i class="fa-solid fa-house"></i>
                                        </a>
                                        
                                        <div class="dropdown" >
                                            <a class="aa-cart-link bell" style="display:inline-block;width:120px"  role="button"  id="dropdownMenuButton"
                                                data-mdb-toggle="dropdown" >
                                                
                                                <i class="fa-regular fa-bell"></i>
                                                <span class="aa-cart-notify" style="color: #4e9c81;">0</span>
                                                <ul class="dropdown-menu"  aria-labelledby="dropdownMenuButton">
                                                    
                                                </ul>
                                            </a>
                                        </div>

                                        <a class="aa-cart-link message" href="#">
                                            <i class="fa-regular fa-message "></i>
                                        </a>

                                        <a class="aa-cart-link user" href="profile.php">
                                            <i class="fa-regular fa-user"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- / cart box -->
                                <!-- search box -->
                                <div class="aa-search-box">
                                    <form action="" method="post" >
                                     
                                        <input type="text" name="searchinput" id="search-box" placeholder="Search" value="<?php if(isset($searchinputget)) echo $searchinputget; ?>">
                                        <button type="submit" name="search" id="search"
                                            style="border-radius: 30px; background-color: #4e9c81;"><span
                                                class="fa fa-search"></span></button>
                                    </form>
                                </div>
                                <!-- / search box -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

           
        </header>

        <div class="loader-wrapper">
            <div id="loader"></div>
        </div>

</body>
<!-- Modernizr JS -->
<script src="js/modernizr-2.6.2.min.js"></script>
<script src="mdbbootstrap/js/mdb.min.js"></script>
<!-- <script src="mdbbootstrap/js/mdb.min.js"></script> -->
<script src="js/jquery-3.7.0.min.js"></script>
<!-- <script src="bootstrap/js/bootstrap.bundle.min.js"></script> -->
<script src="js/searchbox.js"></script>
</html>


<?php

$user_id=6;
include_once "controller/postController.php";
$post_controller=new PostController();
$post_list=$post_controller->favorite_post_list($user_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
<section id="products" class="">

<div class="row ">
    <?php foreach ($post_list as $post) {
        # code...
    ?>
    
        <a href="productDetail.php?id=<?php echo $post['id'] ?>" class="col-md-4 col-sm-6  col-lg-3 mb-4 ">
            <div class="card product-card-by-nay">
            <?php
                    $images = glob('image/post_img/'.$post['photo_folder'].'/*.{jpg,png,gif}', GLOB_BRACE);
                    ?>
                <img src="<?php echo $images[0] ?>" class="card-img-top product-image" alt="Product 1" />
                <div class="card-body">
                    <h5 class="card-title"><?php echo $post['item'] ?></h5>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <img src="image/user-profile/<?php echo $post['user_img']  ?>" class="rounded-circle profile-on-card" alt="Seller 1" />
                            <span class="ml-2 card-text"><?php echo $post['fname']." ".$post['lname'] ?></span>
                        </div>
                    </div>
                    <div class="mt-3">
                        <i class="far fa-heart mr-2"></i>
                        <span class="reaction-count">5</span>
                        <i class="far fa-plus-square ml-3"></i>
                        <span class="save-count">18</span>
                        <i class="far fa-eye ml-3"></i>
                        <span class="view-count">50</span>
                    </div>
                </div>
            </div>
    </a>
    
    <?php } ?>
</div>
</section>
</div>
</body>
</html>