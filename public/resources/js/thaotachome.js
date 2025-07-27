const slides = document.querySelectorAll(".img__sp");
let current = 0;

setInterval(() => {
  slides[current].classList.add("an");

  current = (current + 1) % slides.length;

  slides[current].classList.remove("an");
}, 2000);
const khoithongtin = document.querySelector(".khoithongtin");
const khoian = document.querySelector(".khoian");

khoithongtin.addEventListener("mouseenter", () => {
  khoian.style.transform = "translateX(0)";
  khoian.style.opacity = "1";
  khoian.style.pointerEvents = "auto";
});

khoithongtin.addEventListener("mouseleave", () => {
  khoian.style.transform = "translateX(-100%)";
  khoian.style.opacity = "0";
  khoian.style.pointerEvents = "none";
});
const logo = document.querySelector(".khoilogomob");
const header = document.querySelector(".header");

logo.addEventListener("click", () => {
  header.classList.toggle("hienra");
});
const navPC = document.querySelector(".khoiuser");
const navMB = document.querySelector(".khoiusermb");
navMB.innerHTML = navPC.innerHTML;
