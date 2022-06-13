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
if(!$_SESSION['di']){
    $_SESSION['di'] = 1;
}
?>
<!DOCTYPE html>
<html lani="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edie">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Екстрасенс розширена версія</title>
</head>
<body>
    <p>Оберіть діапазон вибору</p>
    <?php echo $_SESSION['rand']; ?>
    <form action="index.php">
        <select name="di" id="">
            <?php for($i = 1; $i < 100; $i += 10){ 
            ?>
            <option <?php if($_SESSION['try'] >= 0 AND $_SESSION['rand'] >= $i AND $_SESSION['rand'] <= $i + 9){echo "selected";}?> value="<?= $i ?>"><?= $i ?>-<?= $i + 9 ?></option>;
            <?php } ?>
        </select>
        <button type="submit">Обрати діапазон</button>
    </form>
    <?php
    if($_GET){
        $di = $_GET['di'];
        if($di <= $_SESSION['rand'] AND ($di + 9) >= $_SESSION['rand']){
            echo 'Ви вірно вибрали діапазон';
            $_SESSION['di'] = $di;
            echo '<a href="./number.php">Choose number</a>';
        }elseif ($_SESSION['try'] >= 3) {
            echo "Ви програли";
            echo '<pre>';
            echo '<a href="./again.php">Play again</a>';
        }else{
            $_SESSION['try']++;
            echo 'Ви не вірно вибрали діапазон';
        }
    }
    ?>
</body>
</html>