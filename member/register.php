<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="auth.php" method="post">
        <div>
            <label for="name">名稱</label>
            <input type="text" name="name" id="name">
        </div>
        <div>
            <label for="email">E-mail</label>
            <input type="text" name="email" id="email">
        </div>
        <div>
            <label for="pw">密碼</label>
            <input type="password" name="pw" id="pw">
        </div>
        <input type="submit" value="註冊會員">
        <input type="button" onclick="history.back()" value="取消">
    </form>
</body>
</html>