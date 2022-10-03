<?php
    include('../../vendor/autoload.php');
    use Gjun\Blog\Controller\Post;
    
    $posts = Post::index();
?>
<?php include('../template/header.php'); ?>
<?php include('../template/nav.php'); ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>文章列表</h2>
            <a href="create.php" class="btn btn-primary">新增文章</a>
        </div>
        <div class="col-12">
            <?php foreach($posts as $post) { ?>
            <div>
                <h3><?php echo $post['title']; ?></h3>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php include('../template/footer.php'); ?>