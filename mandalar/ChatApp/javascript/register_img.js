// $(document).ready(function(){
//     $('.camera_icon').on("click",function(){
//         console.log("work")
//         $("input[name='image']").click();
//     })
    
//     $("#inputphoto").on("change",function(){
//         console.log("Hello");
//     })
// })

$(document).ready(function() {

    $(document).on("click", ".camera_icon", function() {
      console.log("work");
      $("input[name='image']").click();
    });
  
    $("#inputphoto").on("click", function() {
      console.log("Hello");
    });

    $("#click").on("click",function(){
        console.log("itit")
    })
  });