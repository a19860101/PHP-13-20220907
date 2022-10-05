<?php
    if(!session_id()){
        session_start();
    }
?>
<?php include('template/header.php'); ?>
<?php include('template/nav.php'); ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <?php if(isset($_SESSION['AUTH'])){ ?>
                <h2><?php echo $_SESSION['AUTH']['name'];?> 你好</h2>
            <?php }else{ ?>
                <h2>訪客您好!!</h2>
            <?php } ?>
        </div>
    </div>
</div>
<?php include('template/footer.php'); ?>
