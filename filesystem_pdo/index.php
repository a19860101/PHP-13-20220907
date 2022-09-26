<?php 
    include('db.php');
    $sql = 'SELECT * FROM galleries';
    $imgs = pdo()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    $img_num = count($imgs);
    if(isset($_REQUEST['delete'])){
        extract($_REQUEST);
        unlink('images/'.$path);
        $sql = 'DELETE FROM galleries WHERE id = ?';
        $stmt = pdo()->prepare($sql);
        $stmt->execute([$id]);
        echo '<script>alert("圖片已刪除");</script>';
        header('refresh:0;url=index.php');
    }
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
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="">圖片名稱</label>
            <input type="text" name="name">
        </div>
        <div>
            <input type="file" name="img">
        </div>
        <input type="submit" value="上傳">
    </form>
    <div>

        <div>目前共有 <?php echo $img_num;?> 張</div>
        <?php foreach($imgs as $img){ ?>
            <img src="images/<?php echo $img['path']; ?>" width= "100">
            <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $img['id'];?>">
                <input type="hidden" name="path" value="<?php echo $img['path'];?>">
                <input type="submit" value="刪除" name="delete" onclick="return confirm('確認刪除？')">
            </form>
        <?php } ?>
    </div>
</body>
</html>