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
        <div class="col-8">
            <form action="store.php" method="post">
                <div class="mb-3">
                    <label for="title" class="form-label">分類名稱</label>
                    <input type="text" name="title" id="title" class="form-control">
                </div>
                <input type="submit" class="btn btn-primary btn-sm" value="新增分類">
            </form>
        </div>
        <div class="col-4">
            <ul class="list-group">
                <?php foreach($categories as $category){ ?>
                <li class="list-group-item"><?php echo $category['title'];?></li>
                <?php }?>
            </ul>
        </div>
    </div>
</div>
<?php include('../template/footer.php'); ?>