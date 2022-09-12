<?php
    $db_host = 'localhost';
    $db_user = 'admin';
    $db_pw = 'admin';
    $db_name = 'php-13-20220907';
    $db_charset = 'utf8mb4';

    $dsn ="mysql:host={$db_host};dbname={$db_name};charset={$db_charset}";
    // data source name

    try {
        $pdo=new PDO($dsn,$db_user,$db_pw);
    }catch(PDOException $e){
        echo $e->getMessage();
    }