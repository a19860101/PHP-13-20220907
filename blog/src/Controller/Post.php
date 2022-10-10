<?php
    namespace Gjun\Blog\Controller;
    use PDO;
    use Gjun\Blog\Config\DB;

    class Post {
        static function index(){
            // $sql = 'SELECT * FROM posts ORDER BY id DESC';
            $sql = 'SELECT posts.* , users.email, users.name FROM posts LEFT JOIN users ON posts.user_id = users.id ORDER BY posts.id DESC ';
            $data = DB::pdo()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        static function show($request){
            extract($request);
            $sql = 'SELECT * FROM posts WHERE id = ?';
            $stmt = DB::pdo()->prepare($sql);
            $stmt->execute([$id]);
            $data = $stmt->fetch();
            return $data;
        }
        static function store($request){
            session_start();
            extract($request);
            $sql = 'INSERT INTO posts(title,content,category_id,user_id,created_at,updated_at)VALUES(?,?,?,?,?,?)';
            $stmt = DB::pdo()->prepare($sql);
            $user_id = $_SESSION['AUTH']['id'];
            $stmt->execute([$title,$content,$category_id,$user_id,DB::now(),DB::now()]);
        }
        static function edit($request){
            extract($request);
            $sql = 'SELECT * FROM posts WHERE id = ?';
            $stmt = DB::pdo()->prepare($sql);
            $stmt->execute([$id]);
            $data = $stmt->fetch();
            return $data;
        }
        static function update($request){
            extract($request);
            $sql = 'UPDATE posts SET title=?,content=?,category_id=?,updated_at=? WHERE id=?';
            $stmt = DB::pdo()->prepare($sql);
            $stmt->execute([$title, $content, $category_id, DB::now(), $id]);
            return [
                'id'=>$id
            ];
        }
        static function delete($id){
            $sql = 'DELETE FROM posts WHERE id = ?';
            $stmt = DB::pdo()->prepare($sql);
            $stmt->execute([$id]);
        }
    }