const notiContainer = document.querySelector(".aa-cart-notify");
const user_id = notiContainer.dataset.userId;
console.log(user_id);
function loadNotiCount(){
    $.ajax({
        url: "php/loadnoticount.php",
        type: "GET",
        dataType: "json",
        data: {user_id: user_id},
        success: function(data){
            
            console.log(data)
        }
    })
}

loadNotiCount()