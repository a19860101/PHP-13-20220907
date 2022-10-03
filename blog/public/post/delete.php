<?php
    include('../../vendor/autoload.php');
    use Gjun\Blog\Controller\Post;

    Post::delete($_REQUEST['id']);
    echo '<script>alert("文章已刪除");</script>';
    header('refresh:0;url=index.php');