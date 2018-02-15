<?php
//Конкреиные компоненты(в данном случае машины Седан, Хетчбэк и Пикап) которые наследуют
//Наследует от CarComponent.php


class SedanCarComponent extends CarComponent {

    function __construct()
    {
        $this->description = "This is SEDAN !!!";           //Устанавливаем $description унаследованный от CarComponent
    }

    function cost()
    {
        return 10000;
    }
}

class HatchbackCarComponent extends CarComponent {

    function __construct()
    {
        $this->description = "This is HATCHBACK !!!";       //Устанавливаем $description унаследованный от CarComponent
    }

    function cost()
    {
        return 8000;
    }
}

class PickupCarComponent extends CarComponent {

    function __construct()
    {
        $this->description = "This is PICK-UP !!!";         //Устанавливаем $description унаследованный от CarComponent
    }

    function cost()
    {
        return 12000;
    }
}