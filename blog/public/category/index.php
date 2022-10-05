<?php include('../template/header.php'); ?>
<?php include('../template/nav.php'); ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>分類管理</h2>
        </div>
        <div class="col-8">
            <form action="">
                <div class="mb-3">
                    <label for="title" class="form-label">分類名稱</label>
                    <input type="text" name="title" id="title" class="form-control">
                </div>
                <input type="submit" class="btn btn-primary btn-sm" value="新增分類">
            </form>
        </div>
        <div class="col-4">
            <ul class="list-group">
                <li class="list-group-item">test</li>
                <li class="list-group-item">test</li>
                <li class="list-group-item">test</li>
            </ul>
        </div>
    </div>
</div>
<?php include('../template/footer.php'); ?>