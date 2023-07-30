$(document).ready(function(){
    filtervalue=$("#filterNRC").val();
    if(filtervalue==0)
    {
         $.ajax({
            type:"GET",
            url:"getAllNRC.php",
            success:function(response)
            {
                getAllNRCusers=JSON.parse(response)
                // console.log(getAllNRCusers)
                getAllNRCusers.forEach((getAllNRCuser,index) => {
                    // console.log(getAllNRCuser)
                    userid=getAllNRCuser.to_id;
                    console.log(userid);
                    showAll="";
                    $.ajax({
                        type:"POST",
                        url:"getusername.php",
                        data:{userid:userid},
                        success:function(response)
                        {
                            // Use ternary operator to handle the condition
                            const checkButton = getAllNRCuser.status == 0
                            ? `btn btn-warning` : 'btn btn-info';
                            showAll=`<td>${index+1}</td>
                            <td>${response}</td>
                            <td>${getAllNRCuser.nrc}</td>
                            <td>${getAllNRCuser.date}</td>
                            <td><a href="view_NRCuser.php?userid=${userid}" class="${checkButton}">View</a></td>`

                            $("#showNRCuser").append(showAll)
                        }
                    })

                });
            }
         })

    }
    $("#filterNRC").on("change",function()
    {
       
    })
})