<?php
    include('../../vendor/autoload.php');
    $categories = Gjun\Blog\Controller\Category::index();
?>

<?php include('../template/header.php'); ?>
<?php include('../template/nav.php'); ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>新增文章</h2>
        </div>
        <div class="col-6">
            <form action="store.php" method="post">
                <div class="mb-3">
                    <label for="" class="form-label">文章標題</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">文章分類</label>
                    <select name="category_id" id="" class="form-select">
                        <option>--請選擇--</option>
                        <?php foreach($categories as $category){ ?>
                        <option value="<?php echo $category['id'];?>">
                            <?php echo $category['title'];?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">文章內容</label>
                    <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <input type="submit" class="btn btn-primary" value="建立文章">
            </form>
        </div>
    </div>
</div>
<?php include('../template/footer.php'); ?>