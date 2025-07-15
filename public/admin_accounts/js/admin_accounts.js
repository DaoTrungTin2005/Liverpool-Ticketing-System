const updateButtons = document.querySelectorAll(".btn__update");
const formUpdate = document.getElementById("khoiupdate");

const userIdInput = document.getElementById("input-userid");
const usernameInput = document.getElementById("input-username");
const emailInput = document.getElementById("input-email");

//Đây là DOM selector dùng để lấy tất cả các input radio trong form mà có name="role_id".
const roleInputs = document.querySelectorAll("input[name='role_id']");

updateButtons.forEach(button => {
    button.addEventListener("click", function (e) {
        e.preventDefault();

        // Lấy dữ liệu từ các data attribute
        const id = button.getAttribute("data-id");
        const username = button.getAttribute("data-username");
        const email = button.getAttribute("data-email");
        const roleId = button.getAttribute("data-roleid");

        // Gán dữ liệu vào các ô input trong form
        userIdInput.value = id;
        usernameInput.value = username;
        emailInput.value = email;

        // Gán đúng radio role (dựa theo data-roleid)
        // Nếu roleId từ user = 2 → thì cái radio có value="2" sẽ được chọn (checked)
        // Mấy cái còn lại thì không được chọn
        roleInputs.forEach(input => {
            input.checked = input.value === roleId;
        });

        // Hiện form update
        formUpdate.classList.remove("khoitanghinh");
    });
});

// Nút Cancel ẩn form lại (nếu cần)
const cancelButton = document.getElementById("cancel");
if (cancelButton) {
    cancelButton.addEventListener("click", function () {
        formUpdate.classList.add("khoitanghinh");
    });
}



//===================================================================

// ✅ XỬ LÝ DELETE
// ===== XỬ LÝ DELETE =====
const deleteButtons = document.querySelectorAll(".btn__delete");
const deleteModal = document.getElementById("khoidelete");
const yesButton = document.getElementById("Yes");
const noButton = document.getElementById("No");

//Dùng để lưu id user mà vừa bấm "Delete". Sau đó dùng biến này để truyền vào URL khi nhấn nút Yes.
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

// Bấm No → ẩn modal
noButton.addEventListener("click", function () {
    deleteModal.classList.add("khoitanghinh"); // Ẩn modal
});

// Bấm Yes → chuyển hướng để xóa
// → Redirect (chuyển hướng trình duyệt) đến link có chứa ID, ví dụ:
// ?mod=admin_accounts&controller=accounts&action=delete&id=7
// ➡️ File PHP ở action=delete sẽ lấy $_GET['id'] và gọi delete_user(id) để xóa.
yesButton.addEventListener("click", function () {
    if (currentDeleteId) {
        const deleteUrl = `?mod=admin_accounts&controller=accounts&action=delete&id=${currentDeleteId}`;
        window.location.href = deleteUrl;
    }
});