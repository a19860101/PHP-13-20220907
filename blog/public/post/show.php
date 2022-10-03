<?php
    include('../../vendor/autoload.php');
    use Gjun\Blog\Controller\Post;
    
    $post = Post::show($_REQUEST);
?>
<?php include('../template/header.php'); ?>
<?php include('../template/nav.php'); ?>
<div class="container">
    <div class="row">
        <div class="col-12x mb-4">
            <div class="shadow-sm border rounded mb-4 p-4">
                <h3 class="mb-4"><?php echo $post['title']; ?></h3>
                <div class="mb-4 lh-lg">
                    <?php echo $post['content']; ?>
                </div>
                <div class="text-end text-muted"><?php echo $post['created_at']; ?></div>
                <a href="index.php" class="btn btn-success btn-sm">文章列表</a>
            </div>
        </div>
    </div>
</div>
<?php include('../template/footer.php'); ?>