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
                <div>作者:<?php echo $post['name']?></div>
                <div>分類:<?php echo $post['category_title'];?></div>
                <div class="mb-4 lh-lg">
                    <?php echo $post['content']; ?>
                </div>
                <div class="text-end text-muted">發布時間:<?php echo $post['created_at']; ?></div>
                <div class="text-end text-muted">最後更新時間:<?php echo $post['updated_at']; ?></div>
                <a href="index.php" class="btn btn-success btn-sm">文章列表</a>

                <?php if(isset($_SESSION['AUTH']) && $_SESSION['AUTH']['id'] == $post['user_id']){ ?>
                <a href="edit.php?id=<?php echo $post['id'];?>" class="btn btn-info btn-sm">編輯文章</a>
                <form action="delete.php" method="post" class="d-inline-block">
                    <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
                    <input type="submit" value="刪除文章" class="btn btn-danger btn-sm" onclick="return confirm('確認刪除?');">
                </form>
                <?php } ?>


            </div>
        </div>
    </div>
</div>
<?php include('../template/footer.php'); ?>