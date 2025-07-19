const temp = document.getElementById("update");
const temp2 = document.getElementById("khoiupdate");
const temp3 = document.getElementById("cancel");
temp3.addEventListener("click", function (e) {
  e.preventDefault();
  temp2.classList.add("khoitanghinh");
});
const temp4 = document.getElementById("save");
temp4.addEventListener("click", function (e) {
  e.preventDefault();
  temp2.classList.add("khoitanghinh");
});
const temp_delete = document.getElementById("delete");
const temp__war = document.getElementById("khoidelete");
const temp5 = document.getElementById("No");
const temp6 = document.getElementById("Yes");
temp_delete.addEventListener("click", function (e) {
  e.preventDefault();
  temp__war.classList.remove("khoitanghinh");
});
temp5.addEventListener("click", function (e) {
  e.preventDefault();
  temp__war.classList.add("khoitanghinh");
});
temp6.addEventListener("click", function (e) {
  e.preventDefault();
  temp__war.classList.add("khoitanghinh");
});
