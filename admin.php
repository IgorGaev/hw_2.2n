<?php
if (isset($_FILES['testfile']['tmp_name']) && file_exists($_FILES['testfile']['tmp_name'])) {
    $json = "json";

    $tempName = $_FILES['testfile']['tmp_name'];
    $explode = explode(".", $_FILES['testfile']['name']);

    if ($explode[1] == $json) {
        if ($data = json_decode(file_get_contents($tempName), true)) {
            $files = scandir('tests/');
            $num_test = count($files) - 1;
            if (move_uploaded_file($tempName, 'tests/' . 'Test' . $num_test . '.json')) {
                echo "<p>Файл успешно загружен!</p>";
            }
        }
    } else {
        echo '<p>Ошибка! Можно загружать только файлы с разрешением json.</p>';
    }
}
?>
<!doctype html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Тест</title>
    </head>
    <body>
        <h1>Загрузите файл с тестом</h1>
        <form enctype="multipart/form-data" method="post">
            <p><input name="testfile" type="file"></p>
            <input type="submit" value="Загрузить">
        </form>
        <a href="list.php">К списку загруженных тестов</a>
    </body>
</html>