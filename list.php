<?php
 $testList = glob('tests/*.json');
 //print_r($testList);
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
            <?php foreach ($testList as $numberTest => $test):
                $testName = basename($test, ".json");?>
                <li>
                    <a href="test.php?selectNumberTest=<?= ++$numberTest ?>"><?= $testName ?></a>
                </li>
            <?php endforeach ?>
        </ol>
        <a href="admin.php">К форме загрузки тестов</a>
    </body>
</html>