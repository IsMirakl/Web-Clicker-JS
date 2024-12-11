let countContainer = document.getElementById("counter");
let click_btn = document.getElementById("click_btn");
let reset_btn = document.getElementById("reset_btn");
let input_countSum = document.getElementById("input_countSum");
let boost_btn = document.getElementById("boost_btn");

let sum_btn = document.getElementById("sum_btn");

let count = 0;
let isBoosted = false;

click_btn.addEventListener("click", () => {
  if (isBoosted) {
    count += 10;
  } else {
    count++;
  }

  countContainer.textContent = "Счет" + count;
  checkBoostAvailability();
});

reset_btn.addEventListener("click", () => {
  count = 0;
  isBoosted = false;
  countContainer.textContent = count;
  checkBoostAvailability();
});

sum_btn.addEventListener("click", () => {
  const valueInput = parseInt(input_countSum.value) || 0;
  count += valueInput;
  input_countSum.value = " ";
  countContainer.textContent = count;
  checkBoostAvailability();
});

boost_btn.addEventListener("click", () => {
  isBoosted = true;
  checkBoostAvailability();
});

function checkBoostAvailability() {
  if (count >= 10 && !isBoosted) {
    boost_btn.disabled = false;
  } else {
    boost_btn.disabled = true;
  }
}

checkBoostAvailability();
