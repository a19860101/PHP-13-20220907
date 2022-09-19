<?php
    session_start();
    $_SESSION['MSG'] = $_REQUEST['msg'];

    header('location:001.php');
