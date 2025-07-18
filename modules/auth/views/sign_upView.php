<?php global $config, $error; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo $config['base_url']; ?>public/admin_accounts/css/reset.css" />
    <link rel="stylesheet" href="<?php echo $config['base_url']; ?>public/admin_accounts/css/style__dangky.css" />
    <title>SignUp</title>
    <style>
    .error {
        color: #ff0a0aff;
        font-size: 1.2rem;
        margin-top: -10px;
    }
    </style>
</head>

<body>
    <div class="khoichung">
        <div class="khoitrai"></div>
        <img src="<?php echo $config['base_url']; ?>public/admin_accounts/images/z6666575087159_54d06a0ac61ca2f06e7947c9d165dc4f.png"
            alt="" class="stevenG8" />
        <div class="khoiphai">
            <p class="desc signup">Sign Up</p>

            <div class="khoinhap">

                <form action="" method="POST" class="formchung">

                    <div class="form username">
                        <label class="label">Username</label>
                        <input type="text" name="username" class="input"
                            value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>" />
                        <p class="desc error">
                            <?php echo isset($error['username']) ? $error['username'] : ''; ?>
                        </p>
                    </div>

                    <div class="form email">
                        <label class="label">Email</label>
                        <input type="email" name="email" class="input"
                            value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" />
                        <p class="desc error">
                            <?php echo isset($error['email']) ? $error['email'] : ''; ?>
                        </p>
                    </div>

                    <div class="form password">
                        <label class="label">Password</label>
                        <input type="password" name="password" class="input" />
                        <p class="desc error">
                            <?php echo isset($error['password']) ? $error['password'] : ''; ?>
                        </p>
                    </div>

                    <div class="form confirm">
                        <label class="label">Confirm Password</label>
                        <input type="password" name="confirm_password" class="input" />
                        <p class="desc error">
                            <?php echo isset($error['confirm_password']) ? $error['confirm_password'] : ''; ?>
                        </p>
                    </div>

            </div>

            <div class="khoibtn">

                <a href="<?php echo $config['base_url']; ?>?mod=auth&controller=auth&action=sign_in" class="link">
                    <button class="btn back" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="svg" fill="currentColor" viewBox="0 0 512 512">
                            <path
                                d="M48.5 224L40 224c-13.3 0-24-10.7-24-24L16 72c0-9.7 5.8-18.5 14.8-22.2s19.3-1.7 26.2 5.2L98.6 96.6c87.6-86.5 228.7-86.2 315.8 1c87.5 87.5 87.5 229.3 0 316.8s-229.3 87.5-316.8 0c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0c62.5 62.5 163.8 62.5 226.3 0s62.5-163.8 0-226.3c-62.2-62.2-162.7-62.5-225.3-1L185 183c6.9 6.9 8.9 17.2 5.2 26.2s-12.5 14.8-22.2 14.8L48.5 224z" />
                        </svg>
                        Back
                    </button>
                </a>

                <button class="btn next" type="submit" name="btn-submit">
                    <span class="link">Next</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="svg" fill="currentColor" viewBox="0 0 512 512">
                        <path
                            d="M334.5 414c8.8 3.8 19 2 26-4.6l144-136c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22l0 72L32 192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32l288 0 0 72c0 9.6 5.7 18.2 14.5 22z" />
                    </svg>
                </button>
            </div>

            </form>
        </div>
    </div>
</body>

</html>