$(document).ready(function () {
  // if ($("#show_photo").attr("src") !== "image/user-profile/mylove.jpg") {
  //   console.log("Equal");
  //   $('.cancel-icon').removeClass("d-none")
  //   $(".cancel-icon").addClass("Hello")
  // }

  



  // $(".cancel-icon").on("click", function (e) {
  //   if ($("#show_photo").attr("src") == "image/user-profile/mylove.jpg") {
  //     $('.cancel-icon').addClass("d-none")
  //     output=$("#inputphoto").val()
  //     console.log(output)
      
  //   }
  //   $('.cancel-icon').removeClass("d-none")
  //   console.log("Clicked");
  //   e.preventDefault();
  // });

  $(document).on("click", ".camera_icon", function () {
    $("input[name='image']").click();

    
  });

  $("input[name='image']").change(function () {
    var file = this.files[0];
    var reader = new FileReader();
    reader.onload = function (e) {
      $("#show_photo").attr("src", e.target.result);
    };
    reader.readAsDataURL(file);
    $('#cross').removeClass('d-none');
  });

   $("#inputphoto").on('change', function () {
    img.src = URL.createObjectURL(input.files[0]);

    
  //   console.log("change");
  //   if ($("#show_photo").attr("src") !== "image/user-profile/mylove.jpg") {
  //     $('#cross').removeClass("d-none")
  //     $('.cancel-icon').removeClass("d-none")
  //     console.log("Hello")
  //     output=$("#inputphoto").val()
  //      console.log(output)
  //     }else{
  //       $('#cross').removeClass("d-none")
  //     $('.cancel-icon').removeClass("d-none")
  //     console.log("Hello")
  //     output=$("#inputphoto").val()
  //      console.log(output)
  //      $("#inputphoto").val(" ")
  //     }

   });

  

  $(".cancel-icon").on("click", function () {
    $("#show_photo").attr("src", "image/user-profile/mylove.jpg");
  });

  $("#passwordInput").on("focus keyup", function () {
    var password = $("#passwordInput").val();
    var message =
      "The password must contain both an uppercase letter, lowercase letter, one number, and be 6 to 8 characters long.";
    console.log(password.length);
    // Check for uppercase letter and lowercase letter
    if (/(?=.*[A-Z])/.test(password) && /(?=.*[a-z])/.test(password)) {
      message = "The password must contain at least one number and be 6 to 8 characters long.";
      // Check for number
      if (/(?=.*\d)/.test(password)) {
        message = "Password must be 8 characters long.";
      } else {
        message = "The password must contain at least one number and be 6 to 8 characters long.";
      }
    }
    $("#passwordRequirements").text(message);
  }).on("blur", function () {
    $("#passwordRequirements").empty();
  });

 

  //check password length
  var password = $("#pass").val();
  if (password.length >= 6) {
    console.log('It\'s over');
    $("#passwordRequirements").empty();
  }
});