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
   .accordion__item {
margin-bottom: 0.5rem;
border-radius: 0.25rem;
box-shadow: 0 0.125rem 0.25rem rgb(0 0 0 / 15%);
}

    .accordion__header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0.75rem 1rem;
  color: #fff;
  font-weight: 500;
  background-color: #bd8528;
  border-top-left-radius: 0.25rem;
  border-top-right-radius: 0.25rem;
  cursor: pointer;
  transition: background-color 0.2s ease-out;
}

.accordion__header::after {
  flex-shrink: 0;
  width: 1.25rem;
  height: 1.25rem;
  margin-left: auto;
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23ffffff'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
  background-repeat: no-repeat;
  background-size: 1.25rem;
  content: "";
}

.accordion__item_show .accordion__header::after {
  transform: rotate(-180deg);
}

.accordion__header:hover {
  background-color: #9e7228;
}

.accordion__item_hidden .accordion__header {
  border-bottom-right-radius: 0.25rem;
  border-bottom-left-radius: 0.25rem;
}

.accordion__body {
  padding: 0.75rem 1rem;
  overflow: hidden;
  background: #ffb338;
  border-bottom-right-radius: 0.25rem;
  border-bottom-left-radius: 0.25rem;
}

.accordion__item:not(.accordion__item_show) .accordion__body {
  display: none;
}
</style>
    <header>
        <div class="wrap-logo">
            <h2 class="title"><a href="../../index.php">MEME-logia</a></h2>
        </div>
        <div class="wrap-logo">
             <h2 class="title"><a href="../random_mem/index.php">Рандомный мем</a></h2>
        </div>
        <nav>
            <h2><a href="../../avatars.php">Аватарки</a></h2>
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
    <main>
<!-- Tab content -->
<div class="accordion" id="accordion-1" style="max-width: 30rem; margin: 1rem auto 2rem;">
    <div class="accordion__item">
      <div class="accordion__header">Upload</div>
      <div class="accordion__body">
        <div class="accordion__item">
          <div class="accordion__header">Meme</div>
          <div class="accordion__body">
            <?php
if(isset($_POST['submit_hight'])){
    $suffix = '-hight';
} elseif(isset($_POST['submit_width'])){
    $suffix = '-width';
}

if(isset($suffix)){
    $uploadDir = '../../assets/image/meme';
    
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
        <div class="accordion__item">
          <div class="accordion__header">Avatars</div>
          <div class="accordion__body">
            <?php
if(isset($_POST['submit_square'])){
    $suffix = '-square';
} elseif(isset($_POST['submit_width'])){
    $suffix = '-width';
}

if(isset($suffix)){
    $uploadDir = '../../assets/image/avatars/';
    
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
                <input type="submit" name="submit_square" value="Загрузить - квадратную аватарку" />
                <input type="submit" name="submit_width" value="Загрузить - широкую аватарку" />
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="accordion__item delete">
      <div class="accordion__header">Delete</div>
      <div class="accordion__body">
        <div class="accordion__item">
          <div class="accordion__header">Meme</div>
          <div class="accordion__body">
            <form method="POST">
            <label for="photoNumber">Номер мема:</label>
            <input type="number" name="photoNumber" id="photoNumber">
            <button type="submit">Удалить мем</button>
        </form>
        <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем номер фотографии из поля input
    $inputNumber = $_POST['photoNumber'];

    // Папка, где хранятся фотографии
    $photoFolder = '../../assets/image/meme';

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
          </div>
        </div>
        <div class="accordion__item">
          <div class="accordion__header">Avatars</div>
          <div class="accordion__body">
            <form method="POST">
            <label for="photoNumber">Номер аватарки:</label>
            <input type="number" name="photoNumber" id="photoNumber">
            <button type="submit">Удалить аватарку</button>
        </form>
        <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем номер фотографии из поля input
    $inputNumber = $_POST['photoNumber'];

    // Папка, где хранятся фотографии
    $photoFolder = '../../assets/image/avatars';

    // Получаем список файлов в папке
    $files = scandir($photoFolder);

    // Ищем файл, соответствующий номеру фотографии
    foreach ($files as $file) {
        if (is_file($photoFolder . $file)) {
            $filename = pathinfo($file, PATHINFO_FILENAME);

            // Игнорируем окончание в виде "-hight" или "-width"
            $filename = preg_replace('/-(?:square|width)$/', '', $filename);

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
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    class ItcAccordion {
      constructor(target, config) {
        this._el = typeof target === 'string' ? document.querySelector(target) : target;
        const defaultConfig = {
          alwaysOpen: true
        };
        this._config = Object.assign(defaultConfig, config);
        this.addEventListener();
      }
      addEventListener() {
        this._el.addEventListener('click', (e) => {
          const elHeader = e.target.closest('.accordion__header');
          if (!elHeader) {
            return;
          }
          if (!this._config.alwaysOpen) {
            const elOpenItem = this._el.querySelector('.accordion__item_show');
            if (elOpenItem) {
              elOpenItem !== elHeader.parentElement ? elOpenItem.classList.toggle('accordion__item_show') : null;
            }
          }
          elHeader.parentElement.classList.toggle('accordion__item_show');
        });
      }
    }
    new ItcAccordion('#accordion-1');
    new ItcAccordion('#accordion-2');
  </script>
</main>
<footer id="footer">
    <a href="https://www.youtube.com/channel/UCcvGNCtnBaYwSHbAg3ExmSg"><img src="../../assets/youtube.png" alt="youtube-logo" id="youtube"></a>
    <p id="avtor">Progrmming by: Krenic 2023</p>
</footer>
</body>
</html>
