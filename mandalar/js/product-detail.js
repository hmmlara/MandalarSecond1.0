$(document).ready(function() {
    $("#product-like").on("click", function() {
        var postId = $(this).data("post-id");
        var userId = $(this).data("user-id");
        alert(postId); // Add this line to check if the click event works.
        console.log(postId);
        console.log(userId);
    });
});