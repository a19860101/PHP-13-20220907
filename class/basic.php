<?php
    class User {
        public $name;
        public $hp = 100;
        private $role = 'Human';
        public function walk(){
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
            return $this->role;
        }
    }

    $max = new User;
    $max->name = 'Max';
    echo $max->test();
    $npc1 = new NPC;
    echo $npc1->test2();