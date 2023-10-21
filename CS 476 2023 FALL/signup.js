/***********************************
 *       document objects
 * ********************************** */
let email_input = document.querySelector("#email-input");
let password_input = document.querySelector("#password-input");
let repassword_input = document.querySelector("#repassword-input");
let email_err = document.querySelector("#msg_email");
let password_err = document.querySelector("#msg_pswd");
let repassword_err = document.querySelector("#msg_pswdr");
let submit_button = document.querySelector("#subimt-button");
let reset_button = document.querySelector("#reset-button");

/****************************************
 *     event handling helpers
 * ************************************* */

let correct_email = function (email) {
  let regular = /^\S+@\S+\.\S+$/;
  return regular.test(email);
};

let correct_password = function (password) {
  let pass_length = String(password).length;
  return pass_length >= 8 && pass_length <= 10;
};

let matching_password = function (password_1, password_2) {
  return String(password_1) == String(password_2);
};

/**********************************
 *          event listeners
 * ******************************** */
submit_button.addEventListener("click", (e) => {
  if (!correct_email(email_input.value)) {
    email_err.classList.remove("hidden");
  }

  if (!correct_password(password_input.value)) {
    password_err.classList.remove("hidden");
  }

  if (!matching_password(password_input.value, repassword_input.value)) {
    repassword_err.classList.remove("hidden");
  }
});

reset_button.addEventListener("click", (e) => {
  email_err.classList.add("hidden");
  password_err.classList.add("hidden");
  repassword_err.classList.add("hidden");
});
