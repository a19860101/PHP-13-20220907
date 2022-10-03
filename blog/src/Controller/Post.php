<?php
    namespace Gjun\Blog\Controller;
    use PDO;
    use Gjun\Blog\Config\DB;

    class Post {
        static function index(){
            $sql = 'SELECT * FROM posts ORDER BY id DESC';
            $data = DB::pdo()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        static function show(){}
        static function store($request){
            session_start();
            extract($request);
            $sql = 'INSERT INTO posts(title,content,category_id,user_id,created_at,updated_at)VALUES(?,?,?,?,?,?)';
            $stmt = DB::pdo()->prepare($sql);
            $user_id = 1;
            $stmt->execute([$title,$content,$category_id,$user_id,DB::now(),DB::now()]);
        }
    }