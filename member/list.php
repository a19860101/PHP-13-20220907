<?php 
    session_start();
    include('function.php');
    denied();
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
                <?php if(isset($_SESSION['AUTH']) && $_SESSION['AUTH']['role']==0){ ?>
                <th>更改權限</th>
                <?php } ?>
            </tr>
            <?php foreach($users as $user){ ?>
                <tr>
                    <td><?php echo $user['id'];?></td>
                    <td><?php echo $user['name'];?></td>
                    <td><?php echo $user['email'];?></td>
                    <td>
                        <?php echo $user['role']==0?'管理員':'一般會員';?>
                    </td>
                    <?php if(isset($_SESSION['AUTH']) && $_SESSION['AUTH']['role']==0){ ?>
                    <td>
                        <?php if($user['role'] != 0){ ?>
                        <form action="" method="post">
                            <input type="hidden" value="<?php echo $user['id'];?>" name="id">
                            <input type="hidden" value="<?php echo $user['role'];?>" name="role">
                            <input type="submit" value="設為管理員" name="submit" 
                                <?php if($_SESSION['AUTH']['id']==$user['id']){ echo 'disabled';} ?>
                            >
                        </form>
                        <?php }else{ ?>
                        <form action="" method="post">
                            <input type="hidden" value="<?php echo $user['id'];?>" name="id">
                            <input type="hidden" value="<?php echo $user['role'];?>" name="role">
                            <input type="submit" value="設為一般會員" name="submit"
                                <?php if($_SESSION['AUTH']['id']==$user['id']){ echo 'disabled';} ?>
                            >
                        </form>
                        <?php } ?>
                    </td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>