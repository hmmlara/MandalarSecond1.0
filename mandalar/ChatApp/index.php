<?php
session_start();
if (isset($_SESSION['unique_id'])) {
  header("location: users.php");
}

if(isset($_POST['submit'])){
      //create img
      $filename=$_FILES['image']['name'];
      $filesize=$_FILES['image']['size'];
      $allowed_files=['jpg','png','jpeg','svg'];
      $temp_path=$_FILES['image']['tmp_name'];

      $fileinfo=explode('.',$filename);
      $filetype=end($fileinfo);
      $maxsize=2000000000;
      if(in_array($filetype,$allowed_files)){
          if($filesize<$maxsize)
          {
              move_uploaded_file($temp_path,'../image/user-profile/'.$filename);
          }else{
              echo "file size exceeds maximum allowed";
          }
      }else{
          echo "file type is not allowed";
      }
}

?>

<?php include_once "header.php"; ?>

<body>
  <div class="wrapper">
    <section class="form signup">
      <header>Realtime Chat App</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="field image d-flex  justify-content-center align-items-center">
          <!-- circle img -->

          <img src="../image/user-profile/mylove.jpg" class="img-circle mb-4" id="show_photo" alt="">

          <div class="d-flex  justify-content-center align-items-center cover-icon">
            <i class="fa-solid fa-camera fa-xl camera_icon" style="color: #4e9c81;"></i>
          </div>
          <!-- file hidden -->
          <div class="hideinputfile">
            <input type="file" name="image" id="inputphoto" name="" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
          </div>


        </div>
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            <label>First Name</label>
            <input type="text" name="fname" placeholder="First name" required>
          </div>
          <div class="field input">
            <label>Last Name</label>
            <input type="text" name="lname" placeholder="Last name" required>
          </div>
        </div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" id="passwordInput" placeholder="Enter your password" required>
          <i class="fas fa-eye eye"></i>
          
        </div>
        <div id="passwordRequirements" class="text-danger"></div>
        <div class="field button">
          <input type="submit" name="submit" value="Continue to Chat">
        </div>
      </form>
      <div class="link">Already signed up? <a href="login.php">Login now</a></div>
     
    </section>

  </div>
  <!-- <script src="/mandalar/mdbbootstrap/js/mdb.min.js"></script> -->
  <script src="javascript/jquery-3.7.0.min.js"></script>
  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/register_img.js"></script>
  <script src="javascript/login.js"></script>

</body>

</html>