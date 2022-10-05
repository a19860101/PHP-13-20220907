<?php
    include('../../vendor/autoload.php');
    use Gjun\Blog\Controller\Category;
    $categories = Category::index();
?>
<?php include('../template/header.php'); ?>
<?php include('../template/nav.php'); ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>分類管理</h2>
        </div>
        <div class="col-lg-8 mb-4">
            <form action="store.php" method="post">
                <div class="mb-3">
                    <label for="title" class="form-label">分類名稱</label>
                    <input type="text" name="title" id="title" class="form-control">
                </div>
                <input type="submit" class="btn btn-primary btn-sm" value="新增分類">
            </form>
        </div>
        <div class="col-lg-4">
            <ul class="list-group">
                <?php foreach($categories as $category){ ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?php echo $category['title'];?>
                    <form action="delete.php" method="post">
                        <input type="hidden" value="<?php echo $category['id'];?>" name="id">
                        <input type="submit" value="刪除" class="btn btn-danger btn-sm" onclick="return confirm('確認刪除？')">
                    </form>
                
                </li>
                <?php }?>
            </ul>
        </div>
    </div>
</div>
<?php include('../template/footer.php'); ?>