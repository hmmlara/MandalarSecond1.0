<?php include_once "./nav.php"; ?>

<div class="container-xl">
    <!-- Category Component -->
    <section id="home" class="">
        <div class="container-xxl">
            <div class="row category-row">
                <div class="col-2 mb-1">
                    <label class="card radio-image">
                        <input type="radio" class="custom-control-input" name="category" value="Cars" />
                        <img src="image/Category/car-image.png" class="p-2 card-img-top category-image" alt="Cars" />
                    </label>
                </div>
                <div class="col-2 mb-1">

                    <label class="card radio-image">
                        <input type="radio" class="custom-control-input" name="category" value="Phones" />
                        <img src="image/Category/phone.png" class="card-img-top p-2 category-image" alt="Phones" />
                    </label>

                </div>
                <div class="col-2 col mb-1">
                    <label class="card radio-image">
                        <input type="radio" class="custom-control-input" name="category" value="Bikes" />
                        <img src="image/Category/bikes.png" class="card-img-top p-2 category-image" alt="Bikes" />
                    </label>
                </div>
                <div class="col-2 mb-1">
                    <label class="card radio-image">
                        <input type="radio" class="custom-control-input" name="category" value="Computers" />
                        <img src="image/Category/computer.png" class="card-img-top p-2 category-image"
                            alt="Computers" />
                    </label>
                </div>
                <div class="col-2 mb-1">
                    <label class="card radio-image">
                        <input type="radio" class="custom-control-input" name="category" value="Computers" />
                        <img src="image/Category/computer.png" class="card-img-top p-2 category-image"
                            alt="Computers" />
                    </label>
                </div>
                <div class="col-2 mb-1">
                    <label class="card radio-image">
                        <input type="radio" class="custom-control-input" name="category" value="Computers" />
                        <img src="image/Category/computer.png" class="card-img-top p-2 category-image"
                            alt="Computers" />
                    </label>
                </div>
            </div>

        </div>
    </section>





    <!-- Filter Component -->

    <section id="filter" class="">
        <div class="container-xxl">
            <div class="row flitter-row">
                <div class="col-4 mb-4">
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
                <div class="col-4 mb-4">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div id="priceSlider"></div>
                            <p id="priceValue" class="text-center">
                                0 - 1000
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-4 mb-4">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input status-radio" id="newCondition" name="condition" />
                                <label class="custom-control-label" for="newCondition">New</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input status-radio" id="usedCondition" name="condition" />
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

        <div class="row ">
            <div class="col-md-4 col-sm-6  col-lg-3 mb-4 ">
                <div class="card product-card-by-nay">
                    <img src="image/products/product-image.jfif" class="card-img-top product-image" alt="Product 1" />
                    <div class="card-body">
                        <h5 class="card-title">Product 1</h5>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <img src="image/user-profile/mylove.jpg" class="rounded-circle profile-on-card" alt="Seller 1" />
                                <span class="ml-2 card-text">Seller 1</span>
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






        </div>
    </section>
</div>
<?php include_once "./footer.php"; ?>