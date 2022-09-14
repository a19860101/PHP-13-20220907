<?php
    include('db.php');
    function index(){
        // global $pdo;
        $sql = 'SELECT * FROM students';
        $students = pdo()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        return $students;
    }
    function show($request){
        extract($request);
        $sql = 'SELECT * FROM students WHERE id = ?';
        $stmt = pdo()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);        
    }