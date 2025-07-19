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


        <div class="khoichung">
            <div class="khoiupdate khoiupdate2" id="khoiupdate">
                <div class="khoiup">
                    <p class="desc descup">Update</p>
                </div>

                <div class="khoiphoto">
                    <form action="" method="POST" enctype="multipart/form-data" class="formticket formphoto">
                        <input type="file" name="image" class="inputtic" id="file">
                        <img src="<?php echo $config['base_url']; ?>public/resources/uploads/<?php echo htmlspecialchars($ticket['image']); ?>"
                            alt="" class="inputtic__plus" id="hinhfile">
                        <p class="desc" id="descphoto">Upload Match Background Photo</p>
                </div>

                <div class="khoiformcreate">
                    <div class="formcreate">

                        <div class="the thematch">
                            <label for="" class="labeltic">Match: </label>
                            <input type="text" name="match" class="inputticket"
                                value="<?php echo htmlspecialchars($ticket['match_name']); ?>">
                        </div>

                        <div class="the thedt">
                            <label for="" class="labeltic">Date: </label>
                            <input type="datetime-local" name="date" class="inputticket"
                                value="<?php echo date('Y-m-d\TH:i', strtotime($ticket['match_datetime'])); ?>">
                        </div>

                        <div class="the thetype">
                            <label for="" class="labeltic">TicketType: </label>
                            <select name="vitri" id="TypeTicket" class="inputticket">
                                <option value="1" <?php if ($ticket['ticket_type_id'] == 1) echo 'selected'; ?>>Normal
                                </option>
                                <option value="2" <?php if ($ticket['ticket_type_id'] == 2) echo 'selected'; ?>>Average
                                </option>
                                <option value="3" <?php if ($ticket['ticket_type_id'] == 3) echo 'selected'; ?>>VIP
                                </option>
                            </select>
                        </div>
                        <div class="the theprice">
                            <label for="" class="labeltic">Price(VND): </label>
                            <input type="text" name="price" class="inputticket"
                                value="<?php echo htmlspecialchars($ticket['price']); ?>">
                        </div>
                        <input type="hidden" name="ticket_id" value="<?php echo $ticket['id']; ?>">
                    </div>
                </div>

                <div class="khoiselectup">
                    <button type="submit" name="submit" class="btn btn__save" id="save">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg__sec"
                            fill="currentColor">
                            <path
                                d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-111 111-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L369 209z" />
                        </svg>
                        <span class="desc">Save</span>
                    </button>
                    <a class="btn btn__cancel" id="cancel"
                        href="<?php echo $config['base_url']; ?>?mod=admin&controller=tickets&action=show_tickets">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="svg__sec"
                            fill="currentColor">
                            <path
                                d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                        </svg>
                        <span class="desc">Back</span>
                    </a>
                </div>
                </form>
            </div>
        </div>
        <script src="<?php echo $config['base_url']; ?>public/resources/js/thaotaccreate2.js"></script>

</body>

</html>