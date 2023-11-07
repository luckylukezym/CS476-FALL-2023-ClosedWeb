let add_button = document.querySelector(".add-button");
let title = document.querySelector(".product-title");

add_button.addEventListener("click", function (e) {
  window.location.href = `add_button_process.php?name=${title.textContent}`;
});
