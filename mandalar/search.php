<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1.0"
		/>
		<link
			rel="stylesheet"
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
		/>
		<link
			rel="stylesheet"
			href="https://unpkg.com/swiper/swiper-bundle.min.css"
		/>
		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
		/>


		<script src="js/modernizr-2.6.2.min.js"></script>
		<link
			rel="stylesheet"
			href="../mandalar/fontawesome-free-6.4.0-web/css/all.min.css"
		/>
		<link
			rel="stylesheet"
			href="https://cdn.jsdelivr.net/npm/mdbootstrap/css/bootstrap.min.css"
		/>
		<link
			rel="stylesheet"
			href="https://cdn.jsdelivr.net/npm/mdbootstrap/css/mdb.min.css"
		/>
		<link
			rel="stylesheet"
			href="https://cdn.jsdelivr.net/npm/mdbootstrap/css/mdb.min.css"
		/>
		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css"
		/>
		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css"
		/>
		<link
			rel="stylesheet"
			href="css/nav.css"
		/>
		<link
			rel="stylesheet"
			href="css/style2.css"
		/>
		<link
		rel="stylesheet"
		href="css/search.css"
	/>
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
			<div
				class="aa-header-bottom"
				style="background-color: #627e8b"
			>
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="aa-header-bottom-area">
								<!-- logo  -->
								<div class="aa-logo">
									<!-- Text based logo -->
									<img
										src="image/logoimg/logo-no-background.png"
										class="logo"
										width="200px"
										height="auto"
										alt="as"
									/>
									<!-- <a href="index.html">
					  <span class="fa fa-shopping-cart"></span>
					  <p>daily<strong>Shop</strong> <span>Your Shopping Partner</span></p>
					</a> -->
									<!-- img based logo -->
									<!-- <a href="index.html"><img src="img/logo.jpg" alt="logo img"></a> -->
								</div>
								<!-- / logo  -->
								<!-- cart box -->
								<div class="aa-cartbox">
									<div
										class="d-flex justify-content-end"
										style="width: 230px"
									>
										<a
											class="aa-cart-link heart"
											href="#"
										>
											<i class="fa-solid fa-heart"></i>
										</a>
										<a
											class="aa-cart-link bell"
											href="#"
										>
											<i class="fa-regular fa-bell"></i>
											<span
												class="aa-cart-notify"
												style="color: #4e9c81"
												>10</span
											>
										</a>
										<a
											class="aa-cart-link message"
											href="#"
										>
											<i class="fa-regular fa-message"></i>
										</a>

										<a
											class="aa-cart-link user"
											href="#"
										>
											<i class="fa-regular fa-user"></i>
										</a>
									</div>

									<div class="aa-cartbox-summary">
										<ul>
											<li>
												<a
													class="aa-cartbox-img"
													href="#"
													><img
														src="img/woman-small-2.jpg"
														alt="img"
												/></a>
												<div class="aa-cartbox-info">
													<h4><a href="#">Product Name</a></h4>
													<p>1 x $250</p>
												</div>
												<a
													class="aa-remove-product"
													href="#"
													><span class="fa fa-times"></span
												></a>
											</li>
											<li>
												<a
													class="aa-cartbox-img"
													href="#"
													><img
														src="img/woman-small-1.jpg"
														alt="img"
												/></a>
												<div class="aa-cartbox-info">
													<h4><a href="#">Product Name</a></h4>
													<p>1 x $250</p>
												</div>
												<a
													class="aa-remove-product"
													href="#"
													><span class="fa fa-times"></span
												></a>
											</li>
											<li>
												<span class="aa-cartbox-total-title"> Total </span>
												<span class="aa-cartbox-total-price"> $500 </span>
											</li>
										</ul>
										<a
											class="aa-cartbox-checkout aa-primary-btn"
											href="checkout.html"
											>Checkout</a
										>
									</div>
								</div>
								<!-- / cart box -->
								<!-- search box -->
								<div class="aa-search-box">
									<form action="">
										<input
											type="text"
											name=""
											id="search-box"
											placeholder="Search"
										/>
										<button
											type="submit"
											style="border-radius: 30px; background-color: #4e9c81"
										>
											<span class="fa fa-search"></span>
										</button>
									</form>
								</div>
								<!-- / search box -->
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- / header bottom  -->
		</header>
		<section>
			<div class="container overflow-hidden">
				<div class="flitter-tab">
					<div class="navbar">
						<ul class="nav-list">
							<li
								class="nav-item active"
								data-tab="0"
							>
								Tab 1
							</li>
							<li
								class="nav-item"
								data-tab="1"
							>
								Tab 2
							</li>
							<li
								class="nav-item"
								data-tab="2"
							>
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