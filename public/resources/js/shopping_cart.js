//  XỬ LÍ SỐ LƯƠNG 

document.querySelectorAll(".row.soluong").forEach(function (itemRow) {
    const itemId = itemRow.getAttribute("data-id");
    const plus = itemRow.querySelector(".svgplus");
    const minus = itemRow.querySelector(".svgminus");

    //              ìm drop down cái mà   chọn loại,       cái id đúng mà nãy mình chọn
    const select = document.querySelector(`.inputticket[data-id="${itemId}"]`);

    
    const getTicketTypeId = () => {
        return select ? select.value : 1; 
    };

    plus.addEventListener("click", function (e) {
        e.preventDefault();
        const ticketTypeId = getTicketTypeId();

        //Gửi req
        fetch("?mod=cart&controller=cart&action=update_qty", {
            method: "POST",
            headers: {

                //tb gửi dạng chuỗi form
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
// XỬ LÍ LOẠIiiiii 

document.addEventListener('DOMContentLoaded', function () {

    const ticketSelects = document.querySelectorAll('.inputticket');

    // lặp qua dr d
    ticketSelects.forEach(select => {
        select.addEventListener('change', function () {

            // lay gia cưa dr d đó
            const selectedOption = this.options[this.selectedIndex];
            const price = selectedOption.getAttribute('data-price');

            const ticketTypeId = this.value; 
            const itemId = this.getAttribute("data-id"); 

            // dòng loại vé chứa dr d  htai 
            const parent = this.closest('.row.type');

            // tìm thêm 1 cấp chaaa                   cái mà bao toàn
            const container = parent.parentNode; 

            const giaElement = container.querySelector('.gia');
            const qtyElement = container.querySelector('#soluong');
            const tongGiaElement = container.querySelector('.tonggia');

            const qty = parseInt(qtyElement.textContent);

            if (price && !isNaN(qty)) {
                const newGia = parseFloat(price);
                giaElement.textContent = formatCurrency(newGia);

                const tongGia = newGia * qty;
                tongGiaElement.textContent = formatCurrency(tongGia);

                updateTotalFinal();
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

    //từng ite m 
    const tongGiaElements = document.querySelectorAll('.tonggia');


    tongGiaElements.forEach(function (item) {

        // nd góc
        const originalText = item.textContent;
        const cleanedText = originalText.replace(/[^\d]/g, ''); //xóa kt


        const number = parseInt(cleanedText, 10);



        if (!isNaN(number)) {
            total += number;
        }
    });

    // gán ngược lại
    const finalTotalElement = document.querySelector('.tongfinal');
    if (finalTotalElement) {
        finalTotalElement.textContent = formatCurrency(total);
    } else {
        console.warn("K tìm thấy phần tử .tongfinal");
    }
}

function formatCurrency(amount) {
    return amount.toLocaleString('en-US') + ' đ';
}


document.addEventListener('DOMContentLoaded', function () {
    updateTotalFinal();
});




