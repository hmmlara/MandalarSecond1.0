// Function to delete the image preview
function deleteImagePreview(imageElement) {
    const imagePreviewsContainer = document.getElementById("imagePreviews");
    imagePreviewsContainer.removeChild(imageElement);
}
// JavaScript to handle multiple image selection and preview
document.getElementById("imageUpload").addEventListener("change", function(event) {
    const imagePreviewsContainer = document.getElementById("imagePreviews");
    // imagePreviewsContainer.innerHTML = '';

    const files = event.target.files;

    for (let i = 0; i < files.length; i++) {
        const file = files[i];
        const reader = new FileReader();

        reader.onload = function() {
            const imagePreview = document.createElement("img");
            // const imageLabel = document.createElement("h1")
            // let content = "image " + i;
            // imageLabel.append(content)
            imagePreview.src = reader.result;
            imagePreview.className = "preview-image";
            imagePreviewsContainer.prepend(imagePreview);
            // Bind the deleteImagePreview function to the click event of the image
            imagePreview.addEventListener("click", function() {
                deleteImagePreview(imagePreview);
            });

        };

        reader.readAsDataURL(file);
    }

    // if (files.length === 0) {
    //     const imageLabel = document.getElementById("imageLabel");
    //     imageLabel.style.display = "block";
    // } else {
    //     const imageLabel = document.getElementById("imageLabel");
    //     imageLabel.style.display = "none";
    // }
});