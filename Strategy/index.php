<?php

abstract class SpaceShip {
    function fly() {
        echo "I can fly as all Spaceships<br>";
    }

    function swim() {
        echo "Of course every SpaceShip can swim";
    }

    function shoot() {
        echo "I can shoot as all military Spaceship<br>";
    }

    abstract function display();
}

class Dreadnought extends SpaceShip {
    function display()
    {
        echo "I'm very big and powerfull SpaseShip with name ".__CLASS__."<br>";
    }
}

class Scout extends SpaceShip {
    function display()
    {
        echo "I'm small, inconspicuous and rapid SpaceShip with name ".__CLASS__."<br>";
    }
}

class ToyShip extends SpaceShip {
    function shoot()
    {
        echo "Unfortunately I can't shoot I'm only a toy (((";
    }
    function display()
    {
        echo "I'm a toy SpaceShip";
    }
}