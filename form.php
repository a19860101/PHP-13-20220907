<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- 
        傳遞方法:get,post
        表單預設傳遞方法為get
     -->
    <form action="res.php" method="get">
        <div>
            <input type="text" name="msg">
        </div>
        <div>
            <input type="text" name="number">
        </div>
        <div>
            <select name="edu" id="">
                <option value="國小">國小</option>
                <option value="國中">國中</option>
                <option value="高中職">高中職</option>
                <option value="大專院校">大專院校</option>
            </select>
        </div>
        <div>
            <input type="radio" name="gender" value="男">
            <label for="">男</label>
            <input type="radio" name="gender" value="女">
            <label for="">女</label>
        </div>
        <div>
            <input type="checkbox" name="skill[]" value="平面設計">
            <label for="">平面設計</label>
            <input type="checkbox" name="skill[]" value="網頁設計">
            <label for="">網頁設計</label>
            <input type="checkbox" name="skill[]" value="影片剪輯">
            <label for="">影片剪輯</label>
        </div>
        <input type="submit">
    </form>

    <?php
        $info = [
            'name' => 'John',
            'mail' => 'john@gmail.com'
        ];
        // print_r($info);
        // echo $info['name'];
        // echo $info['mail'];
        // 解構
        extract($info);
        echo $name ;
        echo $mail;
    ?>
</body>
</html>