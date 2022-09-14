<?php
    include('function.php');
    $students = index();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
        }
        table,td,th {
            border: 1px solid #000;
            padding: 8px;
        }
    </style>
</head>
<body>
    <h1>學生通訊錄</h1>
    <a href="create.php">新增資料</a>
    <table>
        <tr>
            <th>#</th>
            <th>姓名</th>
            <th>電話</th>
            <th>性別</th>
            <th>建立時間</th>
            <th>動作</th>
        </tr>
        <?php foreach($students as $student){ ?>
        <tr>
            <td><?php echo $student['id'];?></td>
            <td><?php echo $student['name'];?></td>
            <td><?php echo $student['phone'];?></td>
            <td><?php echo $student['gender'];?></td>
            <td><?php echo $student['created_at'];?></td>
            <th>
                <a href="show.php?id=<?php echo $student['id']; ?>">檢視</a>
            </th>
        </tr>
        <?php } ?>
    </table>
</body>
</html>