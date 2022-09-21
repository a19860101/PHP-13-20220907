<?php
    function pdo(){
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

        return $pdo;
    }

    function now(){

        // 設定時區
        date_default_timezone_set('Asia/Taipei');
        // 設定時間
        $now = date('Y-m-d H:i:s');

        return $now;
    }

   