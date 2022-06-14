<?php 
session_start();
if(!$_SESSION['di'] AND $_GET){
    $_SESSION['di'] = $_GET['di'];
}
if($_GET['numbers']){
    $_SESSION['answers'][count($_SESSION['answers'])] = $_GET['numbers'];
}
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose number</title>
</head>
<body>
    <?php
    ?>
    <form action="./number.php" method="get">
        <p>Choose number</p>
        <?php if($_SESSION['try'] <= 3){?>
            <select name="numbers">
            <?php for ($i = $_SESSION['di']; $i <= ($_SESSION['di'] + 9); $i++) {
                        $dis = false; 
                        for($g = 0; $g < count($_SESSION['answers']); $g++){
                            if($_SESSION['answers'][$g] == $i){
                                $dis = true;
                                break;
                            }
                        } ?>
                    <option  value="<?= $i ?>"><?= $i ?></option>
            <?php }?>
        </select>
        <button type="submit">Choose</button>
        <?php } ?>
    </form>
    <?php
     if($_SESSION['try'] > 3){
        echo "Ви програли";
        echo '<pre>';
        echo '<a href="./again.php">Play again</a>';
    }
    else if($_GET['numbers']){
        if($_SESSION['try'] > 3){
            echo "Ви програли";
            echo '<pre>';
            echo '<a href="./again.php">Play again</a>';
        }else if($_SESSION['rand'] === $_GET['numbers']){
            if($_SESSION['try'] == 1){
                echo 'Ви справжній екстрасенс';
            }else{
                echo 'Ви вгадаои число з '.$_SESSION['try'].' разу';
            }
            echo '<pre>';
            echo '<a href="./again.php">Play again</a>';
        }else{
            $_SESSION['try'] = $_SESSION['try'] + 1;
            if($_SESSION['rand'] < $_SESSION['numbers']){
                echo 'загадане число менше '.$_SESSION['numbers'].'.';
            }else if($_SESSION['rand'] > $_SESSION['numbers']){
                echo 'загадане число більше '.$_SESSION['numbers'].'.';
            }
        }
    }
    ?>
</body>
</html>