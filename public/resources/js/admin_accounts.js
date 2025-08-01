
const updateButtons = document.querySelectorAll(".btn__update");

// để ẩn hi
const formUpdate = document.getElementById("khoiupdate");

const userIdInput = document.getElementById("input-userid");
const usernameInput = document.getElementById("input-username");
const emailInput = document.getElementById("input-email");


const roleInputs = document.querySelectorAll("input[name='role_id']");


updateButtons.forEach(button => {
    button.addEventListener("click", function (e) {
        e.preventDefault();

        // lay dl
        const id = button.getAttribute("data-id");
        const username = button.getAttribute("data-username");
        const email = button.getAttribute("data-email");
        const roleId = button.getAttribute("data-roleid");

        // gán dl
        userIdInput.value = id;
        usernameInput.value = username;
        emailInput.value = email;

// duyêt
        roleInputs.forEach(input => {
            input.checked = input.value === roleId;
        });

        // hiện form
        formUpdate.classList.remove("khoitanghinh");
    });
});



// ẩn
const cancelButton = document.getElementById("cancel");
if (cancelButton) {
    cancelButton.addEventListener("click", function () {
        formUpdate.classList.add("khoitanghinh");
    });
}



//===================================================================


    // ===== XỬ LÝ DELETE =====
    const deleteButtons = document.querySelectorAll(".btn__delete");
    const deleteModal = document.getElementById("khoidelete");
    const yesButton = document.getElementById("Yes");
    const noButton = document.getElementById("No");

    
    let currentDeleteId = null;



    deleteButtons.forEach(button => {
        button.addEventListener("click", function () {
            currentDeleteId = button.getAttribute("data-id");
            deleteModal.classList.remove("khoitanghinh");
        });
    });

    // bấm No → ẩn modal
    noButton.addEventListener("click", function () {
        deleteModal.classList.add("khoitanghinh"); 
    });

    //  chuyển hướng để xóa


    yesButton.addEventListener("click", function () {
        if (currentDeleteId) {
            const deleteUrl = `?mod=admin&controller=accounts&action=delete_accounts&id=${currentDeleteId}`;
            window.location.href = deleteUrl;
        }
    });