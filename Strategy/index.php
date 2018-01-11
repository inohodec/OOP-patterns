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

    abstract function description();

    function display() {
        $this->swim();
        $this->shoot();
        $this->description();
        echo "<hr>";
    }
}

class Dreadnought extends SpaceShip {
    function description()
    {
        echo "I'm very big and powerful SpaseShip with name ".__CLASS__."<br>";
    }
}

class Scout extends SpaceShip {
    function description()
    {
        echo "I'm small, inconspicuous and rapid SpaceShip with name ".__CLASS__."<br>";
    }
}

class ToyShip extends SpaceShip {
    function shoot()
    {
        echo "Unfortunately I can't shoot I'm only a toy (((";
    }
    function description()
    {
        echo "I'm a toy SpaceShip";
    }
}

$ship1 = new Dreadnought();
$ship2 = new Scout();
$ship3 = new ToyShip();

$ship1->display();
$ship2->display();
$ship3->display();