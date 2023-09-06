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
          <div class="card" style="width: 18rem;">
          <img src="image/${val.product_image}" style="height:300px;object-fit:cover" class="card-img-top" alt="Sunset Over the Sea"/>
          <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
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
