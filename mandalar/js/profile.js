$(document).ready(function(){
  if($(".edituserimg").attr("src")!=="image/user-profile/mylove.jpg")
    {
      
      $("#cross").removeClass("d-none");
    }
    
    $(".edituserimg").on("click",function(){
     console.log($(this).attr("src"))
        $("#inputphoto").click();
    })
   
    

    $("input[name='image']").change(function () {
        var file = this.files[0];
        var reader = new FileReader();
        reader.onload = function (e) {
          $(".edituserimg").attr("src", e.target.result);
        };
        reader.readAsDataURL(file);
        $("#cross").removeClass("d-none");
      });

      $(".cancel-icon").on("click",function(){
        // $(".edituserimg").attr
        $(".edituserimg").attr("src", "image/user-profile/mylove.jpg");
        $("#cross").addClass("d-none");
        $("#inputphoto").val("");
      })


      $("#saveChangeBtn").click(function(e) {
        // Check if the first name input is empty
        if ($("#updateuser_fname").val() === "") {
            $("#updateuser_fname").addClass("border-bottom border-danger");
            e.preventDefault();
            
        } else {
            $("#updateuser_fname").removeClass("border-bottom border-danger");
        }

        // Check if the last name input is empty
        if ($("#updateuse_lrname").val() === "") {
            $("#updateuse_lrname").addClass("border-bottom border-danger");
            e.preventDefault();
        } else {
            $("#updateuse_lrname").removeClass("border-bottom border-danger");
        }
    });

    // if (!$('#updateuser_fname').hasClass('border-bottom border-danger') &&
    //     !$('#updateuse_lrname').hasClass('border-bottom border-danger')) {
    //     $('#editprofilemodel').modal('hide');
    // }
    //   if($(".edituserimg").attr()=="image/user-profile/mylove.jpg"){
    //     $("#cross").addClass("d-none");
    // }
})