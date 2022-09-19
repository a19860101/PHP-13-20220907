<?php
    include('function.php');

    update($_REQUEST);
    $id = $_REQUEST['id'];
    echo '<script>alert("資料已修改");</script>';
    header('refresh:0;url=show.php?id='.$id);