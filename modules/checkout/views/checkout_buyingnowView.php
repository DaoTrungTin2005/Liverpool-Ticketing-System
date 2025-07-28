<?php global $config, $error; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo $config['base_url']; ?>public/resources/css/reset.css" />
    <link rel="stylesheet" href="<?php echo $config['base_url']; ?>public/resources/css/style_checkout.css" />
    <link rel="apple-touch-icon" sizes="57x57" href="./LFC.ico/apple-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="60x60" href="./LFC.ico/apple-icon-60x60.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="./LFC.ico/apple-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="./LFC.ico/apple-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="./LFC.ico/apple-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="./LFC.ico/apple-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="./LFC.ico/apple-icon-152x152.png" />
    <link rel="apple-touch-icon" sizes="180x180" href="./LFC.ico/apple-icon-180x180.png" />
    <link rel="icon" type="image/png" sizes="192x192" href="./LFC.ico/android-icon-192x192.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="./LFC.ico/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="96x96" href="./LFC.ico/favicon-96x96.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="./LFC.ico" />
    <link rel="manifest" href="./LFC.ico/manifest.json" />
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png" />
    <meta name="theme-color" content="#ffffff" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Istok+Web:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet" />
    <title>Payment</title>
</head>


<body>
    <form action="<?php echo $config['base_url']; ?>?mod=checkout&controller=checkout&action=checkout_buynow_redirect"
        method="POST" class="form-thanh-toan">
        <div class="container">
            <div class="tieude">
                <a href="<?php echo $config['base_url']; ?>?mod=home&controller=home&action=home">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="svg">
                        <path
                            d="M169.4 297.4C156.9 309.9 156.9 330.2 169.4 342.7L361.4 534.7C373.9 547.2 394.2 547.2 406.7 534.7C419.2 522.2 419.2 501.9 406.7 489.4L237.3 320L406.6 150.6C419.1 138.1 419.1 117.8 406.6 105.3C394.1 92.8 373.8 92.8 361.3 105.3L169.3 297.3z" />
                    </svg>
                </a>
                <p class="desc">MAKE A PAYMENT</p>
            </div>
            <div class="gach"></div>
            <div class="phude">
                <p class="desc">Proceed to checkout</p>
            </div>

            <div class="khoinhap">
                <div class="form fullname">
                    <label for="fullname" class="label">Full Name: </label>
                    <input type="text" name="fullname" id="fullname" class="input" placeholder="Enter Full Name"
                        required />
                </div>
                <div class="form phonenumber">
                    <label for="phone" class="label">Phone Number: </label>
                    <input type="text" name="phone" id="phone" class="input" placeholder="Enter Phone Number"
                        required />
                </div>
                <div class="form email">
                    <label for="email" class="label">Enter your email: </label>
                    <input type="email" name="email" id="email" class="input" placeholder="Enter Your Email" required />
                </div>
            </div>

            <div class="khoithongtin">
                <p class="desc"><?php echo htmlspecialchars($ticket['match_name']); ?> -
                </p>
                <div class="form">
                    <select name="ticket_type_id" id="TypeTicket" class="inputticket"
                        data-id="<?php echo $ticket['id']; ?>">
                        <?php foreach ($ticket_types as $type): ?>
                        <option value="<?php echo $type['ticket_type_id']; ?>"
                            data-price="<?php echo $type['price']; ?>">
                            <?php echo htmlspecialchars($type['ticket_type_name']); ?> -
                            <?php echo currency_format($type['price']); ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <?php
                // Mặc định chọn loại đầu tiên để tính tổng
                $default_price = $ticket_types[0]['price'];
            ?>

            <div class="khoitongia">
                <input type="hidden" name="total_price" id="total_price" value="<?php echo $default_price; ?>">
                <input type="hidden" name="ticket_id" value="<?php echo $ticket['id']; ?>">

                <p class="desc">Total :</p>
                <div class="item">
                    <p class="desc tonggia gia" id="total_price_display"><?php echo currency_format($default_price); ?>
                    </p>
                </div>
            </div>

            <div class="khoinut">
                <button class="btn desc" type="submit">Make a payment</button>
            </div>
        </div>
    </form>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const ticketSelect = document.querySelector('#TypeTicket');
        const totalPriceInput = document.querySelector('#total_price');
        const totalPriceDisplay = document.querySelector('#total_price_display');

        if (ticketSelect) {
            ticketSelect.addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                const price = parseFloat(selectedOption.getAttribute('data-price'));
                const ticketId = this.getAttribute('data-id');
                const ticketTypeId = this.value;

                if (!isNaN(price)) {
                    totalPriceDisplay.textContent = formatCurrency(price);
                    totalPriceInput.value = price;

                    // Gửi AJAX để cập nhật session
                    fetch('?mod=checkout&controller=checkout&action=update_buynow_session', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                            },
                            body: `ticket_id=${ticketId}&ticket_type_id=${ticketTypeId}&price=${price}`
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                console.log('Session cập nhật thành công:', data);
                            } else {
                                console.error('Lỗi cập nhật session:', data.message);
                            }
                        })
                        .catch(error => console.error('Lỗi:', error));
                } else {
                    totalPriceDisplay.textContent = 'NaN';
                    totalPriceInput.value = 0;
                }
            });
        }

        function formatCurrency(amount) {
            return amount.toLocaleString('vi-VN') + ' đ';
        }
    });
    </script>
</body>

</html>