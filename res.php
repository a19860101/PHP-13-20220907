<?php
    // 超級全域變數
    // print_r($_REQUEST);

    //get方法
    // print_r($_GET);

    //post方法
    // print_r($_POST);


    // echo $_REQUEST['msg'];
    // echo '<br>';
    // echo $_REQUEST['number'];
    // echo '<br>';
    // echo $_REQUEST['edu'];
    // echo '<br>';
    // echo $_REQUEST['gender'];
    // echo '<br>';
    // // print_r( $_REQUEST['skill'] );
    // echo implode('///',$_REQUEST['skill']);

    // $msg = $_REQUEST['msg'];
    // $number = $_REQUEST['number'];
    // $edu = $_REQUEST['edu'];
    // $gender = $_REQUEST['gender'];
    // $skill = implode('///',$_REQUEST['skill']);

    
    extract($_REQUEST);
    echo $msg;
    echo '<br>';
    echo $number;
    echo '<br>';
    echo $edu;
    echo '<br>';
    echo $gender;
    echo '<br>';
    echo implode('///',$skill);
    