<?php
    namespace Gjun\Blog\Controller;

    use Gjun\Blog\Config\DB;
    use PDO;
    class User {
        static function index(){
            $sql = 'SELECT * FROM users';
            
            //使用use Gjun\Blog\Config\DB;
            // $datas = DB::pdo()->query($sql)->fetchAll(PDO::FETCH_ASSOC);

            //不用use Gjun\Blog\Config\DB;
            $datas = \Gjun\Blog\Config\DB::pdo()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
            
            return $datas;
        }
    }