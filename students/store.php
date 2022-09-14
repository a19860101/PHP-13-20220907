<?php
    include('db.php');
    extract($_REQUEST);

    $skill = implode(',',$skill);

    $sql = 'INSERT INTO students(name,phone,email,gender,skill,comment,created_at)VALUES(?,?,?,?,?,?,now())';
    $stmt = $pdo->prepare($sql);

    $stmt->execute([$name,$phone,$email,$gender,$skill,$comment]);


    header('location:index.php');