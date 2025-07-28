    <?php global $config, $error; ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="<?php echo $config['base_url']; ?>public/resources/css/reset.css" />
        <link rel="stylesheet" href="<?php echo $config['base_url']; ?>public/resources/css/style__news.css" />
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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
        <title>News</title>
    </head>

    <body>
        <div class="container">
            <div class="news">NEWS</div>
            <div class="news-box box1" data-aos="fade-up">
                <div class="news-image">
                    <img src="<?php echo $config['base_url']; ?>public/resources/images/box1.jpg" alt="News" />
                </div>
                <div class="news-content">
                    <p>You Will Never Walk Alone</p>
                    <p class="desc">
                        Fists, fierce shouts, frantic running, heartfelt embraces... Jurgen
                        Klopp had nothing to hide about his true emotions on his debut with
                        Liverpool, as behind the German coach was the traditional song of
                        Anfield - "You'll never walk alone."
                    </p>
                </div>
            </div>
            <div class="news-box box2" data-aos="fade-down">
                <div class="news-image">
                    <img src="<?php echo $config['base_url']; ?>public/resources/images/box2.jpg" alt="News" />
                </div>
                <div class="news-content">
                    <p>Liverpool Fc 2- 0 Liverpool Fc</p>
                    <p class="desc">
                        The match ended with a score of 2-0 in favor of Liverpool. Coach
                        Arne Slot and his team made significant progress in the championship
                        race, creating an 11-point gap over Arsenal. Meanwhile, Man City
                        lost both matches against Liverpool this season but still maintained
                        their position in the top 4.
                    </p>
                </div>
            </div>
            <div class="news-box box3" data-aos="fade-right">
                <div class="news-image">
                    <img src="<?php echo $config['base_url']; ?>public/resources/images/box3(1).jpeg" alt="News" />
                </div>
                <div class="news-content">
                    <p>Diogo Jota - Number 20 Forever</p>
                    <p class="desc">
                        During the pre-season Asian tour, Liverpool players will wear a
                        specially designed jersey featuring the "Diogo J 20" emblem.
                        Memorial flowers will also be placed before the friendly matches in
                        Hong Kong (China), Yokohama, and Anfield.
                    </p>
                </div>
            </div>
            <div class="news-box box4" data-aos="fade-left">
                <div class="news-image">
                    <img src="<?php echo $config['base_url']; ?>public/resources/images/box4.jpg" alt="News" />
                </div>
                <div class="news-content">
                    <p>The Leader Of Premier League</p>
                    <p class="desc">
                        Thanks to Manchester City’s draw, Liverpool seized the opportunity;
                        practical, effective, and victorious in their visit to
                        Wolverhampton, where they claimed the win and the top spot with a
                        penalty awarded for a foul on Diogo Jota, converted by Mohamed Salah
                        just after the hour mark, right after conceding the equalizer at
                        1-1.
                    </p>
                </div>
            </div>
            <a href="<?php echo $config['base_url']; ?>?mod=home&controller=home&action=home" class="btn">Back
            </a>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
        <script>
        AOS.init();
        </script>
    </body>

    </html>