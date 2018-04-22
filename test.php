<?php
$testList = glob('tests/*.json');
$testCount = count($testList);

if (array_key_exists('selectNumberTest', $_GET)) {
    $filter = FILTER_VALIDATE_INT; # задаем параметры фильтра
    $options = ['options' => ['min_range' => 1, 'max_range' => $testCount]];
    $validate = filter_input(INPUT_GET, 'selectNumberTest', $filter, $options);
    if (!$validate) {
        header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
        echo '404 Not Found';
        exit();
    } else {
        $questions = json_decode(file_get_contents('tests/' . 'Test' . $_GET['selectNumberTest'] . '.json'), true);
    }
}

if (!empty($_POST)) {
    foreach ($questions as $numberTest => $quest) {
        $num = $numberTest + 1;
        if ($_POST["$numberTest"] == $quest['correctAnswerNum']) {
            echo "Ответ на " . $num . " вопрос правильный." . "</br>";
        } else {
            echo "Ответ на " . $num . " вопрос не правильный." . "</br>";
        }
    }
    echo '<p><a href="list.php">К списку загруженных тестов</a></p>
    <p><a href="admin.php">К форме загрузки тестов</a></p>';
    exit;
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if (isset( $questions)) {
            echo '<h3>Выберите правильный ответ:</h3>';
            foreach ($questions as $numberQuest => $quest) {
                ?>
                <form method="POST">
                    <fieldset>
                        <legend><?= $numberQuest + 1 ?>.<?= $quest['question'] ?></legend>
                        <?php foreach ($quest['answers'] as $numberAnswer => $answer) { ?>
                            <label><input name="<?= $numberQuest ?>" type="radio" value="<?= ++$numberAnswer ?>"><?= $answer ?></label>
                        <?php } ?>
                    </fieldset>
                    <?php
                }
            }
            ?>
            <input type="submit" value="Отправить">
        </form>       
    </body>
</html>  
