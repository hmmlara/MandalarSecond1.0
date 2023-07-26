<?php
session_start();
include_once "nav.php";
include_once "controller/profileController.php";
$getalluserlist = new ProfileController();
$getAllUser = $getalluserlist->getUserList();

if (isset($_SESSION['user_id'])) {
    echo $_SESSION['user_id'];
}

foreach ($getAllUser as $key => $user) {
    if ($user['user_id'] == $_SESSION["user_id"]) {
        $username = $user["fname"] . " " . $user["lname"];
        $userbio = $user['bio'];
        $useremail = $user['email'];
        $userimg = $user['img'];
        echo $userimg;
    }
    # code...
}
?>
<link rel="stylesheet" href="css/profile.css">
<link rel="stylesheet" href="css/search.css" />
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<body>
    <div class="container">
        <div class="row ">
            <div class="col-md-12 bg-info"
                style="height: 200px; border-top-left-radius:1em; border-top-right-radius:1em">

            </div>
        </div>
        <div class="row bg-white shadow"
            style="height:340px; border-bottom-left-radius:1em; border-bottom-right-radius:1em">
            <!-- profile -->
            <div class="col-md-12" style="">
                <div class="userprofile">
                    <img src="image/user-profile/<?php echo $userimg; ?>" alt="" class="userimg ml-3">
                </div>
                <h3 class="username">
                    <?php echo $username; ?>
                </h3>
                <h5 class="address">Mandalay, Myanmar</h5>
                <i class="fa-brands fa-square-facebook fa-xl icon" style="color: #3b5998;"></i>
                <i class="fa-brands fa-square-twitter fa-xl icon" style="color: #1da1f2;"></i>
                <i class="fa-brands fa-square-google-plus fa-xl icon" style="color: #4285f4;"></i>
                <button class="messageuser btn btn-info">Message</button>
            </div>

        </div>
    </div>
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
    <script src="js/loader.js"></script>

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