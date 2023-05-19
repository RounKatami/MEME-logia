<!DOCTYPE html>
<html lang="ru">
<head>
<link rel="apple-touch-icon" sizes="57x57" href="assets/logo/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="assets/logo/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="assets/logo/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="assets/logo/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="assets/logo/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="assets/logo/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="assets/logo/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="assets/logo/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="assets/logo/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="assets/logo/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="assets/logo/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="assets/logo/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="assets/logo/favicon-16x16.png">
<link rel="manifest" href="assets/logo/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="assets/logo/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    <title>MEME-logia</title>
</head>
<body>
    <div class="pod">
    <style>
    /* CSS для центрирования изображения */
.centered-image {
    display: block;
    margin: 0 auto;
    margin-top:10px;
    width:350px;
    height:500px;
    border: 9px solid white;
}
    </style>
        <header>
            <div class="nav">
                <h2 class="page2"><a href="page/random_mem/index.php">Рандомный_мем</a></h2>
            </div>
        </header>
        
        <main>
        <style>
            @media screen and (max-width:800px){
            #meme{
                width: 100%;
                background-color: #bd8528;
            }

            #main, #random{
                font-size:5px;
            }

            .centered-image{
                width:230px;
                height:350px;
            }
        }
    </style>
    <style>
    <?php
    $folder = 'assets/image/'; // Замените на фактический путь к папке с изображениями

    // Получаем список файлов в папке
    $files = scandir($folder);

    // Перебираем каждый файл
    foreach ($files as $file) {
        $file_path = $folder . '/' . $file;

        // Проверяем, является ли файл изображением
        if (is_file($file_path) && in_array(pathinfo($file_path, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif'])) {
            // Определяем класс в зависимости от имени файла
            $image_class = '';
            $css_styles = '';

            if (strpos($file, '-hight') !== false) {
                $image_class = 'image_height';
                $css_styles = 'width: 290px; height: 400px; margin: 0 auto; border: 3px solid white; margin-bottom: 10px;';
            } elseif (strpos($file, '-width') !== false) {
                $image_class = 'image_width';
                $css_styles = 'width: 430px; height: 300px; margin: 0 auto; border: 3px solid white; margin-bottom: 10px;';
            }

            // Выводим CSS стили в зависимости от класса изображения
            echo '.' . $image_class . ' { ' . $css_styles . ' }';
        }
    }
    ?>

    @media (max-width: 800px) {
        .image_width {
            width: 100%;
        }
    }
</style>
            <div id="meme">
            <?php
    // Получаем список файлов в папке (если он не был получен ранее)
    if (!isset($files)) {
        $files = scandir($folder);
    }

    // Перебираем каждый файл
    foreach ($files as $file) {
        $file_path = $folder . '/' . $file;

        // Проверяем, является ли файл изображением
        if (is_file($file_path) && in_array(pathinfo($file_path, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif'])) {
            // Определяем класс в зависимости от имени файла
            $image_class = '';
            if (strpos($file, '-hight') !== false) {
                $image_class = 'image_height';
            } elseif (strpos($file, '-width') !== false) {
                $image_class = 'image_width';
            }

            // Выводим изображение с классом в элементе <div>
            echo '<div style="text-align: center;">';
            echo '<img src="' . $file_path . '" alt="' . $file . '" class="' . $image_class . '">';
            echo '</div>';
        }
    }
    ?>
            </div>
        </main>
    </div>
    <footer id="footer">
        <a href="https://www.youtube.com/channel/UCcvGNCtnBaYwSHbAg3ExmSg"><img src="assets/youtube.png" alt="youtube-logo" id="youtube"></a>
        <p id="avtor">Progrmming by: Krenic 2023</p>
        <a href="test_admin.php">LOLOLLO</a>
    </footer>
</body>
</html>