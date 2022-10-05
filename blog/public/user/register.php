<?php include('../template/header.php'); ?>
<?php include('../template/nav.php'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-10">
            <h2>註冊會員</h2>
            <form action="store.php" method="post">
                <div class="mb-3">
                    <label for="name">名稱</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="email">E-mail</label>
                    <input type="text" name="email" id="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="pw">密碼</label>
                    <input type="password" name="pw" id="pw" class="form-control">
                </div>
                <input type="submit" value="註冊會員" class="btn btn-primary">
                <input type="button" onclick="history.back()" value="取消" class="btn btn-danger">
            </form>
        </div>
    </div>
</div>
<?php include('../template/footer.php'); ?>