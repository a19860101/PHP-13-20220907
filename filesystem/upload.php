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

    switch($error){
        case 0:
            if(move_uploaded_file($tmp_name,$target)){
                echo '上傳成功';
                header('refresh:0;url=index.php');
            }else{
                echo '上傳失敗';
            }
            break;
        case 1:
            echo '上傳檔案過大(伺服器限制)';
            break;
        case 2:
            echo '上傳檔案過大(表單限制)';
            break;
        case 3: 
            echo '只有部分上傳';
            break;
        case 4:
            echo '請選擇檔案';
            break;
        case 6:
            echo '遺失暫存資料夾';
            break;
        case 7:
            echo '無法寫入';
            break;
        case 8:
            echo '不支援檔案上傳';
            break;
    }

    // if($error == 0){
    //     if(move_uploaded_file($tmp_name,$target)){
    //         echo '上傳成功';
    //     }else{
    //         echo '上傳失敗';
    //     }
    // }