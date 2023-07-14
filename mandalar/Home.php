<?php include_once "./nav.php"; ?>
        <div class="container-xl"   >
            <!-- Category Component -->
            <section id="home" class="">
                <div class="container-xxl">
                    <div class="row">
                        <div class="col-3 mb-4">
                                <label class="card radio-image">
                                    <input type="radio" class="custom-control-input" name="category" value="Cars" />
                                    <img src="image/Category/car-image.png" class="p-2 card-img-top category-image" alt="Cars" />
                                </label>
                        </div>
                        <div class="col-3 mb-4">
                            
                                <label class="card radio-image">
                                    <input type="radio" class="custom-control-input" name="category" value="Phones" />
                                    <img src="image/Category/phone.png" class="card-img-top p-2 category-image" alt="Phones" />
                                </label>
                            
                        </div>
                        <div class="col-3 col mb-4">
                                <label class="card radio-image">
                                    <input type="radio" class="custom-control-input" name="category" value="Bikes" />
                                    <img src="image/Category/bikes.png" class="card-img-top p-2 category-image" alt="Bikes" />
                                </label>
                        </div>
                        <div class="col-3 mb-4">
                                <label class="card radio-image">
                                    <input type="radio" class="custom-control-input" name="category" value="Computers" />
                                    <img src="image/Category/computer.png" class="card-img-top p-2 category-image" alt="Computers" />
                                </label>
                        </div>
                    </div>
               
                </div>
            </section>
            
            
            
            

            <!-- Filter Component -->

            <section id="filter" class="py-3">
                <div class="container-xxl">
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="card custom-card">
                                <div class="card-body">
                                    <select class="browser-default custom-select">
									<option value="">Select Brand</option>
									<option value="1">Brand 1</option>
									<option value="2">Brand 2</option>
									<option value="3">Brand 3</option>
								</select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card custom-card">
                                <div class="card-body">
                                    <div id="priceSlider"></div>
                                    <p id="priceValue" class="text-center">
                                        0 - 1000
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card custom-card">
                                <div class="card-body">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="newCondition" name="condition"  />
                                        <label class="custom-control-label" for="newCondition">New</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="usedCondition" name="condition" />
                                        <label class="custom-control-label" for="usedCondition">Used</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Product Cards -->
            <section id="products" class="">
                <div class="container-xxl">
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="image/products/product-image.jfif" class="card-img-top product-image" alt="Product 1" />
                                <div class="card-body">
                                    <h5 class="card-title">Product 1</h5>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <img src="image/profiles/Profile.png" class="rounded-circle profile-on-card" alt="Seller 1"  />
                                            <span class="ml-2 card-text">Seller 1</span>
                                        </div>
                                        <div>
                                            <button class="btn btn-primary view-details-btn">
											View Details
										</button>
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
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="image/products/product-image2.jfif" class="card-img-top product-image" alt="Product 2" />
                                <div class="card-body">
                                    <h5 class="card-title">Product 2</h5>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <img src="image/user-profile/99b847b47e05626961b6ae115feca94c.jpg" class="rounded-circle profile-on-card" alt="Seller 2" />
                                            <span class="ml-2 card-text">Seller 2</span>
                                        </div>
                                        <div>
                                            <button class="btn btn-primary view-details-btn">
											View Details
										</button>
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
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="image/products/product-image3.jfif" class="card-img-top product-image" alt="Product 3" />
                                <div class="card-body">
                                    <h5 class="card-title">Product 3</h5>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <img src="image/user-profile/mylove.jpg" class="rounded-circle profile-on-card" alt="Seller 3"  />
                                            <span class="ml-2 card-text">Seller 3</span>
                                        </div>
                                        <div>
                                            <button class="btn btn-primary view-details-btn">
											View Details
										</button>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <i class="far fa-heart mr-2"></i>
                                        <span class="reaction-count">8</span>
                                        <i class="far fa-plus-square ml-3"></i>
                                        <span class="save-count">12</span>
                                        <i class="far fa-eye ml-3"></i>
                                        <span class="view-count">20</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
<?php include_once "./footer.php"; ?>