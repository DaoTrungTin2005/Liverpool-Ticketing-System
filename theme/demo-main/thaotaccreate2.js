// create ticket
const imgclick = document.getElementById("hinhfile");
const fileclick = document.getElementById("file");
const descphoto = document.getElementById("descphoto");
imgclick.addEventListener("click", function (e) {
  e.preventDefault();
  fileclick.click();
});
fileclick.addEventListener("change", function () {
  if (fileclick.files.length > 0) {
    descphoto.textContent = fileclick.files[0].name;
  } else {
    descphoto.textContent = "Data photo none";
  }
});
fileclick.addEventListener("change", function () {
  if (fileclick.files.length > 0) {
    const file = fileclick.files[0];
    descphoto.textContent = file.name;
    imgclick.src = URL.createObjectURL(file);
    imgclick.style.height = "20px";
    imgclick.style.width = "18px";
    imgclick.style.padding = "0px";
  } else {
    descphoto.textContent = "Data photo none";
  }
});
