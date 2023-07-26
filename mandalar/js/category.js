const fliteringData =  {"category":null,"subCategory":null,"min-price":"unlimited","max-price":"unlimited","new-used":'unlimited'}
// Optional: Add JavaScript to handle radio button changes or retrieve the selected value
const radioButtons = document.querySelectorAll('input[type="radio"]');
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

function PostFliteringData(obj){
    console.log(obj);

}