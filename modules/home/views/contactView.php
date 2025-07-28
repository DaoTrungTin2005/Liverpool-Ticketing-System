    <?php global $config, $error; ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="<?php echo $config['base_url']; ?>public/resources/css/reset.css" />
        <link rel="stylesheet" href="<?php echo $config['base_url']; ?>public/resources/css/style__contact.css" />
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
        <title>About Us</title>
    </head>

    <body>
        <div class="container">
            <div class="trai">
                <a href="<?php echo $config['base_url']; ?>?mod=home&controller=home&action=home" class="link">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                        <path
                            d="M201.4 297.4C188.9 309.9 188.9 330.2 201.4 342.7L361.4 502.7C373.9 515.2 394.2 515.2 406.7 502.7C419.2 490.2 419.2 469.9 406.7 457.4L269.3 320L406.6 182.6C419.1 170.1 419.1 149.8 406.6 137.3C394.1 124.8 373.8 124.8 361.3 137.3L201.3 297.3z" />
                    </svg>
                </a>
            </div>
            <div class="phai">
                <div class="contact">
                    <p class="desc">CONTACT</p>
                </div>
                <div class="khoinhap">

                    <form action="" method="POST" class="form">
                        <label class="label">Name: </label>
                        <input type="text" class="input sub" name="name" required />

                        <label class="label">Phone: </label>
                        <input type="tel" class="input name" name="phone" required />



                        <label class="label">Email: </label>
                        <input type="email" class="input email" name="email"
                            value="<?php echo htmlspecialchars($email); ?>" readonly />


                        <label class="label">Message</label>
                        <textarea id="message" name="message" rows="6" cols="90" required></textarea>




                </div>
                <div class="btn">
                    <a href="" class="link">
                        <button class="but">Send</button>
                    </a>
                </div>
                </form>
            </div>
        </div>
    </body>

    </html>