$(document).ready(function () {
  from_id = $("#from_id").val();
  to_id = $("#to_id").val();
  followcon = $("#followcon").val();
  console.log(followcon);
  if (followcon == "true") {
    $("#unfollow").removeClass("d-none");
  } else {
    $("#follow").removeClass("d-none");
  }


  $("#follow").on("click", function (e) {
    console.log("follow");
    $(this).addClass("d-none");
    state = 1;
    $.ajax({
      type: "POST",
      url: "checkfollow.php",
      data: { from_id: from_id, to_id: to_id, state: state },
      success: function (response) {
        console.log(response);
      },
    });
    $("#unfollow").removeClass("d-none");
    e.preventDefault();
  });

  
  $("#unfollow").on("click", function (e) {
    $(this).addClass("d-none");
    $("#follow").removeClass("d-none");
    state = 0;
    $.ajax({
      type: "GET",
      url: "getAllFollow.php",
      dataType: "json",
      success: function (response) {
        for (let i = 0; i < response.length; i++) {
          const obj = response[i];
          if (from_id == obj.from_id && to_id == obj.to_id) {
            console.log("It Equal")
          id = obj.id;
          console.log(id);
          $.ajax({
            type: "POST",
            url: "checkfollow.php",
            data: { id: id, state: state },
            success: function (response) {
              console.log(response)
            },
          });
        }
        }
        
      },
    });
    e.preventDefault();
  });
});
