<?php
    function test(){
        return 'Test';
    }

    function nt_us($value){
        return $value  / 30;
    }
    // echo nt_us(1000);

    function us_nt($value){
        return $value * 30;
    }
    // echo us_nt(100);

    function square($w,$h){
        return $w * $h;
    }

    echo square(11,13);


    function title($msg){
        echo '<h1>Hello '.$msg.'</h1>';
    }

    title('world');
