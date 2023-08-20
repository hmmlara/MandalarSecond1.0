const notiContainer = document.querySelector(".aa-cart-notify");
const NOti_container = document.querySelector("#notiContainer");

const user_id = notiContainer.dataset.userId;

let previousNotiCount = 0;
console.log("lee")
function loadNotiCount(){
    $.ajax({
        url: "php/loadnoticount.php",
        type: "GET",
        data: {user_id: user_id},
        success: function(data){
            let notiCount = data;
            if(notiCount !== previousNotiCount){
                notiContainer.innerHTML = data;
                loadNoti();
            }
            previousNotiCount = data;
            console.log("is reach")
            console.log(data)
            notiContainer.innerHTML = data
        }
    })
}

function loadNoti(){
    $.ajax({
        url: "php/loadnoti.php",
        type: "GET",
        data:{user_id: user_id},
        success:function(data){
            let noti = JSON.parse(data)
            console.log("load notification success")
            console.log(noti)
            NOti_container.innerHTML = ""
            noti.forEach(element => {
                NOti_container.innerHTML += `<li>${element.content}</li>`
            });
            console.log(NOti_container.innerHTML);


        }
    })
}


loadNotiCount()