<?php
    include('../../vendor/autoload.php');
    use Gjun\Blog\Controller\Post;
    
    $posts = Post::index();
?>
<?php include('../template/header.php'); ?>
<?php include('../template/nav.php'); ?>
<div class="container">
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center mb-4">
            <h2>文章列表</h2>
            <a href="create.php" class="btn btn-primary">新增文章</a>
        </div>
        <div class="col-12">
            <?php foreach($posts as $post) { ?>
            <div class="shadow-sm border rounded mb-4 p-4">
                <h3 class="mb-4"><?php echo $post['title']; ?></h3>
                <div class="mb-4 lh-lg">
                    <?php echo $post['content']; ?>
                </div>
                <div class="text-end text-muted"><?php echo $post['created_at']; ?></div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php include('../template/footer.php'); ?>