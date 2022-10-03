<?php 
    include('../../vendor/autoload.php');
    use Gjun\Blog\Controller\Post;
    $result=Post::update($_REQUEST);


    echo '<script>alert("文章已更新");</script>';
    header('refresh:0;url=show.php?id='.$result['id']);