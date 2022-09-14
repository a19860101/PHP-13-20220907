<?php
    include('db.php');
    extract($_REQUEST);

    $skill = implode(',',$skill);

    

    $sql = 'INSERT INTO students(name,phone,email,gender,skill,comment,created_at)VALUES(?,?,?,?,?,?,?)';
    $stmt = $pdo->prepare($sql);

    $stmt->execute([$name,$phone,$email,$gender,$skill,$comment,$now]);

    echo '<script>alert("資料已新增");</script>';
    header('refresh:0;url=index.php');
    // header('location:index.php');