<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>會員登入</h1>
    <form action="auth.php" method="post">
        <div>
            <label for="email">E-mail</label>
            <input type="text" name="email" id="email">
        </div>
        <div>
            <label for="pw">密碼</label>
            <input type="password" name="pw" id="pw">
        </div>
        <input type="submit" value="登入">
        <input type="button" onclick="history.back()" value="取消">
    </form>
</body>
</html>