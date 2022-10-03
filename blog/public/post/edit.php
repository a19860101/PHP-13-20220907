<?php
    include('../../vendor/autoload.php');
    use Gjun\Blog\Controller\Post;
    
    $post = Post::show($_REQUEST);
?>
<?php include('../template/header.php'); ?>
<?php include('../template/nav.php'); ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>編輯文章</h2>
        </div>
        <div class="col-6">
            <form action="update.php" method="post">
                <div class="mb-3">
                    <label for="" class="form-label">文章標題</label>
                    <input type="text" name="title" class="form-control" value="<?php echo $post['title'];?>">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">文章分類</label>
                    <select name="category_id" id="" class="form-select">
                        <option>--請選擇--</option>
                        <option value="1" <?php echo $post['category_id']==1 ? 'selected':''; ?>>科技</option>
                        <option value="2" <?php echo $post['category_id']==2 ? 'selected':''; ?>>美食</option>
                        <option value="3" <?php echo $post['category_id']==3 ? 'selected':''; ?>>生活</option>
                        <option value="4" <?php echo $post['category_id']==4 ? 'selected':''; ?>>運動</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">文章內容</label>
                    <textarea name="content" id="content" cols="30" rows="10" class="form-control"><?php echo $post['content'];?></textarea>
                </div>
                <input type="hidden" name="id" value="<?php echo $post['id'];?>">
                <input type="submit" class="btn btn-primary" value="更新文章">
            </form>
        </div>
    </div>
</div>
<?php include('../template/footer.php'); ?>