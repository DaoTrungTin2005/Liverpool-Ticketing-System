    <?php global $config, $error; ?>
    <!DOCTYPE html>
    <html lang="vi">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Home</title>
        <link rel="stylesheet" href="<?php echo $config['base_url']; ?>public/resources/css/reset.css" />
        <link rel="stylesheet" href="<?php echo $config['base_url']; ?>public/resources/css/style__home.css" />
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
                    <a href="#!" class="desc">Home</a>
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
                <div class="cart">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg" fill="currentColor">
                        <path
                            d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96zM252 160c0 11 9 20 20 20l44 0 0 44c0 11 9 20 20 20s20-9 20-20l0-44 44 0c11 0 20-9 20-20s-9-20-20-20l-44 0 0-44c0-11-9-20-20-20s-20 9-20 20l0 44-44 0c-11 0-20 9-20 20z" />
                    </svg>
                </div>
                <div class="khoiuser">
                    <div class="login user">
                        <img src="<?php echo $config['base_url']; ?>public/resources/images/Login.png" alt="login"
                            class="img" />
                        <a href="" class="desc">Login</a>
                    </div>
                    <div class="gach"></div>
                    <div class="signup user">
                        <img src="<?php echo $config['base_url']; ?>public/resources/images/signup.png" alt="signup"
                            class="img" />
                        <a href="" class="desc">Sign Up</a>
                    </div>
                </div>
            </div>
            <div class="special">
                <div class="khoihinh">
                    <img src="<?php echo $config['base_url']; ?>public/resources/images/Liverpool.png" alt=""
                        class="img img__sp" id="img1" />
                    <img src="<?php echo $config['base_url']; ?>public/resources/images/anfield-generic-091124-_6.png"
                        alt="" class="img an img__sp" />
                    <img src="<?php echo $config['base_url']; ?>public/resources/images/jota.png" alt=""
                        class="img an img__sp" id="img2" />
                </div>
                <div class="khoinut">
                    <div class="nut"></div>
                    <div class="nut"></div>
                    <div class="nut"></div>
                </div>
                <div class="infomatch">
                    <div class="khoimatch">
                        <img src="<?php echo $config['base_url']; ?>public/resources/images/jota2.png" alt=""
                            class="img" />
                    </div>
                    <div class="khoiinfo">
                        <pre class="desc">
                “As Liverpool fans we know how to deal with tragedy and show our
                appreciation to someone who has given us so much,” said Culshaw. 
                “I picked this image to paint because it shows Diogo sending love 
                out to the fans and by immortalising him in our city, it shows that
                we are sending the love right back.
                “Diogo has given us so many memories, it’s only right that he will 
                remain our number 20 forever.”
              </pre>
                    </div>
                </div>
            </div>
            <div class="body">
                <div class="khoihang">
                    <div class="khoitran">
                        <div class="khoihinhnhap">
                            <img src="<?php echo $config['base_url']; ?>public/resources/images/1000044842.jpg" alt=""
                                class="img" />
                        </div>
                        <div class="khoithongtin">
                            <div class="khoitentran">
                                <svg xmlns="http://www.w3.org/2000/svg" width="606" height="69" viewBox="0 0 606 69"
                                    fill="currentColor" class="svg__ten">
                                    <path d="M528.311 1.03906L604.68 68.501H0.5V1.03906H528.311Z" fill="currentColor"
                                        stroke="currentColor" />
                                </svg>
                                <p class="desc">LIVERPOOL VS REAL MADRID</p>
                            </div>
                            <div class="khoichon khoian">
                                <a href="" class="link">
                                    <button class="btn">TICKET BOOKING</button>
                                </a>
                                <a href="" class="link">
                                    <button class="btn">ADD TO CART</button>
                                </a>
                            </div>
                        </div>
                        <div class="khoithoigian">
                            <p class="desc">July 25, 2025</p>
                            <p class="desc">8 : 00</p>
                        </div>
                    </div>
                    <div class="khoitran">
                        <div class="khoihinhnhap">
                            <img src="<?php echo $config['base_url']; ?>public/resources/images/1000044841.jpg" alt=""
                                class="img" />
                        </div>
                        <div class="khoithongtin">
                            <div class="khoitentran">
                                <svg xmlns="http://www.w3.org/2000/svg" width="606" height="69" viewBox="0 0 606 69"
                                    fill="none" class="svg__ten">
                                    <path d="M528.311 1.03906L604.68 68.501H0.5V1.03906H528.311Z" fill="currentColor"
                                        stroke="currentColor" />
                                </svg>
                                <p class="desc">LIVERPOOL VS MANCHESTER CITY</p>
                            </div>
                            <div class="khoichon khoian">
                                <a href="" class="link">
                                    <button class="btn">TICKET BOOKING</button>
                                </a>
                                <a href="" class="link">
                                    <button class="btn">ADD TO CART</button>
                                </a>
                            </div>
                        </div>
                        <div class="khoithoigian">
                            <p class="desc">July 25, 2025</p>
                            <p class="desc">8 : 00</p>
                        </div>
                    </div>
                </div>
                <div class="khoihang">
                    <div class="khoitran">
                        <div class="khoihinhnhap">
                            <img src="<?php echo $config['base_url']; ?>public/resources/images/lfcvsmc.webp" alt=""
                                class="img" />
                        </div>
                        <div class="khoithongtin">
                            <div class="khoitentran">
                                <svg xmlns="http://www.w3.org/2000/svg" width="606" height="69" viewBox="0 0 606 69"
                                    fill="none" class="svg__ten">
                                    <path d="M528.311 1.03906L604.68 68.501H0.5V1.03906H528.311Z" fill="currentColor"
                                        stroke="currentColor" />
                                </svg>
                                <p class="desc">LIVERPOOL VS MANCHESTER CITY</p>
                            </div>
                            <div class="khoichon khoian">
                                <a href="" class="link">
                                    <button class="btn">TICKET BOOKING</button>
                                </a>
                                <a href="" class="link">
                                    <button class="btn">ADD TO CART</button>
                                </a>
                            </div>
                        </div>
                        <div class="khoithoigian">
                            <p class="desc">July 25, 2025</p>
                            <p class="desc">8 : 00</p>
                        </div>
                    </div>
                    <div class="khoitran">
                        <div class="khoihinhnhap">
                            <img src="<?php echo $config['base_url']; ?>public/resources/images/lfcvsmc.webp" alt=""
                                class="img" />
                        </div>
                        <div class="khoithongtin">
                            <div class="khoitentran">
                                <svg xmlns="http://www.w3.org/2000/svg" width="606" height="69" viewBox="0 0 606 69"
                                    fill="none" class="svg__ten">
                                    <path d="M528.311 1.03906L604.68 68.501H0.5V1.03906H528.311Z" fill="currentColor"
                                        stroke="currentColor" />
                                </svg>
                                <p class="desc">LIVERPOOL VS MANCHESTER CITY</p>
                            </div>
                            <div class="khoichon khoian">
                                <a href="" class="link">
                                    <button class="btn">TICKET BOOKING</button>
                                </a>
                                <a href="" class="link">
                                    <button class="btn">ADD TO CART</button>
                                </a>
                            </div>
                        </div>
                        <div class="khoithoigian">
                            <p class="desc">July 25, 2025</p>
                            <p class="desc">8 : 00</p>
                        </div>
                    </div>
                </div>
                <div class="khoihang">
                    <div class="khoitran">
                        <div class="khoihinhnhap">
                            <img src="<?php echo $config['base_url']; ?>public/resources/images/lfcvsmc.webp" alt=""
                                class="img" />
                        </div>
                        <div class="khoithongtin">
                            <div class="khoitentran">
                                <svg xmlns="http://www.w3.org/2000/svg" width="606" height="69" viewBox="0 0 606 69"
                                    fill="none" class="svg__ten">
                                    <path d="M528.311 1.03906L604.68 68.501H0.5V1.03906H528.311Z" fill="currentColor"
                                        stroke="currentColor" />
                                </svg>
                                <p class="desc">LIVERPOOL VS MANCHESTER CITY</p>
                            </div>
                            <div class="khoichon khoian">
                                <a href="" class="link">
                                    <button class="btn">TICKET BOOKING</button>
                                </a>
                                <a href="" class="link">
                                    <button class="btn">ADD TO CART</button>
                                </a>
                            </div>
                        </div>
                        <div class="khoithoigian">
                            <p class="desc">July 25, 2025</p>
                            <p class="desc">8 : 00</p>
                        </div>
                    </div>
                    <div class="khoitran">
                        <div class="khoihinhnhap">
                            <img src="<?php echo $config['base_url']; ?>public/resources/images/lfcvsmc.webp" alt=""
                                class="img" />
                        </div>
                        <div class="khoithongtin">
                            <div class="khoitentran">
                                <svg xmlns="http://www.w3.org/2000/svg" width="606" height="69" viewBox="0 0 606 69"
                                    fill="none" class="svg__ten">
                                    <path d="M528.311 1.03906L604.68 68.501H0.5V1.03906H528.311Z" fill="currentColor"
                                        stroke="currentColor" />
                                </svg>
                                <p class="desc">LIVERPOOL VS MANCHESTER CITY</p>
                            </div>
                            <div class="khoichon khoian">
                                <a href="" class="link">
                                    <button class="btn">TICKET BOOKING</button>
                                </a>
                                <a href="" class="link">
                                    <button class="btn">ADD TO CART</button>
                                </a>
                            </div>
                        </div>
                        <div class="khoithoigian">
                            <p class="desc">July 25, 2025</p>
                            <p class="desc">8 : 00</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="news">
                <p class="desc">NEWS</p>
                <div class="khoitintuc">
                    <img src="<?php echo $config['base_url']; ?>public/resources/images/liv1 (1).png" class="img img1"
                        id="anh1"></img>
                    <img src="<?php echo $config['base_url']; ?>public/resources/images/liv1 (2).png" class="img img2"
                        id="anh2"></img>
                    <img src="<?php echo $config['base_url']; ?>public/resources/images/Screenshot 2025-07-22 182104.png"
                        class="img img3" id="anh3"></img>
                    <img src="<?php echo $config['base_url']; ?>public/resources/images/Screenshot 2025-07-22 181124.png"
                        class="img img4" id="anh4"></img>
                    <img src="<?php echo $config['base_url']; ?>public/resources/images/liv1 (5).png" class="img img5"
                        id="anh5"></img>
                </div>
                <div class="khoipoint">
                    <div class="point"></div>
                    <div class="point"></div>
                    <div class="point"></div>
                </div>
            </div>
            <div class="footer">
                <div class="khoiliv">
                    <p class="desc tieude">L.F.C</p>
                    <p class="desc">It was devastating for the football club and certainly even more so for his wife and
                        family.
                        We’re out here in Asia but we continue to stay in touch with them in terms of how we will
                        remember
                        them during the matches this week.
                        As well as what we’ll look at in terms of longer, permanent tributes to them as well. A very,
                        very
                        difficult last few weeks.
                        I want to say thank you to everybody across the world of sport, not just football but the world
                        of
                        sport, for their outreach
                        and their support – not just at the club but certainly again most importantly, the family.
                        As I have said previously, Diogo was a fantastic footballer but just a really terrific guy and
                        he is
                        deeply missed.</p>
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
        <script src="<?php echo $config['base_url']; ?>public/resources/js/thaotachome.js"></script>
    </body>

    </html>