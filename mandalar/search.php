<?php
include_once "controller/searchController.php";
$searchAlluser = new SearchController();


if (isset($_GET['searchinput'])) {

	$searchinput = $_GET['searchinput'];
	// echo $searchinput;
	$searchUsers = $searchAlluser->searchAllUser($searchinput);

	// var_dump($searchUsers);

}


// if (isset($_GET['searchinput'])) {

// 	$searchinputget = $_GET['searchinput'];
// 	echo $searchinputget;

// }
 if(isset($_POST["search"]))
 {
    if(!empty($_POST["searchinput"]))
    {
        $searchinput=$_POST["searchinput"];
    }
    
 }
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />


	<script src="js/modernizr-2.6.2.min.js"></script>
	<link rel="stylesheet" href="../mandalar/fontawesome-free-6.4.0-web/css/all.min.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mdbootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mdbootstrap/css/mdb.min.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mdbootstrap/css/mdb.min.css" />
	<link rel="stylesheet"
		href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" />
	<link rel="stylesheet" href="css/nav.css" />
	<link rel="stylesheet" href="css/style2.css" />
	<link rel="stylesheet" href="css/search.css" />
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
	<title>Product Detail Page</title>
</head>

<body>
	<div id="loader"></div>

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
                                            <a class="aa-cart-link bell"  role="button"  id="dropdownMenuButton"
                                                data-mdb-toggle="dropdown" >
                                                
                                                <i class="fa-regular fa-bell"></i>
                                                <span class="aa-cart-notify" style="color: #4e9c81;">10</span>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
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
                                     
                                        <input type="text" name="searchinput" id="search-box" placeholder="Search" value="<?php if(isset($searchinput)) echo $searchinput; ?>">
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
	<section>
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
					<div class="swiper-slide mr-3">
						<div class="tab-content">
							<div class="row">
								<?php
									foreach ($searchUsers as $key => $user) {
								?>
								<a href="searchprofile.php?id=<?php echo $user['user_id'] ?>">
									<div class="col-md-12 rounded d-flex p-2 border pointer text-dark">
										<div class="col-md-1">
											<img src="../mandalar/image/user-profile/<?php echo $user["img"] ?>" class="usersearchimg" alt="">
										</div>	
										<div class="col-md-8">
											<h5><?php echo $user["fname"]." ".$user['lname']  ?></h5>
										</div>
										<div class="col-md-3 d-flex align-items-center justify-content-end">
											<i class="fa-solid fa-arrow-right fa-2xl"></i>
										</div>
									</div>
								</a>
								<?php
									}
								?>
								
							</div>
						</div>
					</div>
					<div class="swiper-slide">
						<div class="tab-content">
							<div class="row">
								<div class="col-md-12 bg-success">
									Hello
								</div>
							</div>
						</div>
					</div>
					<div class="swiper-slide">
						<div class="tab-content">Content for Tab 3</div>
					</div>
					<!-- Add more swiper slides and tab content as needed -->
				</div>
			</div>
		</div>
	</section>
	<script src="js/jquery-3.7.0.min.js"></script>
	<script src="js/loader.js"></script>
<script src="js/searchbox.js">
	
</script>
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