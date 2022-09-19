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
    function auth($request){
        session_start();
        extract($request);
        $sql = 'SELECT * FROM users WHERE email = ?';
        $stmt = pdo()->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!$user){
            return  [
                'errCode' => 1,
                'status' => 'Email不存在，請重新註冊或登入'
            ];
        }
        if(password_verify($pw,$user['pw'])){
            $_SESSION['AUTH'] = $user;
            return [
                'errCode' => 0,
                'status' => '登入成功'
            ];
            
        }else{
            return [
                'errCode' => 2,
                'status' => '帳號或密碼錯誤'
            ];
        }
    }