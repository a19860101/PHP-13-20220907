<?php
    namespace Gjun\Blog\Controller;

    use Gjun\Blog\Config\DB;
    use PDO;
    class User {
        function index(){
            $sql = 'SELECT * FROM users';
            try{
                $users = pdo()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                return $users;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }
        static function store($request){
            extract($request);
            $sql = 'INSERT INTO users(email,pw,name,created_at,updated_at)VALUES(?,?,?,?,?)';
            if(User::checkMail($email)!=0){
                return User::checkMail($email);
            }
            try{
                $stmt = DB::pdo()->prepare($sql);
                $pw = password_hash($pw,PASSWORD_DEFAULT);
                $stmt->execute([$email,$pw,$name,DB::now(),DB::now()]);
                return [
                    'errCode' => 0,
                    'status' => '登入成功'
                ];
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }
        static function checkMail($email){
            $sql = 'SELECT * FROM users WHERE email = ?';
            $stmt = DB::pdo()->prepare($sql);
            $stmt -> execute([$email]);
            if($stmt->rowCount() > 0){
                return [
                    'errCode' => 3,
                    'status' => '帳號重複，請重新註冊!'
                ];
            }else{
                return 0;
            }
        }
        static function auth($request){
            session_start();
            extract($request);
            $sql = 'SELECT * FROM users WHERE email = ?';
            $stmt = DB::pdo()->prepare($sql);
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
        static function logout(){
            session_start();
            session_destroy();
        }
        function switchRole($request){
            extract($request);
            $sql = 'UPDATE users SET role=? WHERE id= ?';
            $stmt = pdo()->prepare($sql);
            $role = $role == 0 ? 1 : 0;
            $stmt->execute([$role,$id]);
        }
        function denied(){
            if(!session_id()){
                session_start();
            }
            if(!isset($_SESSION['AUTH']) || $_SESSION['AUTH']['role'] != 0){
                // echo $_SESSION['AUTH']['role'];
                header('location:index.php');
                return;
            }
        }
    }