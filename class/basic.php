<?php
    class Test {
        public $skin = 'white';
        public $height;
    }

    $john = new Test;

    // print_r($john);

    echo $john->skin;
    echo $john->height;


    $mary = new Test;
    $mary->skin = 'black';
    $mary->height = 177;
    echo $mary->skin;
    echo $mary->height;
