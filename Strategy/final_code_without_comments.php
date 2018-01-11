<?php

abstract class SpaceShip {
    public $flying;  // Объект принадлежащий типу Flying
    public $shooting;  // Объект принадлежащий типу Shooting

    public function __construct()
    {
        $this->setFeatures();
    }

    abstract function setFeatures();

    function blink()
    {
        echo "I can blink as all Spaceships<br>";
    }

    abstract function description();

    public function startFlying()
    {
        $this->flying->fly();
    }

    public function startShooting() {
        $this->shooting->shoot();
    }

    public function setFlying(Flying $flying)
    {
        $this->flying = $flying;
    }

    public function setShooting(Shooting $shooting)
    {
        $this->shooting = $shooting;
    }

    function display()
    {
        $this->description();
        $this->blink();
        $this->startFlying();
        $this->startShooting();
        echo "<hr>";
    }
}

class Dreadnought extends SpaceShip {

    function setFeatures()
    {
        $this->flying = new SubSpaceEngine();
        $this->shooting = new Devastator();
    }

    function description()
    {
        echo "I'm very big and powerful SpaseShip with name ".__CLASS__."<br>";
    }
}

class Scout extends SpaceShip {

    function setFeatures()
    {
        $this->flying = new RapidEngine();
        $this->shooting = new Laser();
    }

    function description()
    {
        echo "I'm small, inconspicuous and rapid SpaceShip with name ".__CLASS__."<br>";
    }
}

class ToyShip extends SpaceShip {

    function setFeatures()
    {
        $this->flying = new ToyEngine();
        $this->shooting = new Toy();
    }

    function description()
    {
        echo "I'm a small ".__CLASS__;
    }
}

interface Flying {
    public function fly();
}

class SubSpaceEngine implements Flying {
    public function fly()
    {
        echo "I always use ".__CLASS__." for flying<br>";
    }
}

class RapidEngine implements Flying {
    public function fly()
    {
        echo "I always use ".__CLASS__." for extra fast flying<br>";
    }
}

class ToyEngine implements Flying {
    public function fly()
    {
        echo "I always use ".__CLASS__." for flying<br>";
    }
}

interface Shooting {
    public function shoot();
}

class Devastator implements Shooting {
    public function shoot()
    {
        echo "I always use ".__CLASS__." for destroying planets<br>";
    }
}

class Laser implements Shooting {
    public function shoot()
    {
        echo "I always use ".__CLASS__." for destroying other ships<br>";
    }
}

class Toy implements Shooting {
    public function shoot()
    {
        echo "I can't shoot, because I'm just a toy<br>";
    }
}

/******************   Client's CODE    *********************/
$ship1 = new Dreadnought();
$ship2 = new Scout();
$ship3 = new ToyShip();

$ship1->display();
$ship2->display();
$ship3->display();

$ship3->setShooting(new Devastator());
$ship3->display();