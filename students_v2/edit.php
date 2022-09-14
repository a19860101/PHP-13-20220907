<?php 
    include('db.php');

    extract($_REQUEST);
    $sql = 'SELECT * FROM students WHERE id = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $student = $stmt->fetch(PDO::FETCH_ASSOC);
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
    <h1>編輯資料</h1>
    <form action="update.php" method="post">
        <div>
            <label for="">姓名</label>
            <input type="text" name="name" value="<?php echo $student['name'];?>">
        </div>
        <div>
            <label for="">電話</label>
            <input type="text" name="phone" value="<?php echo $student['phone'];?>">
        </div>
        <div>
            <label for="">Email</label>
            <input type="text" name="email" value="<?php echo $student['email'];?>">
        </div>
        <div>
            <label for="">性別</label>
            <input type="radio" name="gender" value="男" <?php echo $student['gender'] == '男' ? 'checked':''; ?>>
            <label for="">男</label>
            <input type="radio" name="gender" value="女" <?php echo $student['gender'] == '女' ? 'checked':''; ?>>
            <label for="">女</label>
        </div>
        <div>
            <?php
                $skill = explode(',',$student['skill']);
            ?>
            <label for="">專長</label>
            <input type="checkbox" name="skill[]" value="平面設計" <?php echo in_array('平面設計',$skill)?'checked':'';?>>
            <label for="">平面設計</label>
            <input type="checkbox" name="skill[]" value="網頁設計" <?php echo in_array('網頁設計',$skill)?'checked':'';?>>
            <label for="">網頁設計</label>
            <input type="checkbox" name="skill[]" value="影視剪輯" <?php echo in_array('影視剪輯',$skill)?'checked':'';?>>
            <label for="">影視剪輯</label>
        </div>
        <div>
            <label for="">備註</label>
            <textarea name="comment" rows="10" cols="30"><?php echo $student['comment'];?></textarea>
        </div>
        <input type="hidden" name="id" value="<?php echo $student['id'];?>">
        <input type="submit" value="更新資料">
        <input type="button" value="取消" onclick="history.back()">
    </form>
</body>
</html>