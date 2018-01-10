<?php
//абстрактный класс для уток
abstract class Duck {
    function swim() {
        echo "I can swim";
    }
    function quack() {
        echo "I can quack";
    }
    abstract function fly();
}

class RedDuck extends Duck {
    public function fly() {
        echo "I use my wings for flying";
    }
}

class GreyDuck extends Duck {
    public function fly() {
        echo "I use my wings for flying";
    }
}

class WoodenDuck extends Duck {
    public function fly() {
        echo "I can't fly";
    }
}