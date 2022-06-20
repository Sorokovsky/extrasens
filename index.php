<?php 
session_start();
if(!$_SESSION['try']){
    $_SESSION['try'] = 3;
}
if(!$_SESSION['rand']){
    $_SESSION['rand'] = rand(1, 100);
}
if($_SESSION['rand'] >= $_GET['di'] AND $_SESSION['rand'] <= $_GET['di'] + 9){
    $_SESSION['di'] = $_GET['di'];
    $_SESSION['dimax'] = $_SESSION['di'] + 9;
    header('Location: /number.php');
}
 ?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extrasense extra</title>
</head>
<body>
    <form action="./index.php">
        <p>Виберіть правильний діапазон</p>
        <p>У вас <?=$_SESSION['try']; ?> спроб.</p>
        <?php if($_SESSION['try'] > 0){?>
            <select name="di" id="">
            <?php
                for($i = 1; $i <= 100; $i = $i + 10){
                if($_GET AND $_SESSION['try'] >= 0 AND $_SESSION['rand'] >= $i AND $_SESSION['rand'] <= $i + 9){ ?>
                        <option <?php ?> value="<?= $i ?>"><?= $i?>-<?= $i + 9 ?></option>
                    <?php }else if(!$_GET){ ?>
                    <option <?php ?> value="<?= $i ?>"><?= $i?>-<?= $i + 9 ?></option>
                    <?php } ?>
                    
            <?php } ?>
        </select>
        <button type="submit">Обрати</button>
        <?php } ?>
    </form>
    <?php
    if($_SESSION['try'] <= 0){
        echo 'Ви програли';
        echo '<pre>';
        echo '<a href="./again.php">Грати знову</a>';
    }
    if($_GET['di']){
        if($_SESSION['try'] <= 0){
            echo 'Ви програли';
            echo '<pre>';
            echo '<a href="./again.php">Грати знову</a>';
        }else if($_SESSION['rand'] >= $_GET['di'] AND $_SESSION['rand'] <= $_GET['di'] + 9){
            echo 'Ви вірно обрали діапазон';
            $_SESSION['di'] = $_GET['di'];
            $_SESSION['dimax'] = $_SESSION['di'] + 9;
            echo '<pre>';
        }else{
            echo 'Ви не вірно обрали діапазон';
            $_SESSION['try'] = $_SESSION['try'] - 1;
        }
    }
    ?>
</body>
</html>