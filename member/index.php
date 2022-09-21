<?php 
    session_start();
    include('function.php');
    $users = index();
    if(isset($_REQUEST['submit'])){
        switchRole($_REQUEST);
        echo '<script>alert("權限已更改")</script>';
        header('refresh:0;url=index.php');

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container {
            width: 600px;
            margin: auto;
        }
        table {
            border-collapse: collapse;
        }
        table,td,th {
            border: 1px solid #999;
            padding: 10px;
        }
    </style>
</head>
<body>
    <nav>
        <?php if(!isset($_SESSION['AUTH'])){ ?>
        <a href="login.php">登入</a>
        <a href="register.php">註冊</a>
        <?php } ?>
        <?php if(isset($_SESSION['AUTH'])){ ?>
        <span><?php echo $_SESSION['AUTH']['email'];?></span>
        <?php if(isset($_SESSION['AUTH']) && $_SESSION['AUTH']['role'] == 0){ ?>
        <a href="list.php">會員列表</a>
        <?php } ?>
        <a href="logout.php">登出</a>
        <?php } ?>
    </nav>
    
</body>
</html>