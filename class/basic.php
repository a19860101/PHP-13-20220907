<?php
    class User {
        public $name;
        public $hp = 100;
        private $role = 'Human';
        protected $magic = 'FLY';
        static function walk(){

            return 'walk';
        }
        public function attack(){
            return 'attack';
        }
        public function test(){
            return $this->role;
        }
    }

    class NPC extends User {
        public $name = 'npc';
        public function test2(){
            return $this->magic;
        }
        
    }

    echo User::walk();

    // $max = new User;
    // echo $max->walk();
    // $max->name = 'Max';
    // echo $max->magic;
    // echo $max->test();
    // $npc1 = new NPC;
    // echo $npc1 -> test2();
  