<?php
    include('../../vendor/autoload.php');

    use Gjun\Blog\Controller\User;

    $result = User::auth($_REQUEST);

    var_dump($result);
    extract($result);

    if($errCode == 0){
        echo "<script>alert('{$status}')</script>";
        header('refresh:0;url=index.php');
    }else{
        echo "<script>alert('{$status}')</script>";
        header('refresh:0;url=login.php');
    }