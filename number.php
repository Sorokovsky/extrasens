<?php 
session_start();
    echo $_SESSION['di']
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
                        for($g = $_SESSION['answers']; $g < count($_SESSION['ansvers']); $g++){?>
                <option <?php if($i == $_SESSION['answers']){echo 'disabled';} ?> value="<?= $i ?>"><?= $i ?></option>
            <?php } }?>
        </select>
        <button type="submit">Choose</button>
    </form>
</body>
</html>