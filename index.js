let countContainer = document.getElementById("counter");
let click_btn = document.getElementById("click_btn");
let reset_btn = document.getElementById("reset_btn");
let input_countSum = document.getElementById("input_countSum");
console.log(input_countSum);

let sum_btn = document.getElementById("sum_btn");

let count = 0;
click_btn.addEventListener("click", () => {
  count++;
  countContainer.textContent = count;
});

reset_btn.addEventListener("click", () => {
  count = 0;
  countContainer.textContent = count;
});

sum_btn.addEventListener("click", () => {
  const valueInput = parseInt(input_countSum.value) || 0;
  count += valueInput;
  countContainer.textContent = count;
  input_countSum.value = " ";
});
