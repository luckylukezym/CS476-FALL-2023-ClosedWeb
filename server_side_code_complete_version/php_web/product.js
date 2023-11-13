let add_button = document.querySelector(".add-button");
let title = document.querySelector(".product-title");

add_button.addEventListener("click", function (e) {
  alert("product added to cart");
  setTimeout(alert_user, "2000");
  window.location.href = `add_button_process.php?name=${title.textContent}`;
});

function alert_user() {
  alert("product added to cart.");
}
