<?php
    include('function.php');
    $result = store($_REQUEST);
    extract($result);
    if($errCode == 0){
        echo '<script>alert("註冊成功，請重新登入!");</script>';
        header('refresh:0;url=index.php');
    }else{
        echo "<script>alert('{$status}')</script>";
        header('refresh:0;url=register.php');
    }

   