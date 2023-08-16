const fliteringData = {
    category: null,
    subCategory: null,
    "min-price": null,
    "max-price": null,
    "new-used": null,
};
const productContainer = document.querySelector("#products .row");
let loadCount = 0;

//Post Flittering Data
function PostFliteringData(obj) {
    let FlitteringReq = new XMLHttpRequest();

    FlitteringReq.open("POST", "php/flitter.php", true);
    FlitteringReq.setRequestHeader(
        "Content-Type",
        "application/x-www-form-urlencoded"
    );

    FlitteringReq.onload = () => {
        if (xhr1.status === 200) {
            try {
                console.log(FlitteringReq.response);
                let dataList = JSON.parse(FlitteringReq.response);
                console.log(dataList);
                productContainer.innerHTML = "";
                dataList.forEach((val, index) => {
                    
                    productContainer.innerHTML += `
                    <a href="productDetail.php?id=${val.id}" class="col-md-4 col-sm-6  col-lg-3 mb-4 "> 
                    <div >
                    <div class="card product-card-by-nay">
                        <img src="image/${val.product_image}" class="card-img-top product-image" alt="${val.product_image}" />
                        <div class="card-body">
                            <div class = "product-card-title">
                            <h5 class="card-title">${val.item}</h5>
                            <h5>
                                ${val.price}
                            </h5>
                             </div>
                           
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <img src="image/user-profile/${val.img}" class="rounded-circle profile-on-card"
                                        alt="${val.img}" />
                                    <span class="ml-2 card-text">${val.fname+val.lname}</span>
                                </div>
                            </div>
                            <div class="product-info-box">
                                <div>
                                    <i class="far fa-heart mr-2"></i>
                                    <span class="reaction-count">${val.Post_Reaction}</span>
                                </div>
                                <div>
                                    <i class="far fa-plus-square ml-3"></i>
                                    <span class="save-count">18</span>
                                </div>
    
                                <div>
                                    <i class="far fa-eye ml-3"></i>
                                    <span class="view-count">50</span>
                                </div>
                        </div>
                        </div>
                    </div>
                </div>
                    </a>
                     
                        `;
                });

                dataList.forEach((data) => {});
            } catch (error) {
                console.error("Error parsing response as JSON:", error);
                // Handle the JSON parsing error here, e.g., show an error message to the user
            }
        } else {
            console.error("Request failed. Status:", FlitteringReq.status);
            // Handle other error scenarios here, e.g., show an error message to the user
        }
    };

    // Send the XMLHttpRequest
    FlitteringReq.send(
        "flitteringData=" + encodeURIComponent(JSON.stringify(obj))
    );
}

//Category radio flitter
const radioButtons = document.querySelectorAll(".category");
radioButtons.forEach(function(radio) {
    radio.addEventListener("change", function() {
        const selectedValue = this.value;
        fliteringData.category = selectedValue;
        let xhr1 = new XMLHttpRequest();
        let postsubcategory = document.getElementById("post_subcategory");

        // Clear existing options in the select element
        while (postsubcategory.firstChild) {
            postsubcategory.removeChild(postsubcategory.firstChild);
        }

        xhr1.open("POST", "php/sub_category.php", true);
        xhr1.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr1.onload = () => {
            if (xhr1.status === 200) {
                try {
                    let data1 = JSON.parse(xhr1.response);
                    const subCategoryOption = document.querySelector(
                        "#sub-catgory-fliter"
                    );

                    subCategoryOption.innerHTML = "";
                    fliteringData.subCategory = data1[0]["id"];
                    console.log(data1[0]['id']);
                    loadCount = 10
                    PostFliteringData(fliteringData);

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

//Sub category flitter
function postSubCategoryValue() {
    const selectElement = document.querySelector("#sub-catgory-fliter");
    const selectedValue = selectElement.value;
    fliteringData.subCategory = selectedValue;
    loadCount += 10;
    PostFliteringData(fliteringData);
}

document
    .querySelector("#sub-catgory-fliter")
    .addEventListener("change", postSubCategoryValue);

//Price range flitter
document.addEventListener("DOMContentLoaded", function() {
    var priceSlider = document.getElementById("priceSlider");
    var priceValue = document.getElementById("priceValue");

    noUiSlider.create(priceSlider, {
        start: [0, 50000000],
        connect: true,
        range: {
            min: 0,
            max: 50000000,
        },
    });
    priceSlider.noUiSlider.on("update", function(values, handle) {
        var min = values[0];
        var max = values[1];
        priceValue.innerHTML = min + " - " + max;
        fliteringData["min-price"] = min;
        fliteringData["max-price"] = max;
        loadCount+=2;
        if (loadCount > 5) {
            PostFliteringData(fliteringData);

        }
    });

    var priceSlider2 = document.getElementById("priceSlider2");
    var priceValue2 = document.getElementById("priceValue2");

    noUiSlider.create(priceSlider2, {
        start: [0, 50000000],
        connect: true,
        range: {
            min: 0,
            max: 50000000,
        },
    });
    priceSlider2.noUiSlider.on("update", function(values, handle) {
        var min = values[0];
        var max = values[1];
        priceValue2.innerHTML = min + " - " + max;
        fliteringData["min-price"] = min;
        fliteringData["max-price"] = max;
        loadCount+=1;
        console.clear()
        console.log(loadCount)
        if (loadCount > 6) {
            PostFliteringData(fliteringData);

        }
    });
});

const NewUserradioButtons = document.querySelectorAll(".status-radio");
NewUserradioButtons.forEach(function(radio) {
    radio.addEventListener("change", function() {
        const selectedValue = this.value;
        fliteringData["new-used"] = selectedValue;
        loadCount += 10;
        PostFliteringData(fliteringData);
    });
});