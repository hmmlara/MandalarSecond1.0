<?php 
include_once "layouts/header.php";
include_once "../controller/nrcController.php";
include_once "../controller/userController.php";
$getUserName=new UserController();
$getAllNRCusers=new NrcController();
$getNRCusers=$getAllNRCusers->getAll();

foreach ($getNRCusers as $key => $user) {
    $front_nrc= $user["front_nrc"];
    $back_nrc= $user["back_nrc"];
    $nrc_number= $user["nrc"];
    $date= $user["date"];
}

$userid=$_GET["userid"];

$getName=$getUserName->UserInfo($userid);
foreach ($getName as $key => $Name) {
    $userName=$Name['fname']." ".$Name["lname"];
    # code...
}



?>
<main class="content">
				<div class="container-fluid  shadow-lg p-3 mb-5 bg-white rounded">
                    <a href=""></a>

					<div class="mb-3 mx-2">
						<h1 class="h3 d-inline align-middle">Checking User NRC Table</h1>
						
						
					</div>
                   
                        <div class="container d-flex justify-content-center align-items-center ">
                            <div class="row bg-white ">
                                <h4 class="mt-4 mx-3">Name : <?php echo $userName; ?></h4>
                                <h4 class="my-3 mx-3">id : <?php echo $userid; ?></h4>
                                <div class="col-md-12 d-flex  justify-content-around">
                                    <div class="front_img  col-md-6">
                                        <h5 class="my-3 mx-2">Front NRC Image</h5>
                                        <!-- <label for="" class="col-md-12"></label> -->
                                        <img src="../image/user_nrc/front_nrc/<?php echo $front_nrc ?>" alt=" " class="px-2" width="100%" >
                                    </div>
                                    <div class="front_img col-md-6">
                                        <h5 class="my-3 mx-2">Back NRC Image</h5>
                                        <!-- <label for="" class="col-md-12"></label> -->
                                        <img src="../image/user_nrc/front_nrc/<?php echo $front_nrc ?>" alt=" "  class="px-2" width="100%">
                                    </div>
                                </div>
                                <div class="col-md-12 my-5 mx-2">
                                    <button class="btn btn-success col-md-1" id="acceptNRC">Accept</button>
                                    <button class="btn btn-danger  col-md-1" id="deleteNRC">Delete</button>
                                </div>
                                
                                
                            </div>
                        </div>
                    
                    
				</div>
</main>
<script src="../js/jquery-3.7.0.min.js"></script>
<script src="js/nrc_checking.js"></script>


<?php
include_once "layouts/footer.php";
?>