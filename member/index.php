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
    <nav>
        <?php if(!isset($_SESSION['AUTH'])){ ?>
        <a href="login.php">登入</a>
        <a href="register.php">註冊</a>
        <?php } ?>
        <?php if(isset($_SESSION['AUTH'])){ ?>
        <span><?php echo $_SESSION['AUTH']['email'];?></span>
        <a href="logout.php">登出</a>
        <?php } ?>
    </nav>
</body>
</html>