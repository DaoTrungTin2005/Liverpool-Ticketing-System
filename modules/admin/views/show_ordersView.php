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
    <div class="khoichung oder">
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
                        <a href="<?php echo $config['base_url']; ?>?mod=home&controller=home&action=home"
                            class="item__desc">Home</a>
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
                        <a href="<?php echo $config['base_url']; ?>?mod=admin&controller=orders&action=show_orders"
                            class="item__desc">Orders</a>
                        <img src="<?php echo $config['base_url']; ?>public/resources/images/chevron-right 2.png" alt=""
                            class="item__svg" />
                    </div>

                    <!--item5  -->
                    <div class="item__list-item">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="item__img"
                            fill="currentColor">
                            <path
                                d="M96 96C60.7 96 32 124.7 32 160L32 480C32 515.3 60.7 544 96 544L544 544C579.3 544 608 515.3 608 480L608 160C608 124.7 579.3 96 544 96L96 96zM176 352L240 352C284.2 352 320 387.8 320 432C320 440.8 312.8 448 304 448L112 448C103.2 448 96 440.8 96 432C96 387.8 131.8 352 176 352zM152 256C152 225.1 177.1 200 208 200C238.9 200 264 225.1 264 256C264 286.9 238.9 312 208 312C177.1 312 152 286.9 152 256zM392 208L504 208C517.3 208 528 218.7 528 232C528 245.3 517.3 256 504 256L392 256C378.7 256 368 245.3 368 232C368 218.7 378.7 208 392 208zM392 304L504 304C517.3 304 528 314.7 528 328C528 341.3 517.3 352 504 352L392 352C378.7 352 368 341.3 368 328C368 314.7 378.7 304 392 304z" />
                        </svg>
                        <a href="<?php echo $config['base_url']; ?>?mod=admin&controller=contacts&action=show_contacts"
                            class="item__desc">Contacts</a>
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

                    <!--item5  -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="item__img" fill="currentColor">
                        <path
                            d="M96 96C60.7 96 32 124.7 32 160L32 480C32 515.3 60.7 544 96 544L544 544C579.3 544 608 515.3 608 480L608 160C608 124.7 579.3 96 544 96L96 96zM176 352L240 352C284.2 352 320 387.8 320 432C320 440.8 312.8 448 304 448L112 448C103.2 448 96 440.8 96 432C96 387.8 131.8 352 176 352zM152 256C152 225.1 177.1 200 208 200C238.9 200 264 225.1 264 256C264 286.9 238.9 312 208 312C177.1 312 152 286.9 152 256zM392 208L504 208C517.3 208 528 218.7 528 232C528 245.3 517.3 256 504 256L392 256C378.7 256 368 245.3 368 232C368 218.7 378.7 208 392 208zM392 304L504 304C517.3 304 528 314.7 528 328C528 341.3 517.3 352 504 352L392 352C378.7 352 368 341.3 368 328C368 314.7 378.7 304 392 304z" />
                    </svg>
                    <a href="" class="item__desc">Contacts</a>

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
        <div class="khoiphai">
            <div class="khoihello">
                <p class="hello">Hello
                    <?php echo isset($_SESSION['user_login']) ? htmlspecialchars($_SESSION['user_login']) : 'Guest'; ?>
                    👋🏼</p>
            </div>
            <div class="khoitieude">
                <div class="khoitieude-item">
                    <img src="<?php echo $config['base_url']; ?>public/resources/images/liver.png" alt=""
                        class="tieude-img" />
                    <div class="khoicontent">
                        <p class="liver__content">Big Match</p>
                        <p class="liver__number">12,345</p>
                        <div class="liver__topic">
                            <img src="<?php echo $config['base_url']; ?>public/resources/images/muitenlen.png" alt=""
                                class="liver__img" />
                            <p class="liver__desc">Sold</p>
                        </div>
                    </div>
                </div>
                <div class="khoitieude-item">
                    <img src="<?php echo $config['base_url']; ?>public/resources/images/c1.png" alt=""
                        class="tieude-img" />
                    <div class="khoicontent">
                        <p class="liver__content">Accounts</p>
                        <p class="liver__number">1</p>
                        <div class="liver__topic">
                            <img src="<?php echo $config['base_url']; ?>public/resources/images/c1khangia.png" alt=""
                                class="liver__img" />
                            <p class="liver__desc">This month</p>
                        </div>
                    </div>
                </div>
                <div class="khoitieude-item khoionline">
                    <img src="<?php echo $config['base_url']; ?>public/resources/images/epl.png" alt=""
                        class="tieude-img" />
                    <div class="khoicontent">
                        <p class="liver__content">Online</p>
                        <p class="liver__number">1</p>
                        <div class="liver__topic">
                            <img src="<?php echo $config['base_url']; ?>public/resources/images/tindao.png" alt=""
                                class="liver__img" />
                            <p class="liver__desc">Account</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="khoinhap">
                <div class="khoitren">
                    <p class="tren-desc">All ORDERS</p>
                    <div class="tren-topic">
                        <form action="" class="form">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path
                                    d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z"
                                    stroke="#7E7E7E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M21 21L16.65 16.65" stroke="#7E7E7E" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>


                            <input type="hidden" name="mod" value="admin">
                            <input type="hidden" name="controller" value="accounts">
                            <input type="hidden" name="action" value="show_accounts">

                            <input type="text" name="keyword" class="form-input" placeholder="Search... " />

                            <form action="" class="form__sapxep">
                                <label for="">Short by :</label>
                                <select name="thutu" id="thutu">
                                    <option value="1" class="Newest">StM</option>
                                    <option value="2" class="Newest">MtS</option>
                                </select>
                            </form>
                    </div>
                </div>


                <div class="khoigiua">
                    <div class="grid-row">
                        <p class="truong">OrderID</p>
                        <p class="truong">Full Name</p>
                        <p class="truong">Phone</p>
                        <p class="truong">Total</p>
                        <p class="truong">Time Payment</p>
                    </div>

                    <?php foreach ($orders as $order): ?>
                    <div class="grid-row">
                        <p class="row"><?php echo $order['id']; ?></p>
                        <p class="row"><?php echo $order['fullname']; ?></p>
                        <p class="row"><?php echo $order['phone']; ?></p>
                        <p class="row"><?php echo number_format($order['total_amount']); ?></p>
                        <p class="row"><?php echo $order['created_at']; ?></p>
                    </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>



        <div class="khoiupdate khoitanghinh" id="khoiupdate">
            <div class="khoiup">
                <p class="desc descup">Update</p>
            </div>
            <div class="khoinhapup">
                <form action="" class="userID_up form">
                    <label for="" class="label">UserID: </label>
                    <p class="desc"></p>
                </form>
                <form action="" class="userName_up form">
                    <label for="" class="label">Username: </label>
                    <input type="text" class="input" />
                </form>
                <form action="" class="Email_up form">
                    <label for="" class="label">Email: </label>
                    <input type="email" class="input" />
                </form>
                <form action="" class="Role_up form">
                    <label for="" class="label">Role: </label>
                    <div class="thechon">
                        <label class="label"><input type="radio" name="role" class="input" />ADMIN</label>
                        <label class="label"><input type="radio" name="role" class="input" />USER</label>
                    </div>
                </form>
            </div>


            <div class="khoiselectup">
                <button class="btn btn__cancel" id="cancel">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="svg__sec" fill="currentColor">
                        <path
                            d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                    </svg>
                    <a class="desc">Cancel</a>
                </button>
                <button class="btn btn__save" id="save">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg__sec" fill="currentColor">
                        <path
                            d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-111 111-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L369 209z" />
                    </svg>
                    <a class="desc">Save</a>
                </button>
            </div>
        </div>
        <div class="khoidelete khoitanghinh" id="khoidelete">
            <p class="desc desc__0">Waring</p>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg__war" fill="currentColor">
                <path
                    d="M256 32c14.2 0 27.3 7.5 34.5 19.8l216 368c7.3 12.4 7.3 27.7 .2 40.1S486.3 480 472 480L40 480c-14.3 0-27.6-7.7-34.7-20.1s-7-27.8 .2-40.1l216-368C228.7 39.5 241.8 32 256 32zm0 128c-13.3 0-24 10.7-24 24l0 112c0 13.3 10.7 24 24 24s24-10.7 24-24l0-112c0-13.3-10.7-24-24-24zm32 224a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z" />
            </svg>
            <p class="desc desc__1">
                Are you sure you want to delete this data?
            </p>
            <div class="khoiselectdele">
                <button class="btn btn__cancel" id="No">
                    <a class="desc">No</a>
                </button>
                <button class="btn btn__save" id="Yes">
                    <a class="desc">Yes</a>
                </button>
            </div>
        </div>
        <script src="./thaotac.js"></script>
</body>

</html>