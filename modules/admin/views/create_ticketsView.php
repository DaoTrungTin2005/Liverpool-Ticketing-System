<?php

global $config;
//show_array($list_users);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo $config['base_url']; ?>public/resources/css/reset.css" />
    <link rel="stylesheet" href="<?php echo $config['base_url']; ?>public/resources/css/style__admin.css">
    <link rel="stylesheet" href="<?php echo $config['base_url']; ?>public/resources/css/repo.css" />
    <title>Admin</title>
</head>

<body>
    <div class="khoichung">
        <div class="khoitrai">
            <div class="khoiadmin">
                <img src="<?php echo $config['base_url']; ?>public/resources/images/setting 1.jpg" alt="icon cai dat"
                    class="admin__img" />
                <p class="admin__noidung">Administrator</p>
            </div>
            <div class="khoiicon">
                <div class="item__list">
                    <!-- icon-1 -->
                    <div class="item__list-item">
                        <img src="<?php echo $config['base_url']; ?>public/resources/images/key-square.png" alt=""
                            class="item__img" />
                        <a href="" class="item__desc">Infomation</a>
                        <img src="<?php echo $config['base_url']; ?>public/resources/images/chevron-right 2.png" alt=""
                            class="item__svg" />
                    </div>
                    <!-- item2 -->
                    <div class="item__list-item">
                        <img src="<?php echo $config['base_url']; ?>public/resources/images/3d-square 1.png" alt=""
                            class="item__img" />
                        <a href="<?php echo $config['base_url']; ?>?mod=admin&controller=tickets&action=show_tickets"
                            class="item__desc">Tickets</a>
                        <img src="<?php echo $config['base_url']; ?>public/resources/images/chevron-right 2.png" alt=""
                            class="item__svg" />
                    </div>
                    <!-- item3 -->
                    <div class="item__list-item item3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="item__img"
                            fill="currentColor">
                            <path
                                d="M399 384.2C376.9 345.8 335.4 320 288 320l-64 0c-47.4 0-88.9 25.8-111 64.2c35.2 39.2 86.2 63.8 143 63.8s107.8-24.7 143-63.8zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 16a72 72 0 1 0 0-144 72 72 0 1 0 0 144z" />
                        </svg>
                        <a href="<?php echo $config['base_url']; ?>?mod=admin&controller=accounts&action=show_accounts"
                            class="item__desc">Accounts</a>
                        <img src="<?php echo $config['base_url']; ?>public/resources/images/chevron-right 2.png" alt=""
                            class="item__svg" />
                    </div>
                    <!--item4  -->
                    <div class="item__list-item">
                        <img src="<?php echo $config['base_url']; ?>public/resources/images/wallet-money 2.png" alt=""
                            class="item__img" />
                        <a href="" class="item__desc">Notification</a>
                        <img src="<?php echo $config['base_url']; ?>public/resources/images/chevron-right 2.png" alt=""
                            class="item__svg" />
                    </div>
                </div>
            </div>
            <div class="khoian">
                <div class="item__listmb">
                    <!-- icon-1 -->
                    <div class="item__list-item">
                        <img src="<?php echo $config['base_url']; ?>public/resources/images/key-square.png" alt=""
                            class="item__img" />
                    </div>
                    <!-- item2 -->
                    <div class="item__list-item">
                        <img src="<?php echo $config['base_url']; ?>public/resources/images/3d-square 1.png" alt=""
                            class="item__img" />
                    </div>
                    <!-- item3 -->
                    <div class="item__list-item item3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="item__img"
                            fill="currentColor">
                            <path
                                d="M399 384.2C376.9 345.8 335.4 320 288 320l-64 0c-47.4 0-88.9 25.8-111 64.2c35.2 39.2 86.2 63.8 143 63.8s107.8-24.7 143-63.8zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 16a72 72 0 1 0 0-144 72 72 0 1 0 0 144z" />
                        </svg>
                    </div>
                    <!--item4  -->
                    <div class="item__list-item">
                        <img src="<?php echo $config['base_url']; ?>public/resources/images/wallet-money 2.png" alt=""
                            class="item__img" />
                    </div>
                </div>
                <script>
                const navPC = document.querySelector(".item__list");
                const navMB = document.querySelector(".item__listmb");
                navMB.innerHTML = navPC.innerHTML;
                </script>
            </div>
            <div class="khoiavt">
                <img src="<?php echo $config['base_url']; ?>public/resources/images/tindao.png" alt=""
                    class="hinhtindao" />
                <div class="item__content">
                    <p class="content-top">
                        <?php echo isset($_SESSION['user_login']) ? htmlspecialchars($_SESSION['user_login']) : 'Guest'; ?>
                    </p>
                    <p class="content-bot">Project Manager</p>
                </div>
                <img src="<?php echo $config['base_url']; ?>public/resources/images/chevron-right 2.png" alt=""
                    class="item__svg" />
            </div>
        </div>


        <div class="khoiphaitic">
            <div class="khoitrentic">
                <p class="desc">Match</p>
                <a href="<?php echo $config['base_url']; ?>?mod=admin&controller=tickets&action=show_tickets"
                    class="lienketback"><img
                        src="<?php echo $config['base_url']; ?>public/resources/images/image 11.png"
                        class="svgtic"></img></a>
            </div>
            <div class="khoihoatiet">
                <img src="<?php echo $config['base_url']; ?>public/resources/images/Line 17.png" alt="" class="soc">
                <img src="<?php echo $config['base_url']; ?>public/resources/images/new1.png" alt=""
                    class="svgthoatiet">
                <img src="<?php echo $config['base_url']; ?>public/resources/images/Line 17.png" alt="" class="soc">
            </div>

            <div class="khoiphoto">
                <form action="" method="POST" enctype="multipart/form-data" class="formticket formphoto">
                    <input type="file" class="inputtic" id="file" name="image">
                    <img src="<?php echo $config['base_url']; ?>public/resources/images /new2.png" alt=""
                        class="inputtic__plus" id="hinhfile">
                    <p class="desc" id="descphoto">Upload Match Background Photo</p>

            </div>

            <div class="khoiformcreate">

                <div class="formcreate">

                    <div class="the thematch">
                        <label for="" class="labeltic">Match: </label>
                        <input type="text" class="inputticket" name="match">
                    </div>
                    <div class="the thedt">
                        <label for="" class="labeltic">Date: </label>
                        <input type="datetime-local" class="inputticket" name="date">
                    </div>
                    <div class="the thetype">
                        <label for="" class="labeltic">TicketType: </label>
                        <select name="vitri" id="TypeTicket" class="inputticket">
                            <option value="1" class="Ticket">Normal</option>
                            <option value="2" class="Ticket">Average</option>
                            <option value="3" class="Ticket">Vip</option>
                        </select>
                    </div>
                    <div class="the theprice">
                        <label for="" class="labeltic">Price(VND): </label>
                        <input type="text" class="inputticket" name="price">
                    </div>
                </div>

            </div>

            <div class="khoinuttic">
                <button type="submit" name="submit" class="btntic lienket">Save</button>
            </div>

            </form>

        </div>
        <script src="<?php echo $config['base_url']; ?>public/resources/js/create_tickets.js"></script>
</body>

</html>