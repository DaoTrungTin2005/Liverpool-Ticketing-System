const checkbox_vab = document.getElementById("check");
const checkbox_vabbot = document.getElementById("checkbot");
const tick = document.getElementById("tick");
const tickbot = document.getElementById("tickbot");
const svg = document.getElementById("svg");
const svgbot = document.getElementById("svgbot");
const soluong = Number(document.getElementById("soluong").value);
const minus = document.getElementById("svgminus");
const plus = document.getElementById("svgplus");
tick.addEventListener("click", function (e) {
  e.preventDefault();
  checkbox_vab.click();
});
tick.addEventListener("click", function (e) {
  e.preventDefault();
  svg.classList.toggle("khoitanghinh");
});
tickbot.addEventListener("click", function (e) {
  e.preventDefault();
  checkbox_vabbot.click();
});
tickbot.addEventListener("click", function (e) {
  e.preventDefault();
  svgbot.classList.toggle("khoitanghinh");
});
minus.addEventListener("click", function (e) {
  e.preventDefault();
  const soluongElement = document.getElementById("soluong");
  let currentValue = Number(soluongElement.textContent);
  if (!isNaN(currentValue) && currentValue > 1) {
    soluongElement.textContent = currentValue - 1;
  }
});
plus.addEventListener("click", function (e) {
  e.preventDefault();
  const soluongElement = document.getElementById("soluong");
  let currentValue = Number(soluongElement.textContent);
  if (!isNaN(currentValue) && currentValue > 0) {
    soluongElement.textContent = currentValue + 1;
  }
});
