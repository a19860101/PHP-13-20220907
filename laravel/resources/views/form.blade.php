<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/res" method="post">
        @csrf
        <div>
            <input type="text" name="name">
        </div>
        <div>
            <input type="text" name="phone">
        </div>
        <div>
            <input type="text" name="email">
        </div>
        <input type="submit">
    </form>
</body>
</html>
