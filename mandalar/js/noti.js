const notiContainer = document.querySelector(".aa-cart-notify");
const user_id = notiContainer.dataset.userId;
console.log("lee")
function loadNotiCount(){
    $.ajax({
        url: "php/loadnoticount.php",
        type: "GET",
        data: {user_id: user_id},
        success: function(data){
            console.log("is reach")
            console.log(data)
            notiContainer.innerHTML = data
        }
    })
}



loadNotiCount()