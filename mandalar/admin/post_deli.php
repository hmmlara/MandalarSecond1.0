<?php include_once "layouts/header.php"; ?>
<?php

include_once "../controller/cityController.php";
$city_controller= new cityController();
$city_list=$city_controller->getCityList();
?>
            <link rel="stylesheet" href="css/post-deli.css">
			<main class="content">
				<div class="container-fluid p-0">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Post Delivery</h1>
						<div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="" class="form-label">Post</label>
                                    <select name="" id="post" class="form-select">
                                        <option value="all">All</option>
                                        <option value="none">None</option>
                                        <option value="seller_waiting">Seller Waiting</option>
                                        <option value="waiting">Waiting</option>
                                        <option value="take_waiting">Take Waiting</option>
                                        <option value="go_take">Go Take</option>
                                        <option value="take">Take</option>
                                        <option value="send_waiting">Send Waiting</option>
                                        <option value="go_send">Go Send</option>
                                        <option value="sold_out">Sold Out</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="" class="form-label">City</label>
                                    <select name="" id="city" class="form-select">
                                        <option value="all">All</option>
                                        <?php foreach ($city_list as $city) { ?>
                                        <option value="<?php echo $city['id']; ?>"><?php echo $city['name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                            </div>
                            <div class="row">
                                <div class="post-table">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th class="check block">select</th>
                                            <th>Image</th>
                                            <th>item name</th>
                                            <th>price</th>
                                            <th>city</th>
                                            <th>view</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td class="check block"><input type="checkbox" name="" id=""></td>
                                            <td><img src="../image/user-profile/mylove.jpg" alt="" height="50px"></td>
                                            <td>bicycle</td>
                                            <td>100</td>
                                            <td>ChanMyaTharZi</td>
                                            <td><button class="btn btn-info">view</button></td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><img src="../image/user-profile/mylove.jpg" alt="" height="50px"></td>
                                            <td>bicycle</td>
                                            <td>100</td>
                                            <td>ChanMyaTharZi</td>
                                            <td><button class="btn btn-info">view</button></td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><img src="../image/user-profile/mylove.jpg" alt="" height="50px"></td>
                                            <td>bicycle</td>
                                            <td>100</td>
                                            <td>ChanMyaTharZi</td>
                                            <td><button class="btn btn-info">view</button></td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><img src="../image/user-profile/mylove.jpg" alt="" height="50px"></td>
                                            <td>bicycle</td>
                                            <td>100</td>
                                            <td>ChanMyaTharZi</td>
                                            <td><button class="btn btn-info">view</button></td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><img src="../image/user-profile/mylove.jpg" alt="" height="50px"></td>
                                            <td>bicycle</td>
                                            <td>100</td>
                                            <td>ChanMyaTharZi</td>
                                            <td><button class="btn btn-info">view</button></td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><img src="../image/user-profile/mylove.jpg" alt="" height="50px"></td>
                                            <td>bicycle</td>
                                            <td>100</td>
                                            <td>ChanMyaTharZi</td>
                                            <td><button class="btn btn-info">view</button></td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td><input type="checkbox" name="" id=""></td>
                                            <td><img src="../image/user-profile/mylove.jpg" alt="" height="50px"></td>
                                            <td>bicycle</td>
                                            <td>100</td>
                                            <td>ChanMyaTharZi</td>
                                            <td><button class="btn btn-info">view</button></td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                                </div>
                            </div>
                            <div class="row mt-2" id="save-btn-container" style="display:none">
                                <div class="col-md-7"></div>
                                <div class="col-md-3"><strong>Total Select : <span>5</span></strong></div>
                                <div class="col-md-2"><button class="btn btn-success">Save</button></div>
                            </div>
                        </div>
						
					</div>

				</div>
			</main>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="js/post-deli.js"></script>
<?php include_once "layouts/footer.php"; ?>