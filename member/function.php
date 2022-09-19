<?php
    include("db.php");

    function store($request){
        extract($request);
        $sql = 'INSERT INTO users(email,pw,name,created_at,updated_at)VALUES(?,?,?,?,?)';
        try{
            $stmt = pdo()->prepare($sql);
            $pw = password_hash($pw,PASSWORD_DEFAULT);
            $stmt->execute([$email,$pw,$name,now(),now()]);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    function auth(){

    }