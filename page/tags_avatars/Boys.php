<!DOCTYPE html>
<html lang="ru">
<head>
<link rel="apple-touch-icon" sizes="57x57" href="../../assets/logo/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="../../assets/logo/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="../../assets/logo/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="../../assets/logo/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="../../assets/logo/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="../../assets/logo/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="../../assets/logo/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="../../assets/logo/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="../../assets/logo/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="../../assets/logo/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="../../assets/logo/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="../../assets/logo/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="../../assets/logo/favicon-16x16.png">
<link rel="manifest" href="../../assets/logo/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="../../assets/logo/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../assets/css/style.css" rel="stylesheet" type="text/css">
    <title>MEME-logia | Тег: Boys</title>
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

.image_square {
    width: 300px;
    height: 300px;
    margin: 0 auto;
    border: 3px solid white;
    margin-bottom: 10px;
}
    </style>
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

            h2{
                font-size:17px;
            }

            header{
                width: 100%;
    background-color: #fcd697;
    box-shadow: 0px 5px 15px black;
    padding:10px;
    margin: 0;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    flex-wrap: wrap;
    font-weight: 700;
            }
        }
    </style>
        <header>
        <div class="wrap-logo">
            <h2 class="title"><a href="index.php">MEME-logia</a></h2>
        </div>
        <div class="wrap-logo">
             <h2 class="title"><a href="page/random_mem/index.php">Рандомный мем</a></h2>
        </div>
        <nav>
            <h2><a href="#">Аватарки</a></h2>
        </nav>
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
    $folder = 'assets/image/avatars/'; // Замените на фактический путь к папке с изображениями

     // Получаем список файлов в папке
    $files = scandir($folder);

    // Создаем массив для хранения размеров изображений
    $image_sizes = [];

    // Перебираем каждый файл
    foreach ($files as $file) {
        $file_path = $folder . '/' . $file;

        // Проверяем, является ли файл изображением
        if (is_file($file_path) && in_array(pathinfo($file_path, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif'])) {
            // Получаем размеры изображения
            list($width, $height) = getimagesize($file_path);

            // Определяем класс и стили в зависимости от имени файла
            $image_class = '';
            $css_styles = '';

            if (strpos($file, '-hight') !== false) {
                $image_class = 'image_square';
                $css_styles = 'width: 300px; height: 300px; margin: 0 auto; border: 3px solid white; margin-bottom: 10px;';
            } elseif (strpos($file, '-width') !== false) {
                $image_class = 'image_width';
                $css_styles = 'width: 430px; height: 300px; margin: 0 auto; border: 3px solid white; margin-bottom: 10px;';
            } elseif (strpos($file, '-square') !== false) {
                $image_class = 'image_square';
                $css_styles = 'width: 350px; height: 350px; margin: 0 auto; border: 3px solid white; margin-bottom: 10px;';
            }

            // Добавляем размеры изображения в массив
            $image_sizes[$file] = $width * $height;

            // Выводим CSS стили в зависимости от класса изображения
            echo '.' . $image_class . ' { ' . $css_styles . ' }';
        }
    }

    // Сортируем массив размеров изображений в порядке убывания
    arsort($image_sizes);

    // Отсортированный массив файлов по первым двум цифрам в названии
    $sorted_files = [];
    foreach ($image_sizes as $file => $size) {
        $sorted_files[$file] = intval(substr($file, 0, 4));
    }
    array_multisort($sorted_files, SORT_DESC, $image_sizes);

    ?>

    @media (max-width: 800px) {
        .image_width {
            width: 100%;
        }
    }
</style>
            <div id="meme">
    <?php
    $folder = 'assets/image/avatars/'; // Замените на фактический путь к папке с изображениями

    // Загрузка данных из JSON файла
    $jsonFile = '../../avatars.json';
    $jsonData = file_get_contents($jsonFile);
    $existingData = json_decode($jsonData, true);

    // Перебираем каждый элемент данных
    foreach ($existingData as $data) {
        $photo = $data['photo'];
        $tags = $data['tags'];

        // Проверяем, содержит ли тег "Boys"
        if (in_array('Boys', $tags)) {
            // Выводим фотографию
            echo '<div style="text-align: center;">';
            echo '<img src="' . $photo . '" alt="Аватарка" class="image" style="width: 350px; height: 350px; border: 3px solid white;">';
            echo '</div>';

            // Выводим теги
            echo '<div style="text-align: center;" class="tegs">';
            echo '<div class="tegs" style="display: inline-block; background-color: black; backdrop-filter: blur(2px); max-width: 350px; word-wrap: break-word; margin-bottom: 10px;">';
            foreach ($tags as $tag) {
                echo '<a href="../../page/tags_avatars/' . $tag . '" style="color: white; padding: 5px 10px; margin-right: 5px; display: inline-block;">';
                echo '<span style="color:#00d5e0;">#</span>' . $tag;
                echo '</a>';
            }
            echo '</div>';
        }
    }
    ?>
</div>
        </main>
    </div>
    <footer id="footer">
        <a href="https://www.youtube.com/channel/UCcvGNCtnBaYwSHbAg3ExmSg"><img src="../../assets/youtube.png" alt="youtube-logo" id="youtube"></a>
        <p id="avtor">Progrmming by: Krenic 2023</p>
    </footer>
</body>
</html>
