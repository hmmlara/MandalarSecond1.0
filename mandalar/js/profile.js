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

    $(".fimage-container").click(function() {
      $("#selfrontimg").click();
    });

    $("#selfrontimg").on("change", function(event) {
      $("#fplus").addClass("d-none");
      const selectedFile = event.target.files[0];
      if (selectedFile) {
        const reader = new FileReader();
        reader.onload = function() {
          const imageUrl = reader.result;
          $(".fimage-container img").attr("src", imageUrl);
        };
        reader.readAsDataURL(selectedFile);
      }
    });
  
    // Trigger the file input with id "selbackimg" when clicking on the "bimage-container" div
    $(".bimage-container").click(function() {
      $("#selbackimg").click();
    });

    $("#selbackimg").on("change", function(event) {
      $("#bplus").addClass("d-none");
      const selectedFile = event.target.files[0];
      if (selectedFile) {
        const reader = new FileReader();
        reader.onload = function() {
          const imageUrl = reader.result;
          $(".bimage-container img").attr("src", imageUrl);
        };
        reader.readAsDataURL(selectedFile);
      }
    });
    

    $("#NRCbtn").on("click",function(e){
        if($("#form12").val()=="")
        {
          $(".red").addClass("border border-danger");
          e.preventDefault();
        }
        $("#verify").addClass("d-none")
        $("#wait").removeClass("d-none")
       
    })

    $("#canceljs").on("click",function()
    {
      location.reload();
    })
})