// Optional: Add JavaScript to handle radio button changes or retrieve the selected value
const radioButtons = document.querySelectorAll('input[type="radio"]');
radioButtons.forEach(function (radio) {
  radio.addEventListener('change', function () {
    const selectedValue = this.value;
    console.log(selectedValue); // Replace with your desired logic
  });
});
