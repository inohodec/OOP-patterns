<?php
// Наследует от CarComponent.php

abstract class Decorator extends CarComponent {
    function getDescription() {
        //переопределяем унаследованный метод как пустой, т.к. в PHP нельзя переопеделить его как абстрактный
        //а в конкретных декораторах необходимо реализация данного метода будет отличаться!!!
    }
}


//-------------------------------  Конкретные декораторы  --------------------------------------------

class AntiFogLigthsDecorator extends Decorator {
    private $decoratedCar;                                  //Объкект класса CarComponent

    public function __construct(CarComponent $car)          //Декорируемый объект
    {
        $this->decoratedCar = $car;
    }

    function getDescription()
    {
        return $this->decoratedCar->getDescription() . " + Anti Fog Ligths";
    }

    function cost()
    {
        return $this->decoratedCar->cost() + 300;
    }
}

class SpoilerDecorator extends Decorator {
    private $decoratedCar;

    public function __construct(CarComponent $car)
    {
        $this->decoratedCar = $car;
    }

    function getDescription()
    {
        return $this->decoratedCar->getDescription() . " + Sport Spoiler";
    }

    function cost()
    {
        return $this->decoratedCar->cost() + 250;
    }
}

class MetalBumperDecorator extends Decorator {
    private $decoratedCar;
    private $gift = "Free OIL";

    public function __construct(CarComponent $car)
    {
        $this->decoratedCar = $car;
    }

    function getDescription()
    {
        return $this->decoratedCar->getDescription() . " + Metal Bumper". $this->gift();
    }
    //расширяем функционал бесплатным подарком
    private function gift() {
        if ($this->gift === true) return " + Free Gift(OIL)!";
    }

    function cost()
    {
        return $this->decoratedCar->cost() + 400;
    }

}