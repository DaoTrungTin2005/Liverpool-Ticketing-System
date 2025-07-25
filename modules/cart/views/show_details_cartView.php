    <?php global $config, $error; ?>
    <!DOCTYPE html>
    <html lang="vi">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Home</title>
        <link rel="stylesheet" href="<?php echo $config['base_url']; ?>public/resources/css/reset.css" />
        <link rel="stylesheet" href="<?php echo $config['base_url']; ?>public/resources/css/style__shoppingcart.css" />
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
        <link rel="manifest" href="<?php echo $config['base_url']; ?>public/resources/icon/manifest.json" />
        <meta name="msapplication-TileColor" content="#ffffff" />
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png" />
        <meta name="theme-color" content="#ffffff" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Istok+Web:ital,wght@0,400;0,700;1,400;1,700&display=swap"
            rel="stylesheet" />
    </head>

    <body>
        <div class="container">

            <div class="header">
                <img src="<?php echo $config['base_url']; ?>public/resources/images/Rectangle93.png"
                    alt="Liverpool Background" class="background" />
                <div class="khoilogo">
                    <img src="<?php echo $config['base_url']; ?>public/resources/images/liverpoolfc_crest 1.png"
                        alt="logo Liverpool" class="img" />
                </div>
                <div class="khoinav">
                    <a href="<?php echo $config['base_url']; ?>?mod=home&controller=home&action=home" class="
                        desc">Home</a>
                    <a href="#!" class="desc">About Us</a>
                    <a href="#!" class="desc">News</a>
                </div>
                <div class="thanhsearch">
                    <img src="<?php echo $config['base_url']; ?>public/resources/images/search 1.svg" alt="Kinh lup"
                        class="img" />
                    <form action="" class="form">
                        <input type="text" placeholder="Search" class="input" />
                    </form>
                </div>


                <!-- Giỏ hàng -->
                <div class="cart">
                    <a href="<?php echo $config['base_url']; ?>?mod=cart&controller=cart&action=show_details_cart">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg" fill="currentColor">
                            <path
                                d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96zM252 160c0 11 9 20 20 20l44 0 0 44c0 11 9 20 20 20s20-9 20-20l0-44 44 0c11 0 20-9 20-20s-9-20-20-20l-44 0 0-44c0-11-9-20-20-20s-20 9-20 20l0 44-44 0c-11 0-20 9-20 20z" />
                        </svg>

                        <!-- <div class="hienso">
                            <p class="number">1</p>
                        </div> -->
                    </a>
                </div>





                <div class="khoiuser">

                    <?php if (isset($_SESSION['is_login']) && $_SESSION['is_login'] === true): ?>
                    <!-- ĐÃ ĐĂNG NHẬP -->

                    <div class="login user">
                        <img src="<?php echo $config['base_url']; ?>public/resources/images/Login.png" alt="login"
                            class="img" />
                        <span class="desc"><?php echo htmlspecialchars($_SESSION['user_login']); ?></span>
                    </div>
                    <div class="gach"></div>
                    <div class="signup user">
                        <img src="<?php echo $config['base_url']; ?>public/resources/images/signup.png" alt="signup"
                            class="img" />
                        <a href="<?php echo $config['base_url']; ?>?mod=auth&controller=auth&action=logout"
                            class="desc">Log Out</a>
                    </div>

                    <?php else: ?>
                    <!-- CHƯA ĐĂNG NHẬP -->

                    <div class="login user">
                        <img src="<?php echo $config['base_url']; ?>public/resources/images/Login.png" alt="login"
                            class="img" />
                        <a href="<?php echo $config['base_url']; ?>?mod=auth&controller=auth&action=sign_in"
                            class="desc">Sign in</a>
                    </div>
                    <div class="gach"></div>
                    <div class="signup user">
                        <img src="<?php echo $config['base_url']; ?>public/resources/images/signup.png" alt="signup"
                            class="img" />
                        <a href="<?php echo $config['base_url']; ?>?mod=auth&controller=auth&action=sign_up"
                            class="desc">Sign Up</a>
                    </div>

                    <?php endif; ?>
                </div>

            </div>







            <div class="body">
                <div class="top">


                    <div class="tieude">
                        <p class="truong">Match</p>
                        <p class="truong">Ticket type</p>
                        <p class="truong">Ticket price</p>
                        <p class="truong">Quantity</p>
                        <p class="truong">Total</p>
                        <p class="truong">Action</p>
                    </div>





                    <?php if (!empty($_SESSION['cart'])): ?>
                    <?php foreach ($_SESSION['cart'] as $item): ?>

                    <div class="tieude">
                        <div class="row tran">
                            <div class="khoitran">
                                <div class="khoihinhnhap">
                                    <img src="<?php echo $config['base_url']; ?>public/resources/uploads/<?php echo $item['image']; ?>"
                                        alt="" class="img" />
                                </div>

                                <div class="khoithongtin">
                                    <div class="khoitentran">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="606" height="69"
                                            viewBox="0 0 606 69" fill="currentColor" class="svg__ten">
                                            <path d="M528.311 1.03906L604.68 68.501H0.5V1.03906H528.311Z"
                                                fill="currentColor" stroke="currentColor" />
                                        </svg>
                                        <p class="desc"><?php echo $item['match_name']; ?></p>
                                    </div>
                                </div>

                                <div class="khoithoigian">
                                    <p class="desc"><?php echo date('F d, Y', strtotime($item['match_datetime'])); ?>
                                    </p>
                                    <p class="desc"><?php echo date('H : i', strtotime($item['match_datetime'])); ?>
                                    </p>
                                </div>

                            </div>
                        </div>


                        <div class="row type">
                            <form action="" class="form">
                                <select name="vitri" id="TypeTicket" class="inputticket">
                                    <option value="1" class="Ticket"
                                        <?php if ($item['ticket_type_name'] == 'Normal') echo 'selected'; ?>>Normal
                                    </option>
                                    <option value="2" class="Ticket"
                                        <?php if ($item['ticket_type_name'] == 'Average') echo 'selected'; ?>>Average
                                    </option>
                                    <option value="3" class="Ticket"
                                        <?php if ($item['ticket_type_name'] == 'Vip') echo 'selected'; ?>>Vip
                                    </option>
                                </select>
                            </form>
                        </div>


                        <p class="row gia"><?php echo currency_format($item['price']); ?></p>


                        <div class="row soluong" data-id="<?php echo $item['id']; ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor"
                                class="svgminus">
                                <path
                                    d="M0 256c0-17.7 14.3-32 32-32l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 288c-17.7 0-32-14.3-32-32z" />
                            </svg>
                            <p class="desc" id="soluong" data-id="<?php echo $item['id']; ?>">
                                <?php echo $item['qty']; ?>
                            </p>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" fill="currentColor"
                                class="svgplus">
                                <path
                                    d="M352 128C352 110.3 337.7 96 320 96C302.3 96 288 110.3 288 128L288 288L128 288C110.3 288 96 302.3 96 320C96 337.7 110.3 352 128 352L288 352L288 512C288 529.7 302.3 544 320 544C337.7 544 352 529.7 352 512L352 352L512 352C529.7 352 544 337.7 544 320C544 302.3 529.7 288 512 288L352 288L352 128z" />
                            </svg>
                        </div>


                        <p class="row tonggia"><?php echo currency_format($item['price'] * $item['qty']); ?></p>


                        <div class="row thaotac">
                            <button class="btn btn__delete" id="delete">
                                <a href="<?php echo $config['base_url']; ?>?mod=cart&controller=cart&action=delete&id=<?php echo $item['id']; ?>"
                                    class="link">Delete</a>
                            </button>

                            <div class="ticknone" id="tick">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" id="svg"
                                    class="khoitanghinh">
                                    <path
                                        d="M530.8 134.1C545.1 144.5 548.3 164.5 537.9 178.8L281.9 530.8C276.4 538.4 267.9 543.1 258.5 543.9C249.1 544.7 240 541.2 233.4 534.6L105.4 406.6C92.9 394.1 92.9 373.8 105.4 361.3C117.9 348.8 138.2 348.8 150.7 361.3L252.2 462.8L486.2 141.1C496.6 126.8 516.6 123.6 530.9 134z" />
                                </svg>
                            </div>

                            <form action="" class="form">
                                <input type="checkbox" class="input" id="check" style="display: none" />
                            </form>
                        </div>


                    </div>

                    <?php endforeach; ?>
                    <?php else: ?>
                    <p class="desc">Giỏ hàng trống</p>
                    <?php endif; ?>


                </div>







                <div class="bot">
                    <div class="bottop">
                        <p class="desc">Order total</p>
                    </div>
                    <div class="botbot">
                        <div class="ticknone" id="tickbot">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" id="svgbot"
                                class="khoitanghinh">
                                <path
                                    d="M530.8 134.1C545.1 144.5 548.3 164.5 537.9 178.8L281.9 530.8C276.4 538.4 267.9 543.1 258.5 543.9C249.1 544.7 240 541.2 233.4 534.6L105.4 406.6C92.9 394.1 92.9 373.8 105.4 361.3C117.9 348.8 138.2 348.8 150.7 361.3L252.2 462.8L486.2 141.1C496.6 126.8 516.6 123.6 530.9 134z" />
                            </svg>
                        </div>
                        <p class="desc">All</p>
                        <form action="" class="form">
                            <input type="checkbox" class="input" id="checkbot" style="display: none" />
                        </form>
                        <p class="desc tongfinal">$0</p>
                        <a class="link" href=""><button class="btn desc">Buy ticket</button></a>
                    </div>
                </div>
            </div>




            <div class="footer">
                <div class="khoiliv">
                    <p class="desc tieude">L.F.C</p>
                    <p class="desc">
                        It was devastating for the football club and certainly even more so
                        for his wife and family. We’re out here in Asia but we continue to
                        stay in touch with them in terms of how we will remember them during
                        the matches this week. As well as what we’ll look at in terms of
                        longer, permanent tributes to them as well. A very, very difficult
                        last few weeks. I to say thank you to everybody across the
                        world of sport, not just football but the world of sport, for their
                        outreach and their support – not just at the club but certainly
                        again most importantly, the family. As I have said previously, Diogo
                        was a fantastic footballer but just a really terrific guy and he is
                        deeply missed.
                    </p>
                </div>
                <div class="phai">
                    <div class="quicklink">
                        <p href="" class="tieude">QUICK LINKS</p>
                        <a href="" class="desc">Home</a>
                        <a href="" class="desc">About Us</a>
                        <a href="" class="desc">News</a>
                        <a href="" class="desc">Contract Us</a>
                    </div>
                    <div class="sponsor">
                        <p href="" class="tieude">SPONSOR</p>
                        <a href="" class="desc">Standard Chartered Bank</a>
                        <a href="" class="desc">Nike</a>
                        <a href="" class="desc">AXA</a>
                        <a href="" class="desc">Carlsberg</a>
                        <a href="" class="desc">Sorare</a>
                    </div>
                    <div class="contractinfo">
                        <p href="" class="tieude">CONTRACT INFO</p>
                        <a href="" class="desc">FB: Tin Dao Trung</a>
                        <a href="" class="desc">Phone Number: 0396 288 246</a>
                        <a href="" class="desc">Email: tinancut@gmail.mail</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- <script src="<?php echo $config['base_url']; ?>public/resources/js/thaotacshoppingcart.js"></script> -->
        <script src="<?php echo $config['base_url']; ?>public/resources/js/shopping_cart.js"></script>
    </body>

    </html>