<?php session_start();
if($_GET['number']){
    $_SESSION['answers'][count($_SESSION['answers'])] = $_GET['number'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose number</title>
</head>
<body>
    <p>Оберіть число</p>
    <?php if($_SESSION['try'] < 3) { ?>
        <form action="./number.php" method="get">
        <select name="number">
        <?php for($i = $_SESSION['di']; $i <= $_SESSION['di'] + 9; $i++){
                $dis = false;
                for($g = 0; $g < count($_SESSION['answers']); $g++) {
                    if($i == $_SESSION['answers'][$g]){
                        $dis = true;
                    }}?>
        <option <?php if($_GET['number'] AND $dis == true){echo 'disabled';} ?> value="<?= $i ?>"><?= $i ?></option>
            <?php } ?>
       
       </select>
       <button type="submit">Обрати</button>
    </form>
    <?php } ?>
    <?php 
    if($_GET){
        if($_SESSION['try'] >= 3){
            echo 'Ви прогали.';
            echo '<pre>';
            echo '<a href="./again.php">Грати знову</a>';
        }if($_GET['number'] == $_SESSION['rand']){
            if($_SESSION['try'] == 0){
                echo 'Ви справжній екстрасенс.';
            }else{
                echo 'Ви перемоги з'.($_SESSION['try'] + 1).' разу';
            }
            echo '<pre>';
            echo '<a href="./again.php">Грати знову</a>';
        }
        else if($_SESSION['rand'] !== $_GET['number'] AND $_SESSION['try'] < 3){
            echo 'Ви обрали не вірне число.';
            echo '<pre>';
            if($_GET['number'] < $_SESSION['rand']){
                echo 'Зашадане число менше'. $_GET['number']. '.';
            }else if($_GET['number'] > $_SESSION['rand']){
                echo 'Зашадане число більше'. $_GET['number']. '.';
            }
            $_SESSION['try'] = $_SESSION['try'] + 1;
        }
    }
    ?>
</body>
</html>