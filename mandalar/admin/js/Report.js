const ctx = document.getElementById('BarChart');
const ctx2 = document.getElementById('PieChart');
function createChat(element,data,label,type){
    new Chart(element, {
        type: type,
        data: {
          labels: label,
          datasets: [{
            label: '',
            data: data,
            borderWidth: 1
          }]
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
        createChat(ctx,data,label,"bar");
        console.log(data,label)
    }
}
)

//Total Sold Out By Sub Category with Pie Chart
$.ajax({
    url:"php/getReport.php",
    type:"get",
    data:{type:1},
    success:function(dataList){
        console.log(dataList);
        let result = JSON.parse(dataList);
        let data = result['data'];
        let label = result['name'];
        createChat(ctx2,data,label,"polarArea");
        console.log(data,label)
    }
}
)
