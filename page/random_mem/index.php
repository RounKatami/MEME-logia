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
    <link href="../../assets/css/style.css?random_string" rel="stylesheet" type="text/css">
    <title>Рандомный мем</title>
</head>
<body>
        <style>
            @media screen and (max-width:800px){
            #meme{
                width: 100%;
                margin: auto;
                background-color: #bd8528;
            }

            #main, #random{
                font-size:19px;
                padding-right:2px;
            }

            .random_btn{
                margin-left:30%;
            }
        }
    </style>
        <header>
        <div class="wrap-logo">
            <h2 class="title"><a href="../../index.php">MEME-logia</a></h2>
        </div>
        <div class="wrap-logo">
             <h2 class="title"><a href="#">Рандомный мем</a></h2>
        </div>
        <nav>
            <h2><a href="../../avatars.php">Аватарки</a></h2>
        </nav>
        </header>
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

        .random_btn{
            margin-top:15px;
            margin-left:45%;
            border:5px solid aqua;
            border-radius:5px;
            width:120px;
            height:60px;
        }
    </style>
    <main>
        <div id="meme">
            <?php
// Путь к папке с изображениями
$dir = '../../assets/image/meme';

// Получаем список файлов в папке
$files = glob($dir . '/*.*');

// Если нажата кнопка, выводим случайное изображение
if (isset($_POST['random_image'])) {
    // Выбираем случайное изображение из списка файлов
    $randomImage = $files[array_rand($files)];

    // Выводим HTML-код для отображения изображения с классом "centered-image"
    echo '<img src="' . $randomImage . '" alt="Случайное изображение" class="centered-image">';
}
?>
            <form method="post">
                <button type="submit" name="random_image" class="random_btn"><b>Random</b></button>
            </form>
        </div>
    </main>
    <footer id="footer">
        <a href="https://www.youtube.com/channel/UCcvGNCtnBaYwSHbAg3ExmSg"><img src="../../assets/youtube.png" alt="youtube-logo" id="youtube"></a>
        <p id="avtor">Progrmming by: Krenic 2023</p>
    </footer>
</body>
</html>
