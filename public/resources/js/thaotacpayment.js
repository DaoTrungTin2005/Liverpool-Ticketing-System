const checkbox_vabbot = document.getElementById("checkbot");
const tickbot = document.getElementById("tickbot");
const svgbot = document.getElementById("svgbot");
tickbot.addEventListener("click", function (e) {
  e.preventDefault();
  checkbox_vabbot.click();
});
tickbot.addEventListener("click", function (e) {
  e.preventDefault();
  svgbot.classList.toggle("khoitanghinh");
});
