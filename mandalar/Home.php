<?php include_once "./nav.php";
include_once "./model/category.php";


$categorys = $category_model->getCategory();

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
        position: relative;
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
    
    .image-previews {
        display: flex;
    }
</style>

<div class="container-xl">
    <!-- Category Component -->
    <section id="home" class="">
        <div class="container-xxl">
            <div class="row category-row">
                <?php
                foreach($categorys as $category){

                ?>
                    <div class="col-2 mb-1">
                        <label class="card radio-image">
                        <input type="radio" class="custom-control-input" name="category" value="<?php echo $category["
                            name"] ?>" />
                        <img src="<?php echo $category[" image"] ?>" class="p-2 card-img-top category-image" alt="
                        <?php echo $category["image"] ?>" />
                    </label>
                    </div>
                    <?php
                }
                ?>

            </div>

        </div>
    </section>





    <!-- Filter Component -->

    <section id="filter" class="">
        <div class="container-xxl">
            <div class="row flitter-row">
                <div class="col-sm-4 col-6 mb-4">
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
                <div class="col-sm-4 mb-4 sm-hide">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div id="priceSlider"></div>
                            <p id="priceValue" class="text-center">
                                0 - 1000
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 mb-4 col-6">
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
                <div class="col-sm-4 mb-4  sm-show ">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div id="priceSlider2"></div>
                            <p id="priceValue2" class="text-center">
                                0 - 1000
                            </p>
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
    <!-- Post -->
    <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3">
                        <div class="col-md-12">
                            <div class="btn-group">

                                <input type="radio" class="btn-check" name="options" id="option2" autocomplete="off" />
                                <label class="btn btn-secondary" for="option2">New</label>

                                <input type="radio" class="btn-check" name="options" id="option3" autocomplete="off" />
                                <label class="btn btn-secondary" for="option3">Used</label>
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-4">
                            <div class="form-outline">
                                <input type="text" class="form-control" id="validationDefault01" required />
                                <label for="validationDefault01" class="form-label">Item Name</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-outline">
                                <input type="text" class="form-control" id="validationDefault02" required />
                                <label for="validationDefault02" class="form-label">Brand</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-outline">
                                <input type="number" class="form-control" id="validationDefault02" required />
                                <label for="validationDefault02" class="form-label">Price</label>
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-6">
                            <select class="custom-select">
                                <option value="option1">Phone</option>
                                <option value="option2">Computer</option>
                                <option value="option3">Car</option>
                                <!-- Add more options here as needed -->
                            </select>

                        </div>
                        <div class="col-md-6">
                            <select class="custom-select">
                                <option value="option1">Choice Category fist</option>

                                <!-- Add more options here as needed -->
                            </select>

                        </div>
                        <hr>

                        <div class="col-md-12 form-outline">
                            <textarea class="form-control " style="height:100px" id="validationTextarea" placeholder="Required example textarea" required></textarea>
                            <label for="validationTextarea" class="form-label">Textarea</label>
                            <div class="invalid-feedback">Please enter a message in the textarea.</div>
                        </div>

                        <hr>
                        <div class="col-md-12">
                            <label class="form-label">Upload Images</label>

                            <div id="imagePreviews" class="image-previews">
                                <div class="image-selector">
                                    <label for="imageUpload" class="plus-sign" id="imageLabel">+</label>
                                    <input type="file" id="imageUpload" class="form-control" accept="image/*" multiple />
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- model end -->
    <script src="js/post.js"></script>
    <?php include_once "./footer.php"; ?>