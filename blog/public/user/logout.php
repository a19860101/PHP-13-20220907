<?php
    include('../../vendor/autoload.php');
    
    Gjun\Blog\Controller\User::logout();

    echo "<script>alert('已登出')</script>";
    $webroot = 'http://localhost/php-13-20220907/blog/public/';
    header("refresh:0;url={$webroot}");