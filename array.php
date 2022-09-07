<?php

    // 陣列
    $a = ['apple','banana','cat'];

    // print_r($a);
    // echo implode(',',$a);


    // 關聯陣列
    $user = [
        'name' => 'Mary',
        'mail' => 'mary@gmail.com',
        'level' => 2
    ];

    // print_r($user);
    // echo implode(',',$user);

    // 陣列迴圈
    // 陣列迭代
    foreach($a as $data){
        echo "<div>{$data}</div>";
    }

    foreach($user as $data){
        echo "<div>{$data}</div>";
    }

    foreach($user as $key => $value){
        echo "<div>{$key}:{$value}</div>";
    }