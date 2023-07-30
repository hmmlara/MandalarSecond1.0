$(document).ready(function() {

    // post like start
    var postId = $('#product-like').data("post-id");
    var userId = $('#product-like').data("user-id");
    $.ajax({
        url: 'php/product_like_show.php',
        type: 'GET',
        data: { postId: postId, userId: userId },
        success: function(data) {
            if (data == "not have") {
                $("#product-like").removeClass("btn-secondary");
                $("#product-like").addClass("btn-primary");

            } else if (data == "have") {
                $("#product-like").removeClass("btn-primary");
                $("#product-like").addClass("btn-secondary");
            }
        },
    });
    $("#product-like").on("click", function() {
        $.ajax({
            url: 'php/product_like.php',
            type: 'GET',
            data: { postId: postId, userId: userId },
            success: function(data) {
                console.log(data);
                if (data == "have") {
                    $("#product-like").removeClass("btn-secondary");
                    $("#product-like").addClass("btn-primary");

                } else if (data == "not have") {
                    $("#product-like").removeClass("btn-primary");
                    $("#product-like").addClass("btn-secondary");
                }
            },

        });
    });

    setInterval(() => {
        $.ajax({
            url: "php/post_react.php",
            type: "GET",
            data: { postId: postId },
            success: function(data) {
                $("#post-like-count").text(data);
            }
        })
        $.ajax({
            url: "php/post_favorite.php",
            type: "GET",
            data: { postId: postId },
            success: function(data) {
                $("#post-favorite-count").text(data);
            }
        })
    }, 500);
    // post like end

    //post favourite start

    $.ajax({
        url: 'php/product_favorite_show.php',
        type: 'GET',
        data: { postId: postId, userId: userId },
        success: function(data) {
            console.log(data);
            if (data == "not have") {
                $("#product-favorite").removeClass("btn-secondary");
                $("#product-favorite").addClass("btn-primary");

            } else if (data == "have") {
                $("#product-favorite").removeClass("btn-primary");
                $("#product-favorite").addClass("btn-secondary");
            }
        },
    });

    $("#product-favorite").on("click", function() {
        console.log('clicked')
        $.ajax({
            url: 'php/product_favorite.php',
            type: 'GET',
            data: { postId: postId, userId: userId },
            success: function(data) {
                console.log(data);
                if (data == "have") {
                    $("#product-favorite").removeClass("btn-secondary");
                    $("#product-favorite").addClass("btn-primary");

                } else if (data == "not have") {
                    $("#product-favorite").removeClass("btn-primary");
                    $("#product-favorite").addClass("btn-secondary");
                }
            },

        });
    });

    //post favourite end

    // buy condition start

    $("#buy-btn").click(function() {
        var postId = $('#product-like').data("post-id");
        var userId = $('#product-like').data("user-id");
        let error = false;
        if ($("#buyer-phone").val() == "") {
            $("#phone-error").css("display", "block");
            error = true;
        } else {
            $("#phone-error").css("display", "none");
        }
        if ($("#buyer-address").val() == "") {
            $("#address-error").css("display", "block");
            error = true;
        } else {
            $("#address-error").css("display", "none");
        }
        if (error == false) {
            let form = document.getElementById('buy-form');
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "php/buy_form.php", true);
            xhr.onload = () => {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        let data = xhr.response;
                        console.log(data);
                        if (data === "success") {
                            let buyInfoClose = document.getElementById('buy-info-close');
                            let overlaySuccess = document.querySelector(".success-overlay");
                            console.log("success", buyInfoClose);
                            buyInfoClose.click();
                            overlaySuccess.style.display = "flex"
                            setTimeout(() => {
                                overlaySuccess.style.display = "none"
                                window.onload();
                            }, 3000)

                        } else {}
                    }
                }
            };
            let formData = new FormData(form);
            formData.append("user_id", userId);
            formData.append("post_id", postId) // Add userId to formData
            xhr.send(formData);
        }
    });

    // buy condition end

});