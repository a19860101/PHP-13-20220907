<?php
    // print_r($_FILES['img']);
    // echo $_FILES['img']['name'];
    // echo $_FILES['img']['full_path'];
    // echo $_FILES['img']['type'];
    // echo $_FILES['img']['tmp_name'];
    // echo $_FILES['img']['error'];
    // echo $_FILES['img']['size'];
    extract($_FILES['img']);

    // echo $name;
    // echo $full_path;
    // echo $type;
    // echo $tmp_name;
    // echo $error;
    // echo $size;
    
    $folder = 'images/';

    if(!is_dir($folder)){
        mkdir($folder);
    }

    $target = $folder.$name;

    move_uploaded_file($tmp_name,$target);