<?php

include_once "./controller/postController.php";
$user_id=3;
$id=$_GET['id'];
$post_controller=new PostController();
$posts=$post_controller->getPost($id);
?>


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
		<link
			rel="stylesheet"
			href="css/product-detail.css"
		/>
		<link
			rel="stylesheet"
			href="css/products.css"
		/>
		<link
			rel="stylesheet"
			href="css/comment.css"
		/>
	
		<script src="js/modernizr-2.6.2.min.js"></script>
		<link rel="stylesheet" href="../mandalar/fontawesome-free-6.4.0-web/css/all.min.css" />
		<link rel="stylesheet" href="/mdbbootstrap/css/mdb.min.css">
		 <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mdbootstrap/css/bootstrap.min.css" /> -->
		<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mdbootstrap/css/mdb.min.css" /> -->
		<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mdbootstrap/css/mdb.min.css" />  -->
		 <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" /> -->
		<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" />  -->
		<link rel="stylesheet" href="css/nav.css">
		<link rel="stylesheet" href="css/style2.css">
		<title>Product Detail Page</title>
	</head>
	<body>
	<div id="loader"></div>

<div id="page">
	<header id="aa-header">
		<!-- start header top  -->
		
		<!-- / header top  -->
	
		<!-- start header bottom  -->
		<div class="aa-header-bottom mb-4"  style="background-color: #627E8B; ">
		  <div class="container">
			<div class="row" >
			  <div class="col-md-12">
				<div class="aa-header-bottom-area">
				  <!-- logo  -->
				  <div class="aa-logo">
					<!-- Text based logo -->
					<img src="image/logoimg/logo-no-background.png" class="logo" width="200px" height="auto" alt="as">
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
					<div class=" d-flex justify-content-end" style="width: 230px;">
						<a class="aa-cart-link heart" href="#">
							<i class="fa-solid fa-heart" ></i>
						  </a>
						  <a class="aa-cart-link bell" href="#">
							<i class="fa-regular fa-bell "></i>
							<span class="aa-cart-notify" style="color: #4e9c81;">10</span>
						</a>
						  <a class="aa-cart-link message" href="#">
							<i class="fa-regular fa-message "></i>
						  </a>
					
						  <a class="aa-cart-link user" href="#">
							<i class="fa-regular fa-user"></i>
						  </a>
					</div>
				
					<div class="aa-cartbox-summary">
					  <ul>
						<li>
						  <a class="aa-cartbox-img" href="#"><img src="img/woman-small-2.jpg" alt="img"></a>
						  <div class="aa-cartbox-info">
							<h4><a href="#">Product Name</a></h4>
							<p>1 x $250</p>
						  </div>
						  <a class="aa-remove-product" href="#"><span class="fa fa-times"></span></a>
						</li>
						<li>
						  <a class="aa-cartbox-img" href="#"><img src="img/woman-small-1.jpg" alt="img"></a>
						  <div class="aa-cartbox-info">
							<h4><a href="#">Product Name</a></h4>
							<p>1 x $250</p>
						  </div>
						  <a class="aa-remove-product" href="#"><span class="fa fa-times"></span></a>
						</li>                    
						<li>
						  <span class="aa-cartbox-total-title">
							Total
						  </span>
						  <span class="aa-cartbox-total-price">
							$500
						  </span>
						</li>
					  </ul>
					  <a class="aa-cartbox-checkout aa-primary-btn" href="checkout.html">Checkout</a>
					</div>
				  </div>
				  <!-- / cart box -->
				  <!-- search box -->
				  <div class="aa-search-box">
					<form action="">
					  <input type="text" name="" id="search-box" placeholder="Search" >
					  <button type="submit" style="border-radius: 30px; background-color: #4e9c81;"><span class="fa fa-search"></span></button>
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

		<main>
			<div class="container my-5">
				<div class="row">
					<?php foreach ($posts as $post) {
						$images = glob('image/post_img/'.$post['photo_folder'].'/*.{jpg,png,gif}', GLOB_BRACE);
					?>
					<div class="col-md-6">
						<div class="swiper-container">
							<div class="swiper-wrapper">
								<?php 
									foreach ($images as $image) {
								?>
								<div class="swiper-slide card shadow">
									<img
										src="<?php echo $image;?>"
										alt="Product Image 1"
									/>
								</div>
								<?php } ?>
								
							</div>
							<div class="swiper-pagination"></div>
							<div class="swiper-button-next text-black"></div>
							<div class="swiper-button-prev text-black"></div>
						</div>
					</div>
					<div class="col-md-6 ps-5">
						<div class="product-info">
							<h1><?php echo $post['item'];  ?></h1>
							<p class="text-muted">Category: <?php echo $post['cate_name'];  ?></p>
							<p class="text-muted">Sub Category: <?php echo $post['sub_name'];  ?></p>
							<p class="brand">Brand: <?php echo $post['brand'];  ?></p>
							<p class="product-status">Status: <?php echo $post['new_used'];  ?></p>
							<h2>mmk <?php echo $post['price'];  ?></h2>
							<p>
							<?php echo $post['description'];  ?>
							</p>
							<div class="product-buttons">
								<button class="btn btn-secondary" id="product-like" data-post-id="<?php echo $id; ?>" data-user-id="<?php echo $user_id; ?>">
									<i class="fas fa-thumbs-up"></i> 20
								</button>
								<button class="btn btn-secondary comment-btn">
									<i class="fas fa-comment"></i> Comment
								</button>
								<button class="btn btn-secondary">
									<i class="fas fa-heart"></i> 10
								</button>
								<button class="btn btn-primary">Add to Cart</button>
							</div>
						</div>
					</div>
					<?php }?>
				</div>
				<div class="comment-section d-none">
					<h3>Comments</h3>
					<div class="comments">
						<div class="comment">
							<div class="d-flex">
								<img
									src="image/profiles/Profile.png"
									class="profile-picture-comment"
									alt="User 1"
									style="width: max-content"
								/>
								<div>
									<div class="comment-content">
										<div class="comment-details">
											<span class="comment-author">User 1</span>
											<span class="comment-date">Posted on July 12, 2023</span>
										</div>
										Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut
										nec semper mauris, at convallis est.
									</div>
									<div class="comment-actions">
										<button class="btn btn-link btn-sm">Like</button>
										<button class="btn btn-link btn-sm">Reply</button>
									</div>
								</div>
							</div>

							<div class="replies">
								<div class="d-flex">
									<img
										src="image/profiles/Profile.png"
										class="profile-picture-comment"
										alt="User 1"
										style="width: max-content"
									/>
									<div>
										<div class="comment-content">
											<div class="comment-details">
												<span class="comment-author">User 1</span>
												<span class="comment-date"
													>Posted on July 12, 2023</span
												>
											</div>
											Lorem ipsum dolor sit amet, consectetur adipiscing elit.
											Ut nec semper mauris, at convallis est.
										</div>
										<div class="comment-actions">
											<button class="btn btn-link btn-sm">Like</button>
											<button class="btn btn-link btn-sm">Reply</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="comment">
							<div class="d-flex">
								<img
									src="image/profiles/Profile.png"
									class="profile-picture-comment"
									alt="User 1"
									style="width: max-content"
								/>
								<div>
									<div class="comment-content">
										<div class="comment-details">
											<span class="comment-author">User 1</span>
											<span class="comment-date">Posted on July 12, 2023</span>
										</div>
										Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut
										nec semper mauris, at convallis est.
									</div>
									<div class="comment-actions">
										<button class="btn btn-link btn-sm">Like</button>
										<button class="btn btn-link btn-sm">Reply</button>
									</div>
								</div>
							</div>

							<div class="replies">
								<div class="comment">
									<div class="d-flex">
										<img
											src="image/profiles/Profile.png"
											class="profile-picture-comment"
											alt="User 1"
											style="width: max-content"
										/>
										<div>
											<div class="comment-content">
												<div class="comment-details">
													<span class="comment-author">User 1</span>
													<span class="comment-date"
														>Posted on July 12, 2023</span
													>
												</div>
												Lorem ipsum dolor sit amet, consectetur adipiscing elit.
												Ut nec semper mauris, at convallis est.
											</div>
											<div class="comment-actions">
												<button class="btn btn-link btn-sm">Like</button>
												<button class="btn btn-link btn-sm">Reply</button>
											</div>
										</div>
									</div>
									<div class="replies">
										<div class="comment">
											<div class="d-flex">
												<img
													src="image/profiles/Profile.png"
													class="profile-picture-comment"
													alt="User 1"
													style="width: max-content"
												/>
												<div>
													<div class="comment-content">
														<div class="comment-details">
															<span class="comment-author">User 1</span>
															<span class="comment-date"
																>Posted on July 12, 2023</span
															>
														</div>
														Lorem ipsum dolor sit amet, consectetur adipiscing
														elit. Ut nec semper mauris, at convallis est.
													</div>
													<div class="comment-actions">
														<button class="btn btn-link btn-sm">Like</button>
														<button class="btn btn-link btn-sm">Reply</button>
													</div>
												</div>
												<div class="replies"></div>
											</div>
										</div>
										<div class="comment">
											<div class="d-flex">
												<img
													src="image/profiles/Profile.png"
													class="profile-picture-comment"
													alt="User 1"
													style="width: max-content"
												/>
												<div>
													<div class="comment-content">
														<div class="comment-details">
															<span class="comment-author">User 1</span>
															<span class="comment-date"
																>Posted on July 12, 2023</span
															>
														</div>
														Lorem ipsum dolor sit amet, consectetur adipiscing
														elit. Ut nec semper mauris, at convallis est.
													</div>
													<div class="comment-actions">
														<button class="btn btn-link btn-sm">Like</button>
														<button class="btn btn-link btn-sm">Reply</button>
													</div>
												</div>
												<div class="replies"></div>
											</div>
										</div>
										<div class="comment">
											<div class="d-flex">
												<img
													src="image/profiles/Profile.png"
													class="profile-picture-comment"
													alt="User 1"
													style="width: max-content"
												/>
												<div>
													<div class="comment-content">
														<div class="comment-details">
															<span class="comment-author">User 1</span>
															<span class="comment-date"
																>Posted on July 12, 2023</span
															>
														</div>
														Lorem ipsum dolor sit amet, consectetur adipiscing
														elit. Ut nec semper mauris, at convallis est.
													</div>
													<div class="comment-actions">
														<button class="btn btn-link btn-sm">Like</button>
														<button class="btn btn-link btn-sm">Reply</button>
													</div>
												</div>
												<div class="replies"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<form class="comment-form">
						<div class="form-group">
							<label for="comment-input">Add a comment</label>
							<textarea
								class="form-control"
								id="comment-input"
								rows="3"
							></textarea>
						</div>
						<button
							type="submit"
							class="btn btn-primary"
						>
							Submit
						</button>
					</form>
				</div>
			</div>

			<div class="related-products my-5">
				<div class="container">
					<h3 class="mb-4">Related Products</h3>
					<div
						class="position-relative related-products-slider overflow-hidden"
					>
						<div class="swiper-wrapper">
							<div class="swiper-slide">
								<div class="card shadow">
									<img
										src="image/products/product-image2.jfif"
										class="card-img-top product-image"
										alt="Product 2"
									/>
									<div class="card-body">
										<h5 class="card-title">Product 2</h5>
										<div
											class="d-flex justify-content-between align-items-center"
										>
											<div class="d-flex align-items-center">
												<img
													src="image/profiles/seller1.jpg"
													class="rounded-circle profile-on-card"
													alt="Seller 1"
												/>
												<span class="ml-2 card-text">Seller 1</span>
											</div>
											<div>
												<p class="card-text view-details-btn">300000mmk</p>
											</div>
										</div>
										<div class="mt-3">
											<i class="far fa-heart mr-2"></i>
											<span class="reaction-count">5</span>
											<i class="far fa-plus-square ml-3"></i>
											<span class="save-count">8</span>
											<i class="far fa-eye ml-3"></i>
											<span class="view-count">30</span>
										</div>
									</div>
								</div>
							</div>
							<div class="swiper-slide">
								<div class="card shadow">
									<img
										src="image/products/product-image2.jfif"
										class="card-img-top product-image"
										alt="Product 2"
									/>
									<div class="card-body">
										<h5 class="card-title">Product 2</h5>
										<div
											class="d-flex justify-content-between align-items-center"
										>
											<div class="d-flex align-items-center">
												<img
													src="image/profiles/seller2.jpg"
													class="rounded-circle profile-on-card"
													alt="Seller 2"
												/>
												<span class="ml-2 card-text">Seller 2</span>
											</div>
											<div>
												<p class="card-text view-details-btn">300000mmk</p>
											</div>
										</div>
										<div class="mt-3">
											<i class="far fa-heart mr-2"></i>
											<span class="reaction-count">5</span>
											<i class="far fa-plus-square ml-3"></i>
											<span class="save-count">8</span>
											<i class="far fa-eye ml-3"></i>
											<span class="view-count">30</span>
										</div>
									</div>
								</div>
							</div>
							<div class="swiper-slide">
								<div class="card shadow">
									<img
										src="image/products/product-image2.jfif"
										class="card-img-top product-image"
										alt="Product 2"
									/>
									<div class="card-body">
										<h5 class="card-title">Product 2</h5>
										<div
											class="d-flex justify-content-between align-items-center"
										>
											<div class="d-flex align-items-center">
												<img
													src="image/profiles/seller3.jpg"
													class="rounded-circle profile-on-card"
													alt="Seller 3"
												/>
												<span class="ml-2 card-text">Seller 3</span>
											</div>
											<div>
												<p class="card-text view-details-btn">300000mmk</p>
											</div>
										</div>
										<div class="mt-3">
											<i class="far fa-heart mr-2"></i>
											<span class="reaction-count">5</span>
											<i class="far fa-plus-square ml-3"></i>
											<span class="save-count">8</span>
											<i class="far fa-eye ml-3"></i>
											<span class="view-count">30</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="swiper-pagination"></div>
						<div class="swiper-button-next"></div>
						<div class="swiper-button-prev"></div>
					</div>
				</div>
			</div>
		</main>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
		<!-- <script src="js/loader.js"></script> -->
		<script src="js/product-detail.js"></script>
		<script>
			var swiper = new Swiper(".swiper-container", {
				pagination: {
					el: ".swiper-pagination",
				},
				effect: "cards",
				cardsEffect: {
					// ...
				},
				loop: true,
				navigation: {
					nextEl: ".swiper-button-next",
					prevEl: ".swiper-button-prev",
				},
			});

			var relatedProductsSwiper = new Swiper(".related-products-slider", {
				slidesPerView: 3,
				spaceBetween: 20,
				navigation: {
					nextEl: ".swiper-button-next",
					prevEl: ".swiper-button-prev",
				},
				breakpoints: {
					375: {
						slidesPerView: 1,
					},
					768: {
						slidesPerView: 2,
					},
					992: {
						slidesPerView: 3,
					},
				},
				effect: "coverflow",
				coverflowEffect: {
					rotate: 10,
					slideShadows: false,
				},
			});

			const commentBtn = document.querySelector(".comment-btn");
			const commentSection = document.querySelector(".comment-section");

			commentBtn.addEventListener("click", function () {
				commentSection.classList.toggle("d-none");
			});

			const comments = document.querySelectorAll(".comment");
			comments.forEach(function (comment) {
				const likeBtn = comment.querySelector(".comment-like");
				const replyBtn = comment.querySelector(".comment-reply");

				// likeBtn.addEventListener("click", function () {
				// 	// Perform like action
				// });

				// replyBtn.addEventListener("click", function () {
				// 	// Perform reply action
				// });
			});

			let product_like=document.getElementById("product-like");
			product_like.addEventListener("click", function () {
				console.log("clicked");
				this.classList.toggle("btn-secondary");
    			this.classList.toggle("btn-primary");
			});
		</script>
	</body>
</html>
