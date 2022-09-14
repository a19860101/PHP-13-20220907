<?php
    include('db.php');

    // $id = $_REQUEST['id']; 
    extract($_REQUEST);
    $sql = 'SELECT * FROM students WHERE id = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $student = $stmt->fetch(PDO::FETCH_ASSOC);

    //  預備陳述式:避免被sql injection攻擊

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
        <?php echo $student['name']; ?> 個人資料
    </h1>
    <ul>
        <li><?php echo $student['phone']; ?></li>
        <li><?php echo $student['email']; ?></li>
        <li><?php echo $student['gender']; ?></li>
        <li><?php echo $student['skill']; ?></li>
        <li><?php echo $student['comment']; ?></li>
        <li><?php echo $student['created_at']; ?></li>
    </ul>
    <form action="delete.php" method="post">
        <input type="hidden" name="id" value="<?php echo $student['id'];?>">
        <input type="submit" value="刪除" onclick="return confirm('此動作將不可復原，確認刪除？')">
    </form>
    <a href="edit.php?id=<?php echo $student['id'];?>">編輯</a>
    <a href="index.php">學生列表</a>
</body>
</html>