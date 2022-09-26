<?php
    // include('../src/Config/Test.php');
    // include('../src/Config/DB.php');
    include('../vendor/autoload.php');
    // use  Gjun\Blog\Config\Test;
    use  Gjun\Blog\Config\DB;

    $go = new Gjun\Blog\Config\Test;
    echo $go->go();
    echo $go->walk();
    echo $go->run();

    $now = new DB;
    echo $now->now();