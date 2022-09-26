<?php
    include('../../vendor/autoload.php');
    use Gjun\Blog\Controller\User;
    $users = User::index();
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
    <?php foreach($users as $user){?>
        <div><?php echo $user['email'];?></div>
        <div><?php echo $user['name'];?></div>
        <div><?php echo $user['role'];?></div>
    <?php } ?>
</body>
</html>