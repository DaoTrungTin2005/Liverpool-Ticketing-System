// Lấy các phần tử
const updateButtons = document.querySelectorAll(".btn__update");

// để ẩn hi
const formUpdate = document.getElementById("khoiupdate");

const userIdInput = document.getElementById("input-userid");
const usernameInput = document.getElementById("input-username");
const emailInput = document.getElementById("input-email");


const roleInputs = document.querySelectorAll("input[name='role_id']");

// Dùng forEach để thêm sự kiện click cho từng nút btn__update
updateButtons.forEach(button => {
    button.addEventListener("click", function (e) {
        e.preventDefault();

        // Lấy dữ liệu từ các data attribute
        const id = button.getAttribute("data-id");
        const username = button.getAttribute("data-username");
        const email = button.getAttribute("data-email");
        const roleId = button.getAttribute("data-roleid");

        // Gán dữ liệu vào các ô input 
        userIdInput.value = id;
        usernameInput.value = username;
        emailInput.value = email;

// Duyệt qua tất cả các radio button (ví dụ: value="1" cho ADMIN, value="2" cho USER).
        roleInputs.forEach(input => {
            input.checked = input.value === roleId;
        });

        // Hiện form update
        formUpdate.classList.remove("khoitanghinh");
    });
});



// Lấy nút có ID cancel để ẩn form
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

    // lưu id user mà vừa bấm delete. sau đó dùng biến này để truyền vào URL khi nhấn nút Yes
    let currentDeleteId = null;

    // Bắt sự kiện khi click nút Delete
    // Gán data-id vào currentDeleteId
    // Hiện modal xác nhận xóa

    deleteButtons.forEach(button => {
        button.addEventListener("click", function () {
            currentDeleteId = button.getAttribute("data-id");
            deleteModal.classList.remove("khoitanghinh"); // Hiện modal
        });
    });

    // bấm No → ẩn modal
    noButton.addEventListener("click", function () {
        deleteModal.classList.add("khoitanghinh"); // ẩn modal
    });

    //  chuyển hướng để xóa


    yesButton.addEventListener("click", function () {
        if (currentDeleteId) {
            const deleteUrl = `?mod=admin&controller=accounts&action=delete_accounts&id=${currentDeleteId}`;
            window.location.href = deleteUrl;
        }
    });