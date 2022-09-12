<?php
    $x = 0;
    // if...
    // if($x > 0){
    //     echo 'Success';
    // }

    // if...else
    // if($x > 0){
    //     echo 'Success 2';
    // }else{
    //     echo 'Error 2';
    // }

    // if...elseif
    // if($x > 0){
    //     echo '大於0';
    // }elseif($x < 0){
    //     echo '小於0';
    // }

    //if...elseif...else
    // if($x > 0){
    //     echo '大於0';
    // }elseif($x < 0){
    //     echo '小於0';
    // }else{
    //     echo 'Error 3';
    // }


    // if($x > 0){
    //     $result = 'Success';
    // }else {
    //     $result = 'Error';
    // }

    // echo $result;
    
    //三元運算子

    // $result = $x > 0 ? 'Success':'Error';
    // echo $result;

    // echo $x > 0 ? 'Success':'Error';

    // echo $x > 0 ?? 'Error';

    // switch
    
    $e = 504;

    switch($e){
        case 200:
            echo 'OK';
            break;
        case 403:
            echo 'Forbidden';
            break;
        case 404:
            echo 'Page Not Found';
            break;
        case 500:
            echo 'Server Error';
            break;
        case 504:
            echo 'Gateway Timeout';
            break;
        default:
            echo 'Error';
    }