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
                    <p class="tren-desc">All Accounts</p>
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
                        <p class="truong">UserID</p>
                        <p class="truong">Username</p>
                        <p class="truong">Email</p>
                        <p class="truong">Role</p>
                        <p class="truong">Action</p>
                    </div>

                    <?php if (!empty($list_users)) { ?>
                    <?php foreach ($list_users as $user) { ?>
                    <div class="grid-row">
                        <p class="row"><?php echo $user['id']; ?></p>
                        <p class="row"><?php echo $user['username']; ?></p>
                        <p class="row"><?php echo $user['email']; ?></p>
                        <p class="row"><?php echo $user['role_name']; ?></p>


                        <!-- Gán data-id, data-username, data-email, data-roleid vào từng nút Update trong vòng lặp foreach. -->

                        <form class="form__grid" action="javascript:void(0);">
                            <button class="btn btn__update" type="button" data-id="<?php echo $user['id']; ?>"
                                data-username="<?php echo $user['username']; ?>"
                                data-email="<?php echo $user['email']; ?>"
                                data-roleid="<?php echo $user['role_id']; ?>">
                                <span class="link">Update</span>
                            </button>

                            <button class="btn btn__delete" type="button" data-id="<?php echo $user['id']; ?>">
                                <span class="link">Delete</span>
                            </button>
                        </form>
                    </div>
                    <?php } ?>
                    <?php } else { ?>
                    <p class="row">No users found.</p>
                    <?php } ?>

                </div>
                <div class="khoiduoi">
                    <p class="show">Showing data</p>
                    <button class="but btn">
                        <a href="<?php echo $config['base_url']; ?>?mod=admin&controller=accounts&action=create_accounts"
                            class="link">Create User</a>
                    </button>
                </div>
            </div>

            <form method="POST"
                action="<?php echo $config['base_url']; ?>?mod=admin&controller=accounts&action=update_accounts">
                <div class="khoiupdate khoitanghinh" id="khoiupdate">
                    <div class="khoiup">
                        <p class="desc descup">Update</p>
                    </div>
                    <div class="khoinhapup">
                        <div class="userID_up form" style="flex-direction: column; align-items: flex-start;">
                            <label class="label">UserID: </label>
                            <input type="text" name="id" id="input-userid" class="input" readonly />
                        </div>
                        <div class="userName_up form" style="flex-direction: column; align-items: flex-start;">
                            <label class="label">Username: </label>
                            <input type="text" name="username" class="input" id="input-username" required />
                        </div>
                        <div class="Email_up form" style="flex-direction: column; align-items: flex-start;">
                            <label class="label">Email: </label>
                            <input type="email" name="email" class="input" id="input-email" required />
                        </div>
                        <div class="Role_up form" style="flex-direction: column; align-items: flex-start;">
                            <label class="label">Role: </label>
                            <div class="thechon">
                                <label class="label">
                                    <input type="radio" name="role_id" value="1" class="input" /> ADMIN
                                </label>
                                <label class="label">
                                    <input type="radio" name="role_id" value="2" class="input" /> USER
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="khoiselectup">
                        <button type="button" class="btn btn__cancel"
                            onclick="window.location.href='<?php echo $config['base_url']; ?>?mod=admin&controller=accounts&action=show_accounts'">
                            <svg class="svg__sec" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            <span class="desc">Cancel</span>
                        </button>

                        <button type="submit" class="btn btn__save" name="btn-submit">
                            <svg class="svg__sec" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="desc">Save</span>
                        </button>
                    </div>
                </div>
            </form>


            <div class="khoidelete khoitanghinh" id="khoidelete">
                <p class="desc desc__0">Warning</p>

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg__war" fill="currentColor">
                    <path
                        d="M256 32c14.2 0 27.3 7.5 34.5 19.8l216 368c7.3 12.4 7.3 27.7 .2 40.1S486.3 480 472 480L40 480c-14.3 0-27.6-7.7-34.7-20.1s-7-27.8 .2-40.1l216-368C228.7 39.5 241.8 32 256 32zm0 128c-13.3 0-24 10.7-24 24l0 112c0 13.3 10.7 24 24 24s24-10.7 24-24l0-112c0-13.3-10.7-24-24-24zm32 224a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z" />
                </svg>

                <p class="desc desc__1">
                    Are you sure you want to delete this data?
                </p>

                <div class="khoiselectdele">
                    <button class="btn btn__cancel" type="button" id="No">
                        <span class="desc">No</span>
                    </button>
                    <button class="btn btn__save" type="button" id="Yes">
                        <span class="desc">Yes</span>
                    </button>
                </div>
            </div>


            <script src="<?php echo $config['base_url']; ?>public/resources/js/admin_accounts.js"></script>
</body>

</html>