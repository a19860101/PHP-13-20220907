<?php
    include('function.php');
    logout();
    echo "<script>alert('您已登出')</script>";

    header('refresh:0;url=index.php');