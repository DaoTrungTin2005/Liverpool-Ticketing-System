//  XỬ LÍ SỐ LƯƠNG TĂNG GIẢM 

// Tìm tất cả các dòng sản phẩm (.row.soluong) trong giỏ hàng.
// Lặp qua từng dòng, xử lý riêng biệt từng sản phẩm.

document.querySelectorAll(".row.soluong").forEach(function (itemRow) {
    const itemId = itemRow.getAttribute("data-id");
    const plus = itemRow.querySelector(".svgplus");
    const minus = itemRow.querySelector(".svgminus");

    // ✅ Tìm đúng <select> có cùng data-id
    const select = document.querySelector(`.inputticket[data-id="${itemId}"]`);

    const getTicketTypeId = () => {
        return select ? select.value : 2; // fallback là 2 nếu lỗi
    };

    plus.addEventListener("click", function (e) {
        e.preventDefault();
        const ticketTypeId = getTicketTypeId();
        fetch("?mod=cart&controller=cart&action=update_qty", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            body: `id=${itemId}&type=plus&ticket_type_id=${ticketTypeId}`,
        }).then(() => {
            location.reload();
        });
    });

    minus.addEventListener("click", function (e) {
        e.preventDefault();
        const ticketTypeId = getTicketTypeId();
        fetch("?mod=cart&controller=cart&action=update_qty", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            body: `id=${itemId}&type=minus&ticket_type_id=${ticketTypeId}`,
        }).then(() => {
            location.reload();
        });
    });
});

//========================================================
// XỬ LÍ LOẠI 

document.addEventListener('DOMContentLoaded', function () {
    const ticketSelects = document.querySelectorAll('.inputticket');

    ticketSelects.forEach(select => {
        select.addEventListener('change', function () {
            const selectedOption = this.options[this.selectedIndex];
            const price = selectedOption.getAttribute('data-price');

            const ticketTypeId = this.value; // ✅ Lấy đúng loại vé đã chọn
            const itemId = this.getAttribute("data-id"); // ✅ Lấy ID của item

            // Tìm đến .row.type rồi tìm các phần liên quan
            const parent = this.closest('.row.type');
            const container = parent.parentNode; // cha bao toàn bộ 1 item sản phẩm

            const giaElement = container.querySelector('.gia');
            const qtyElement = container.querySelector('#soluong');
            const tongGiaElement = container.querySelector('.tonggia');

            const qty = parseInt(qtyElement.textContent);

            if (price && !isNaN(qty)) {
                const newGia = parseFloat(price);
                giaElement.textContent = formatCurrency(newGia);

                const tongGia = newGia * qty;
                tongGiaElement.textContent = formatCurrency(tongGia);
            } else {
                giaElement.textContent = 'NaN';
                tongGiaElement.textContent = 'NaN';
            }

                        fetch("?mod=cart&controller=cart&action=update_qty", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                },
                body: `id=${itemId}&type=&ticket_type_id=${ticketTypeId}`,
});
        });
    });

function formatCurrency(amount) {
    return amount.toLocaleString('en-US') + ' đ';
}
});

//==================================================================
function updateTotalFinal() {
    let total = 0;
    const tongGiaElements = document.querySelectorAll('.tonggia');
    console.log("Đã tìm thấy", tongGiaElements.length, "phần tử .tonggia");

    tongGiaElements.forEach(function (item) {
        const originalText = item.textContent;
        const cleanedText = originalText.replace(/[^\d]/g, ''); // Xoá dấu "." và "đ"
        const number = parseInt(cleanedText, 10);

        console.log(`'${originalText}' ➜ '${cleanedText}' ➜`, number);

        if (!isNaN(number)) {
            total += number;
        }
    });

    const finalTotalElement = document.querySelector('.tongfinal');
    if (finalTotalElement) {
        finalTotalElement.textContent = formatCurrency(total);
    } else {
        console.warn("Không tìm thấy phần tử .tongfinal");
    }
}

function formatCurrency(amount) {
    return amount.toLocaleString('vi-VN') + ' đ';
}

// Gọi hàm khi DOM đã sẵn sàng
document.addEventListener('DOMContentLoaded', function () {
    updateTotalFinal();
});




