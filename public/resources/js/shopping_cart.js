//  XỬ LÍ SỐ LƯƠNG TĂNG GIẢM 

// Tìm tất cả các dòng sản phẩm (.row.soluong) trong giỏ hàng.
// Lặp qua từng dòng, xử lý riêng biệt từng sản phẩm.

document.querySelectorAll(".row.soluong").forEach(function (itemRow) {

    // Lấy ra id của sản phẩm đó từ data-id
  const itemId = itemRow.getAttribute("data-id");

//   Gán nút cộng và nút trừ vào 2 biến để gắn sự kiện click
  const plus = itemRow.querySelector(".svgplus");
  const minus = itemRow.querySelector(".svgminus");

//   ✅ Khi nhấn nút + (svgplus):
//   → Gửi request lên server để tăng số lượng sản phẩm có id = itemId.
// Dạng dữ liệu gửi: id=3&type=plus
// Sau khi server xử lý xong, gọi location.reload() để tải lại trang, số lượng mới sẽ được hiển thị.
  plus.addEventListener("click", function (e) {
    e.preventDefault();
    fetch("?mod=cart&controller=cart&action=update_qty", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: `id=${itemId}&type=plus`,
    }).then(() => {
      location.reload();
    });
  });

  minus.addEventListener("click", function (e) {
    e.preventDefault();
    fetch("?mod=cart&controller=cart&action=update_qty", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: `id=${itemId}&type=minus`,
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
                
                // Tìm đến <p class="gia"> gần nhất
                const parent = this.closest('.row.type');
                const giaElement = parent.parentNode.querySelector('.gia');
                
                if (price) {
                    giaElement.textContent = formatCurrency(price);
                } else {
                    giaElement.textContent = 'NaN';
                }
            });
        });

        function formatCurrency(amount) {
            return new Intl.NumberFormat('vi-VN', {
                style: 'currency',
                currency: 'VND'
            }).format(amount);
        }
    });


