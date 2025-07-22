const slides = document.querySelectorAll(".img__sp");
let current = 0;

setInterval(() => {
  slides[current].classList.add("an");

  current = (current + 1) % slides.length;

  slides[current].classList.remove("an");
}, 4000); // 4 giây đổi ảnh
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
