<?php
    namespace Gjun\Blog\Controller;
    use PDO;
    use Gjun\Blog\Config\DB;

    class Category {
        static function index(){
            $sql = 'SELECT * FROM categories';
            $data = DB::pdo()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        static function store($request){
            extract($request);
            $sql = 'INSERT INTO categories(title,created_at)VALUES(?,?)';
            $stmt = DB::pdo()->prepare($sql);
            $stmt->execute([$title,DB::now()]);
        }
        static function delete($request){
            extract($request);
            $sql = 'DELETE FROM categories WHERE id=?';
            $stmt=DB::pdo()->prepare($sql);
            $stmt->execute([$id]);
        }
    }