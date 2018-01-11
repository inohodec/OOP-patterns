<?php
/****************************************************************************************
Абстрактный класс для космических кораблей
 ****************************************************************************************/

abstract class SpaceShip {
    public $flying;  // Объект принадлежащий типу Flying
    public $shooting;  // Объект принадлежащий типу Shooting

    public function __construct()
    {
        $this->setFeatures();
    }

    abstract function setFeatures();

    //ВСЕ корабли умеют мигать огоньками, диодами или фонарями, даже игрушечные
    function blink()
    {
        echo "I can blink as all Spaceships<br>";
    }

    //У каждого корабля ВСЕГДА есть название модели и оно ВСЕГДА разное
    abstract function description();

    //запускаем полет
    public function startFlying()
    {
        $this->flying->fly();
    }

    //начинаем стрелять
    public function startShooting() {
        $this->shooting->shoot();
    }

    /**
     * метод для изменения полета
     */
    public function setFlying(Flying $flying)
    {
        $this->flying = $flying;
    }

    /**
     * метод для изменения стрельбы
     */
    public function setShooting(Shooting $shooting)
    {
        $this->shooting = $shooting;
    }

    //вспомогательный метод для вывода информации о корабле
    function display()
    {
        $this->description();
        $this->blink();
        $this->startFlying();
        $this->startShooting();
        echo "<hr>";
    }
}

//корабль Дредноут
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

//корабль Разведчик
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

//корабль Игрушечный
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