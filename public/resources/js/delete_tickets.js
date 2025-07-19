document.addEventListener("DOMContentLoaded", function () {
  const deleteButtons = document.querySelectorAll(".btn__delete");
  const warningModal = document.getElementById("khoidelete");
  const noBtn = document.getElementById("No");
  const yesBtn = document.getElementById("Yes");
  let selectedId = null;

  deleteButtons.forEach(function (button) {
    button.addEventListener("click", function (e) {
      e.preventDefault();
      selectedId = this.getAttribute("data-id");
      warningModal.classList.remove("khoitanghinh");
    });
  });

  noBtn.addEventListener("click", function (e) {
    e.preventDefault();
    warningModal.classList.add("khoitanghinh");
    selectedId = null;
  });

  yesBtn.addEventListener("click", function (e) {
    e.preventDefault();
    if (selectedId) {
      const deleteUrl = `?mod=admin&controller=tickets&action=delete_tickets&id=${selectedId}`;
      window.location.href = deleteUrl;
    }
  });
});
