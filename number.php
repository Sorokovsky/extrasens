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
        <select name="numbers">
            <?php for ($i = $_SESSION['di']; $i <= ($_SESSION['di'] + 9); $i++) {
                        $dis = false; 
                        for($g = 0; $g < count($_SESSION['answers']); $g++){
                            if($_SESSION['answers'][$g] == $i){
                                $dis = true;
                                break;
                            }
                        } ?>
                        <?php if($dis === true){echo "disabled";}?>
                    <option <?php if($dis === true){echo "disabled";}?> value="<?= $i ?>"><?= $i ?></option>
            <?php }?>
        </select>
        <button type="submit">Choose</button>
    </form>
    <?php 
    if($_GET['numbers']){
        if($_SESSION['try'] > 3){
            echo "Ви програли";
            echo '<pre>';
            echo '<a href="./again.php">Play again</a>';
        }else if($_SESSION['rand'] == $_GET['numbers']){
            echo $_SESSION['rand'];
            if($_SESSION['try'] == 0){
                echo 'Ви справжній екстрасенс';
            }else{
                echo 'Ви вгадаои число '.$_SESSION['try'].' з разу';
            }
            echo '<pre>';
            echo '<a href="./again.php">Play again</a>';
        }else{
            $_SESSION['try'] = $_SESSION['try'] + 1;
            if($_SESSION['rand'] > $_SESSION['numbers']){
                echo 'загадане число менше '.$_SESSION['numbers'].'.';
            }else{
                echo 'загадане число більше '.$_SESSION['numbers'].'.';
            }
        }
    }
    ?>
</body>
</html>