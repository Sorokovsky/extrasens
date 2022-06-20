<? 
session_start();
if(!$_SESSION['answers']){
    $_SESSION['answers'] = [];
}
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
    <title>Extrasens</title>
</head>
<body>
    <form action="./number.php", method="GET">
        <p><?php echo 'Увас '. $_SESSION['try']. ' спроби'; ?></p>
        <?php if($_SESSION['try'] > 0 AND $_SESSION['rand'] !== $_GET['number']){ ?>
            <p>Оберіть число</p>
            <select name="number" id=""><?php
            for($i = $_SESSION['di']; $i <= $_SESSION['dimax']; $i++){?>
                <option <?php if(in_array($i, $_SESSION['answers'])){echo 'disabled';} ?> value="<?=$i; ?>"><?= $i; ?></option>
            <?php } ?>
        </select>
        <button type="submit">Обрати</button>
        <?php }
        if($_GET['number'] ){
            if($_SESSION['try'] <= 0){
                echo '<p>Ви програли</p>';
                echo '<a href="./again.php">Грати ще раз</a>'; 
            }else if($_SESSION['rand'] == $_GET['number']){
                echo '<p>Ви перемогли</p>';
                if($_SESSION['try'] >= 3){
                    echo '<p>Ви справжній екстрасенс</p>';
                }
                echo '<a href="./again.php">Грати ше раз</a>';
            }else if($_SESSION['rand'] !== $_GET['number']){
                $_SESSION['try'] = $_SESSION['try'] - 1;
        if(count($_SESSION['answers']) == 1){
            if($_GET['number'] >= $_SESSION['di'] + 4){
                $_SESSION['di'] = $_SESSION['di'] + 5;
            }else{
                $_SESSION['dimax'] = $_SESSION['di'] + 4;
            }
        }
                echo '<p>Ви не вгадали</p>';
                    if ($_SESSION['rand'] > $_GET['number']) {
                        echo '<p>Загадане число більше '. $_GET['number'].' .</p>';
                    }else {
                        echo '<p>Загадане число менше '. $_SESSION['number'].' .</p>';
                    }
            }
        }
         ?>

    </form>    
</body>
</html>