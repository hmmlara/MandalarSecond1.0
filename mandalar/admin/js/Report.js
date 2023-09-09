const ctx = document.getElementById("BarChart");
const ctx2 = document.getElementById("PieChart");
const subCategoryChart = document.getElementById("SubChart2");
const subCategoryPieChart = document.getElementById("PieChart2");

function createBarChart(ctx, label, dataList) {
	let data = dataList[0];
	let data2 = dataList[1];
	new Chart(ctx, {
		type: "bar",
		data: {
			labels: label,
			datasets: [
				{
					label: "total",
					data: data,
					borderWidth: 1,
				},
				{
					label: "sold out",
					data: data2,
					borderWidth: 1,
				},
			],
		},
		options: {
			scales: {
				y: {
					beginAtZero: true,
				},
			},
		},
	});
}

function createPieChart(ctx, dataset) {
    console.log(dataset)
    let label = dataset['name'];
    let data = dataset['data'];
	new Chart(ctx, {
		type: "polarArea",
		data: {
			labels: label,
			datasets: [
				{
					label: "total",
					data: data,
					borderWidth: 1,
				},
			],
		},
		options: {
			scales: {
				y: {
					beginAtZero: true,
				},
			},
		},
	});
}

// Function to fetch data and create the bar chart
function fetchAndCreateBarChart(ctx,type) {
    fetchData(type[0])
      .then(function (result1) {
        let data1 = result1["data"];
        let label1 = result1["name"];
        return fetchData(type[1]).then(function (result2) {
          let data2 = result2["data"];
          createBarChart(ctx, label1, [data1, data2]);
        });
      })
      .catch(function (error) {
        console.error(error);
      });
  }
  
  // Call fetchAndCreateBarChart to fetch data and create the bar chart
  fetchAndCreateBarChart(ctx,['total_by_cat','sold_out_total_by_cat']);
  fetchAndCreateBarChart(subCategoryChart,["total_by_sub_cat","sold_out_total_by_sub_cat"])
  
  

function fetchData(type) {
    return new Promise(function (resolve, reject) {
      $.ajax({
        url: "php/getReport.php",
        type: "GET",
        data: { type: type },
        success: function (dataList) {
          console.log(dataList);
          let result = JSON.parse(dataList);
          console.log(result);
          resolve(result);
        },
        error: function (error) {
          reject(error);
        },
      });
    });
  }
  


function fetchDataAndCreateChart(type, ctx) {
    fetchData(type)
        .then(function (result) {
            createPieChart(ctx, result);
        })
        .catch(function (error) {
            console.error(error);
        });
}

fetchDataAndCreateChart("sold_out_total_by_cat", ctx2);
fetchDataAndCreateChart("sold_out_total_by_sub_cat", subCategoryPieChart);

//Toal Posts By Each Sub Category With Bar Ca
