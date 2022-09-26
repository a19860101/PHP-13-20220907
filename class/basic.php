<?php
    class Test {
        public $skin = 'white';
        public $height;
        public $name = 'undefined';

        public function go(){
            return $this->name.' gogogo';
        } 
    }

    $john = new Test;

    // print_r($john);

    // echo $john->skin;
    // echo $john->height;


    $mary = new Test;
    $mary->name = 'Mary';
    $mary->skin = 'black';
    $mary->height = 177;
    echo $mary->go();
    // echo $mary->skin;
    // echo $mary->height;
