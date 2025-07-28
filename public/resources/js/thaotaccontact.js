const updateButtons = document.querySelectorAll(".btn__update");
const updateBox = document.getElementById("khoiupdate");
const messageContent = document.getElementById("messageContent");
const closeBtn = document.getElementById("save");

updateButtons.forEach((btn) => {
  btn.addEventListener("click", function (e) {
    e.preventDefault();
    const message = this.getAttribute("data-message");
    messageContent.textContent = message;
    updateBox.classList.remove("khoitanghinh");
  });
});

closeBtn.addEventListener("click", function (e) {
  e.preventDefault();
  updateBox.classList.add("khoitanghinh");
});
