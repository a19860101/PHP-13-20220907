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

    $img_name = md5(time());
    $ext = pathinfo($name,PATHINFO_EXTENSION);
    $fullname = $img_name.'.'.$ext;
    
    $folder = 'images/';

    if(!is_dir($folder)){
        mkdir($folder);
    }

    $target = $folder.$fullname;

    if($error == 0){
        if(move_uploaded_file($tmp_name,$target)){
            echo '上傳成功';
        }else{
            echo '上傳失敗';
        }
    }