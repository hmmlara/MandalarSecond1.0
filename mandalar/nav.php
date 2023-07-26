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
                                        <a class="aa-cart-link heart" href="#">
                                            <i class="fa-solid fa-heart"></i>
                                        </a>
                                        
                                        <div class="dropdown" >
                                            <a class="aa-cart-link bell" style="display:inline-block;width:120px"  role="button"  id="dropdownMenuButton"
                                                data-mdb-toggle="dropdown" >
                                                
                                                <i class="fa-regular fa-bell"></i>
                                                <span class="aa-cart-notify" style="color: #4e9c81;">10</span>
                                                <ul class="dropdown-menu"  aria-labelledby="dropdownMenuButton">
                                                    <li class="dropdown-item" href="#">Action</li>
                                                    <li class="dropdown-item" href="#">Another action</li>
                                                    <li class="dropdown-item" href="#">Something else here</li>
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