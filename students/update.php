<?php
    include('db.php');

    extract($_REQUEST);
    if($skill != ''){
        $skill = implode(',',$skill);
    }else{
        $skill = '';
    }

    $sql = 'UPDATE students SET name=?,email=?,phone=?,gender=?,skill=?,comment=? WHERE id = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name,$email,$phone,$gender,$skill,$comment,$id]);

    echo '<script>alert("資料已修改");</script>';
    header('refresh:0;url=show.php?id='.$id);