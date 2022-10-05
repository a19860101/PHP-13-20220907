<?php
    include('../../vendor/autoload.php');

    Gjun\Blog\Controller\Category::delete($_REQUEST);

    echo "<script>alert('分類已刪除')</script>";
    header('refresh:0;url=index.php');