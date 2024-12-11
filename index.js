let countContainer = document.getElementById("counter");
let reset_btn = document.getElementById("reset_btn");
let boost_btn = document.getElementById("boost_btn");

let count = 0;
let isBoosted = false;
let userID = document.getElementById("user_id").value;

function saveCount(count) {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "save_count.php", true);
  xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      console.log("Count saved successfully.");
    }
  };
  xhr.send(JSON.stringify({ user_id: userID, count: count }));
}

function loadCount() {
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "load_count.php?user_id=" + userID, true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      let response = JSON.parse(xhr.responseText);
      count = parseInt(response.count);
      countContainer.textContent = count;
      checkBoostAvailability();
    }
  };
  xhr.send(null);
}

reset_btn.addEventListener("click", () => {
  count = 0;
  isBoosted = false;
  countContainer.textContent = count;
  saveCount(count);
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
    saveCount(count);
    checkBoostAvailability();
  });

window.onload = function () {
  loadCount();
};
