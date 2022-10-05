<?php

    include('../../vendor/autoload.php');
    use Gjun\Blog\Controller\User;
    $result = User::store($_REQUEST);

    // var_dump($result);
    extract($result);

    if($errCode == 0){
        echo "<script>alert('{$status}')</script>";
        header('refresh:0;url=login.php');
    }else{
        echo "<script>alert('{$status}')</script>";
        header('refresh:0;url=register.php');
    }

    // echo "<script>alert('註冊成功，請重新登入!')</script>";
    // header('refresh:0;url=login.php');