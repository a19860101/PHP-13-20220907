<?php
    include('db.php');
    extract($_FILES['img']);

    if($_REQUEST['name'] == ''){
        $custom_name = $name;
    }else{
        $custom_name = $_REQUEST['name'];
    }
    

    $img_name = md5(time());
    $ext = pathinfo($name,PATHINFO_EXTENSION);
    $fullname = $img_name.'.'.$ext;
    
    $folder = 'images/';

    if(!is_dir($folder)){
        mkdir($folder);
    }

    $target = $folder.$fullname;
    $sql = 'INSERT INTO galleries(name,path,created_at)VALUES(?,?,?)';
    
    switch($error){
        case 0:
            if(move_uploaded_file($tmp_name,$target)){
                $stmt = pdo()->prepare($sql);
                $stmt->execute([$custom_name,$fullname,now()]);
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