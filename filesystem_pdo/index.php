<?php 
    if(isset($_REQUEST['delete'])){
        unlink($_REQUEST['img']);
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
        <?php 
            $imgs = glob('images/*');
            // print_r($imgs);
            $img_num = count($imgs);
        ?>
        <div>目前共有 <?php echo $img_num;?> 張</div>
        <?php foreach($imgs as $img){ ?>
            <img src="<?php echo $img; ?>" width= "100">
            <form action="" method="post">
                <input type="hidden" name="img" value="<?php echo $img;?>">
                <input type="submit" value="刪除" name="delete" onclick="return confirm('確認刪除？')">
            </form>
        <?php } ?>
    </div>
</body>
</html>