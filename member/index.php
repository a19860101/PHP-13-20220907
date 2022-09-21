<?php 
    session_start();
    include('function.php');
    $users = index();
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
        <a href="logout.php">登出</a>
        <?php } ?>
    </nav>
    <div class="container">
        <table>
            <tr>
                <th>#</th>
                <th>名稱</th>
                <th>Email</th>
                <th>權限</th>
            </tr>
            <?php foreach($users as $user){ ?>
                <tr>
                    <td><?php echo $user['id'];?></td>
                    <td><?php echo $user['name'];?></td>
                    <td><?php echo $user['email'];?></td>
                    <td><?php echo $user['role'];?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>