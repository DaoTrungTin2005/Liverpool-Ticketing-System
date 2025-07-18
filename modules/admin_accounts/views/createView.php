<?php global $config; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo $config['base_url']; ?>public/resources/css/reset.css" />
    <link rel="stylesheet" href="<?php echo $config['base_url']; ?>public/resources/css/style__create.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400..900&family=PT+Serif+Caption:ital@0;1&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <title>Create Account</title>
    <style>
    .error {
        color: red;
        font-size: 0.9rem;
        margin-top: 4px;
        display: block;
        padding: 0;
    }
    </style>
</head>

<body>
    <div class="khoichung">

        <!-- Bên trái -->
        <div class="khoitrai">
            <div class="trai__desc">
                <a href="<?php echo $config['base_url']; ?>?mod=admin_accounts&controller=accounts&action=show"
                    class="link">
                    <img src="<?php echo $config['base_url']; ?>public/resources/images/arrow-left-solid.svg" alt="" />
                </a>
                <p class="desc">You will never walk alone</p>
            </div>

            <div class="trai__img">
                <img src="<?php echo $config['base_url']; ?>public/resources/images/bills.jpg" alt=""
                    class="trai__img--item trai__img--1" />
                <img src="<?php echo $config['base_url']; ?>public/resources/images/klopp.jpg" alt=""
                    class="trai__img--item trai__img--2" />
                <img src="<?php echo $config['base_url']; ?>public/resources/images/g8.jpg" alt=""
                    class="trai__img--item trai__img--3" />
            </div>

            <div class="trai__point">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" class="point-1">
                    <path
                        d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" class="point-2">
                    <path
                        d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" class="point-3">
                    <path
                        d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z" />
                </svg>
            </div>
        </div>

        <!-- Bên phải -->
        <div class="khoiphai">
            <div class="khoitren">
                <p class="create">Create Account</p>
            </div>

            <form action="" method="POST">
                <div class="nhaplieu">

                    <!-- Username -->
                    <div class="form username">
                        <label class="label">Username</label>
                        <input type="text" name="username" class="input" value="<?php echo set_value('username'); ?>" />
                        <p class="error"><?php echo form_error('username'); ?></p>
                    </div>

                    <!-- Email -->
                    <div class="form email">
                        <label class="label">Email</label>
                        <input type="email" name="email" class="input" value="<?php echo set_value('email'); ?>" />
                        <p class="error"><?php echo form_error('email'); ?></p>
                    </div>

                    <!-- Password -->
                    <div class="form password">
                        <label class="label">Password</label>
                        <input type="password" name="password" class="input" />
                        <p class="error"><?php echo form_error('password'); ?></p>
                    </div>

                    <!-- Role -->
                    <div class="form role">
                        <label class="label">Role</label>
                        <div class="thechon">
                            <span>
                                <input type="radio" name="role" value="ADMIN"
                                    <?php echo (set_value('role') == 'ADMIN') ? 'checked' : ''; ?> />
                                ADMIN
                            </span>
                            <span>
                                <input type="radio" name="role" value="USER"
                                    <?php echo (set_value('role') == 'USER') ? 'checked' : ''; ?> />
                                USER
                            </span>
                        </div>
                        <p class="error"><?php echo form_error('role'); ?></p>
                    </div>

                </div>

                <!-- Submit -->
                <div class="khoiduoi">
                    <button type="submit" name="btn-submit" class="btn">Create Account</button>
                </div>
            </form>

        </div>
    </div>
    <script src="<?php echo $config['base_url']; ?>public/resources/js/admin_accounts.js"></script>
</body>

</html>