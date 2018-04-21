<?php
$data = json_decode(file_get_contents(__DIR__ . '/alltests.json'), true);
//print_r($data);
//exit;
?>    
<!doctype html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Загруженные тесты</title>
    </head>
    <body>
        <h2>Выберите тест</h2>
        <ol>
            <?php foreach ($data as $numberTest => $test): ?>
                <li>
                    Тест № <?= ++$numberTest ?>
                </li>
            <?php endforeach ?>
        </ol>
        <form action="test.php" method="get">
            <label>
                <input type="text" name="selectNumberTest">
            </label>
            <input type="submit" value="Подтвердить">
        </form>
        <a href="admin.php">К форме загрузки тестов</a>
    </body>
</html>