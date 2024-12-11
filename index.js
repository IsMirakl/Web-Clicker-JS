let countContainer = document.getElementById("counter");
let reset_btn = document.getElementById("reset_btn");
let boost_btn = document.getElementById("boost_btn");

let count = 0;
let isBoosted = false;

reset_btn.addEventListener("click", () => {
  count = 0;
  isBoosted = false;
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
document
  .querySelector(".image__container img")
  .addEventListener("click", () => {
    if (isBoosted) {
      count += 10;
    } else {
      count++;
    }

    countContainer.textContent = count;
    checkBoostAvailability();
  });

checkBoostAvailability();
