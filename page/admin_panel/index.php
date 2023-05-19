<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем номер фотографии из поля input
    $inputNumber = $_POST['photoNumber'];

    // Папка, где хранятся фотографии
    $photoFolder = '../../assets/image/';

    // Получаем список файлов в папке
    $files = scandir($photoFolder);

    // Ищем файл, соответствующий номеру фотографии
    foreach ($files as $file) {
        if (is_file($photoFolder . $file)) {
            $filename = pathinfo($file, PATHINFO_FILENAME);

            // Игнорируем окончание в виде "-hight" или "-width"
            $filename = preg_replace('/-(?:hight|width)$/', '', $filename);

            // Получаем первые две цифры в названии файла
            $number = substr($filename, 0, 2);

            // Сравниваем номер с введенным пользователем числом
            if ($number === $inputNumber) {
                // Удаляем файл
                if (unlink($photoFolder . $file)) {
                    echo 'Фотография успешно удалена.';
                } else {
                    echo 'Ошибка при удалении фотографии.';
                }

                break; // Прерываем цикл после удаления первого найденного файла
            }
        }
    }
}
?>

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
    <title>Админ панель</title>
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
            }

            .random_btn{
                margin-left:30%;
            }
        }
    </style>
    <style>
    /* Style the tab */
.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #d1b27d;
}

/* Style the buttons that are used to open the tab content */
.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #bd8528;
}

/* Create an active/current tablink class */
.tab button.active {
    background-color: #a17c40;
}

/* Style the tab content */
.tabcontent {
    margin:0;
    display: none;
    padding: 6px 12px;
    border: 3px solid black;
    border-top: none;
    background-color:#bd8528;
}
</style>
    <header>
        <div id="nav">
            <h1 id="main"><a href="../../index.php">MEME-logia</a></h1>
            <h2 id="random"><a href="../random_mem/index.php">Рандомный_мем</a></h2>
        </div>
    </header>
    <main>
        <!-- Tab links -->
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Upload')">Upload</button>
  <button class="tablinks" onclick="openCity(event, 'Delete')">Delete</button>
</div>

<!-- Tab content -->
<div id="Upload" class="tabcontent">
  <div id="meme">
        <?php
if(isset($_POST['submit_hight'])){
    $suffix = '-hight';
} elseif(isset($_POST['submit_width'])){
    $suffix = '-width';
}

if(isset($suffix)){
    $uploadDir = '../../assets/image/';
    
    $uploadedFile = $_FILES['file']['tmp_name'];
    $fileName = $_FILES['file']['name'];
    $fileParts = pathinfo($fileName);
    
    $newFileName = $fileParts['filename'] . $suffix . '.' . $fileParts['extension'];
    $targetPath = $uploadDir . $newFileName;
    
    // Проверяем, является ли загруженный файл изображением
    $imageFileType = strtolower(pathinfo($targetPath, PATHINFO_EXTENSION));
    $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif', 'webp');
    
    if(in_array($imageFileType, $allowedExtensions)){
        // Перемещаем загруженный файл в указанную папку
        if(move_uploaded_file($uploadedFile, $targetPath)){
            echo 'Файл успешно загружен.';
        } else {
            echo 'Ошибка при загрузке файла.';
        }
    } else {
        echo 'Допустимы только изображения в форматах JPG, JPEG, PNG, GIF и WEBP.';
    }
}
?>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="file" name="file" />
                <input type="submit" name="submit_hight" value="Загрузить - высокий мем" />
                <input type="submit" name="submit_width" value="Загрузить - широкий мем" />
            </form>
        </div>
</div>


<div id="Delete" class="tabcontent">
        <form method="POST">
            <label for="photoNumber">Номер фотографии:</label>
            <input type="text" name="photoNumber" id="photoNumber">
        <button type="submit">Удалить фотографию</button>
    </form>

    </div>

    </div>
<script>
    function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>
    </main>
    <footer id="footer">
        <a href="https://www.youtube.com/channel/UCcvGNCtnBaYwSHbAg3ExmSg"><img src="../../assets/youtube.png" alt="youtube-logo" id="youtube"></a>
        <p id="avtor">Progrmming by: Krenic 2023</p>
    </footer>
</body>
</html>
