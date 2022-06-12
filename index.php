<?php
session_start();
if(!$_SESSION['rand']){
    $_SESSION['rand'] = rand(1, 100);
}
if(!$_SESSION['try']){
    $_SESSION['try'] = 0;
}
if(!$_SESSION['answers']){
    $_SESSION['answers'] = [];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Екстрасенс розширена версія</title>
</head>
<body>
    <p>Оберіть діапазон вибору</p>
    <form action="index.php">
        <select name="di" id="">
            <?php for($i = 1; $i < 100; $i += 10){ ?>
            <option value="<?= $i ?>"><?= $i ?>-<?= $i + 9 ?></option>;
            <?php } ?>
        </select>
    </form>
</body>
</html>