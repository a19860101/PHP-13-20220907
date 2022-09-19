<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="002.php" method="post">
        <label for="">session</label>
        <input type="text" name="msg">
        <input type="submit">
    </form>
    <?php
        // var_dump(isset($_SESSION['MSG']));
        if(isset($_SESSION['MSG'])){
            echo '您的SESSION為'.$_SESSION['MSG'];
        }
    ?>
</body>
</html>