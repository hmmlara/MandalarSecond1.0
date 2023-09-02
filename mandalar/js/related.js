const RelatedProductContainer = document.querySelector("#Related-Wrapper");

const subCategoryDiv = document.querySelector("#subCategory");
const productStatusDiv = document.querySelector(".product-status");
const priceDiv = document.querySelector("#price");

let subCategory = subCategoryDiv.dataset.category;
let productStatus = productStatusDiv.dataset.status;
let maxPrice = parseInt(priceDiv.dataset.price);
console.log("sub-category : ", maxPrice);

const fliteringData = {
  category: null,
  subCategory: subCategory,
  "min-price": 0,
  "max-price": maxPrice,
  "new-used": null,
};

function getRelatedProduct(obj) {
  console.log(fliteringData);
  let FlitteringReq = new XMLHttpRequest();

  FlitteringReq.open("POST", "php/flitter.php", true);
  FlitteringReq.setRequestHeader(
    "Content-Type",
    "application/x-www-form-urlencoded"
  );

  FlitteringReq.onload = () => {
    if (FlitteringReq.status === 200) {
      try {
        console.log(FlitteringReq.response);
        let dataList = JSON.parse(FlitteringReq.response);
        console.log(dataList);
        console.log(RelatedProductContainer);
        RelatedProductContainer.innerHTML = "";
        dataList.forEach((val, index) => {
          RelatedProductContainer.innerHTML += `
          <div class="swiper-slide">
          <a href="productDetail.php?id=${val.id}">
              <div class="card shadow">
                  <img src="image/${val.product_image}" class="card-img-top product-image" alt="${val.product_image}" />
                  <div class="card-body">
                      <h5 class="card-title">${val.item}</h5>
                      <div class="d-flex justify-content-between align-items-center">
                          <div class="d-flex align-items-center">
                              <img src="image/user-profile/${val.img}" class="rounded-circle profile-on-card" alt="${val.fname + val.lname}" />
                              <span class="ml-2 card-text">${val.fname + val.lname}</span>
                          </div>
                          <div>
                              <p class="card-text view-details-btn">${val.price} mmk</p>
                          </div>
                      </div>
                      <div class="mt-3">
                          <i class="far fa-heart mr-2"></i>
                          <span class="reaction-count">${val.Post_Reaction}</span>
                          <i class="far fa-plus-square ml-3"></i>
                          <span class="save-count">8</span>
                          <i class="far fa-eye ml-3"></i>
                          <span class="view-count">30</span>
                      </div>
                  </div>
              </div>
          </a>
      </div>
           
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

getRelatedProduct(fliteringData);
