<?php
    include('db.php');
    function index(){
        // global $pdo;
        $sql = 'SELECT * FROM students';
        try{
            $students = pdo()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
            return $students;
        }catch(PDOException $e){
            echo $e->getMessage();
            // print_r($e->getCode());
            // return $e->getCode();
            // return [
            //     'errCode' => $e->getCode()
            // ];
        }
    }
    function show($request){
        extract($request);
        $sql = 'SELECT * FROM students WHERE id = ?';
        try {
            $stmt = pdo()->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);        
        }catch(PDOException $e){
            echo $e->getMessage();
            // return [
            //     'errCode' => $e->getCode()
            // ];
        }
    }
    function store($request){
        extract($request);
        $skill = implode(',',$skill);
        $sql = 'INSERT INTO students(name,phone,email,gender,skill,comment,created_at)VALUES(?,?,?,?,?,?,?)';
        try {
            $stmt = pdo()->prepare($sql);
            $stmt->execute([$name,$phone,$email,$gender,$skill,$comment,now()]);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    function delete($request){
        extract($request);
        $sql = 'DELETE FROM students WHERE id = ?';
        try{
            $stmt = pdo()->prepare($sql);
            $stmt->execute([$id]);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }