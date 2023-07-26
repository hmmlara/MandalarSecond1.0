const fliteringData =  {"category":null,"subCategory":null,"min-price":"unlimited","max-price":"unlimited","new-used":'unlimited'}
// Optional: Add JavaScript to handle radio button changes or retrieve the selected value
const radioButtons = document.querySelectorAll(".category");
radioButtons.forEach(function (radio) {
	radio.addEventListener("change", function () {
		const selectedValue = this.value;
		console.log(selectedValue); // Replace with your desired logic
        fliteringData.category = selectedValue
        PostFliteringData(fliteringData);
		let xhr1 = new XMLHttpRequest();
		let postsubcategory = document.getElementById("post_subcategory");

		// Clear existing options in the select element
		while (postsubcategory.firstChild) {
			postsubcategory.removeChild(postsubcategory.firstChild);
		}

		xhr1.open("POST", "php/sub_category.php", true);
		xhr1.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

		xhr1.onload = () => {
			console.log(xhr1.status);
			if (xhr1.status === 200) {
				try {
					let data1 = JSON.parse(xhr1.response);
					console.log(data1);
					const subCategoryOption = document.querySelector(
						"#sub-catgory-fliter"
					);

					subCategoryOption.innerHTML = "";

					data1.forEach((cate) => {
						subCategoryOption.innerHTML += `
                      <option value= ${cate["id"]}>${cate["name"]}</option>
                      `;

						// option.value = cate.id;
						// option.textContent = cate.name;
						// postsubcategory.appendChild(option);
					});
				} catch (error) {
					console.error("Error parsing response as JSON:", error);
					// Handle the JSON parsing error here, e.g., show an error message to the user
				}
			} else {
				console.error("Request failed. Status:", xhr1.status);
				// Handle other error scenarios here, e.g., show an error message to the user
			}
		};

		// Send the XMLHttpRequest
		xhr1.send("cate_val=" + encodeURIComponent(selectedValue));
	});
});

//Post Flittering Data 
function PostFliteringData(obj){
    console.log(obj);

}

//Log Selected Value
function logSelectedValue() {
    const selectElement = document.querySelector("#sub-catgory-fliter");
    const selectedValue = selectElement.value;
    fliteringData.subCategory = selectedValue;
    PostFliteringData(fliteringData)
    console.log("Selected value: " + selectedValue);
  }

  document.querySelector("#sub-catgory-fliter").addEventListener("change", logSelectedValue);

  document.addEventListener("DOMContentLoaded", function () {
	var priceSlider = document.getElementById("priceSlider");
	var priceValue = document.getElementById("priceValue");

	noUiSlider.create(priceSlider, {
		start: [0, 1000],
		connect: true,
		range: {
			min: 0,
			max: 1000,
		},
	});
	priceSlider.noUiSlider.on("update", function (values, handle) {
		var min = values[0];
		var max = values[1];
		priceValue.innerHTML = min + " - " + max;
		fliteringData["min-price"] = min;
		fliteringData['max-price'] = max;
		PostFliteringData(fliteringData);
		});

	var priceSlider2 = document.getElementById("priceSlider2");
	var priceValue2 = document.getElementById("priceValue2");

	noUiSlider.create(priceSlider2, {
		start: [0, 1000],
		connect: true,
		range: {
			min: 0,
			max: 1000,
		},
	});
	priceSlider2.noUiSlider.on("update", function (values, handle) {
		var min = values[0];
		var max = values[1];
		priceValue2.innerHTML = min + " - " + max;
	});
});

const NewUserradioButtons = document.querySelectorAll(".status-radio");
NewUserradioButtons.forEach(function (radio) {
	radio.addEventListener("change", function () {
		const selectedValue = this.value;
		console.log(selectedValue); // Replace with your desired logic
        fliteringData["new-used"] = selectedValue
        PostFliteringData(fliteringData);
		
	});
});