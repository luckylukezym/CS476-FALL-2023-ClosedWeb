let card_number_input = document.querySelector("#card_number");
let name_input = document.querySelector("#name");
let exp_input = document.querySelector("#exp");
let cvv_input = document.querySelector("#cvv");
let checkout_button = document.querySelector("#checkout-button");

function correct_number(card_number) {
  return /^\d+$/.test(String(card_number)) && String(card_number).length == 16;
}

function correct_name(name) {
  return /^[a-zA-Z()]+$/.test(String(name)) && String(name).length != 0;
}

function correct_exp(exp) {
  return /^(0[1-9]|1[0-2])\/?([0-9]{4}|[0-9]{2})$/.test(String(exp));
}

function correct_cvv(cvv) {
  return /^\d+$/.test(String(cvv)) && String(cvv).length == 3;
}

card_number_input.addEventListener("input", (e) => {
  if (
    correct_number(card_number_input.value) &&
    correct_name(name_input.value) &&
    correct_exp(exp_input.value) &&
    correct_cvv(cvv_input.value)
  ) {
    checkout_button.classList.remove("hidden");
  } else {
    checkout_button.classList.add("hidden");
  }
});

name_input.addEventListener("input", (e) => {
  if (
    correct_number(card_number_input.value) &&
    correct_name(name_input.value) &&
    correct_exp(exp_input.value) &&
    correct_cvv(cvv_input.value)
  ) {
    checkout_button.classList.remove("hidden");
  } else {
    checkout_button.classList.add("hidden");
  }
});

exp_input.addEventListener("input", (e) => {
  if (
    correct_number(card_number_input.value) &&
    correct_name(name_input.value) &&
    correct_exp(exp_input.value) &&
    correct_cvv(cvv_input.value)
  ) {
    checkout_button.classList.remove("hidden");
  } else {
    checkout_button.classList.add("hidden");
  }
});

cvv_input.addEventListener("input", (e) => {
  if (
    correct_number(card_number_input.value) &&
    correct_name(name_input.value) &&
    correct_exp(exp_input.value) &&
    correct_cvv(cvv_input.value)
  ) {
    checkout_button.classList.remove("hidden");
  } else {
    checkout_button.classList.add("hidden");
  }
});
