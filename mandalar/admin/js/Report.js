const ctx = document.getElementById('BarChart');
const ctx2 = document.getElementById('PieChart');
  

let label = ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'];
let data = [12, 19, 3, 5, 2, 3];

//Total Posts By Category with bar chart;
$.ajax({
    url:"php/getReport.php",
    type:"get",
    data:{type:0},
    success:function(dataList){
        console.log(dataList);
        let result = JSON.parse(dataList);
        let data = result['data'];
        let label = result['name'];
        $.ajax({
            url:"php/getReport.php",
            type:"get",
            data:{type:1},
            success:function(dataList){
                console.log(dataList);
                let result = JSON.parse(dataList);
                let data2 = result['data'];
                let label2 = result['name'];
                new Chart(ctx, {
                    type: "bar",
                    data: {
                      labels: label,
                      datasets: [{
                        label: 'total',
                        data: data,
                        borderWidth: 1
                      },
                      {
                        label: 'sold out',
                        data: data2,
                        borderWidth: 1
                      }
                    ]
                    },
                    options: {
                      scales: {
                        y: {
                          beginAtZero: true
                        }
                      }
                    }
                  });
            }
        }
        )
        
       
     
    }
}
)


$.ajax({
    url:"php/getReport.php",
    type:"get",
    data:{type:1},
    success:function(dataList){
        console.log(dataList);
        let result = JSON.parse(dataList);
        let data3 = result['data'];
        let label3 = result['name'];
        new Chart(ctx2, {
            type: "polarArea",
            data: {
              labels: label3,
              datasets: [{
                label: 'total',
                data: data3,
                borderWidth: 1
              }
             
            ]
            },
            options: {
              scales: {
                y: {
                  beginAtZero: true
                }
              }
            }
          });
    }
}
)
//Total Sold Out By Sub Category with Pie Chart
