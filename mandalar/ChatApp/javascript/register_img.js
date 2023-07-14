// $(document).ready(function(){
//     $('.camera_icon').on("click",function(){
//         console.log("work")
//         $("input[name='image']").click();
//     })

//     $("#inputphoto").on("change",function(){
//         console.log("Hello");
//     })
// })

$(document).ready(function () {
  $(document).on("click", ".camera_icon", function () {
    console.log("work");
    $("input[name='image']").click();
  });

  $("input[name='image']").change(function () {
    var file = this.files[0];
    var reader = new FileReader();
    reader.onload = function (e) {
      $("#show_photo").attr("src", e.target.result);
    };
    reader.readAsDataURL(file);
  });

  $("#passwordInput").on("focus keyup", function () {
    password = $("#passwordInput").val();
    let message =
      "The password must contain at least one uppercase letter, one lowercase letter, one number, and be 6 to 8 characters long.";
      
    // Check for uppercase letter
    if (/(?=.*[A-Z])/.test(password)) {
      // Check for lowercase letter
      if (/(?=.*[a-z])/.test(password)) {
        // Check for number
        if (/(?=.*\d)/.test(password)) {
          message = "Password must 8 characters long.";
        } else {
          message =
            "The password must contain at least  one number, and be 6 to 8 characters long.";
        }
      } else {
        message =
          "The password must contain at least one lowercase letter, one number, and be 6 to 8 characters long.";
      }
    }
    $("#passwordRequirements").text(message);
  }).on("blur",function(){
    $("#passwordRequirements").empty();
  });
 
});
