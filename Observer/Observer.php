<?php

interface Observer
{
    function update($temp_morn, $temp_md, $temp_night);     //Вызывается при изменении Subject
}

interface Display {
    function display($temp_morn, $temp_md, $temp_night);    //Для каждого типа устройства свое отображение
}

class Phone implements Observer, Display {

    /*
     * /Принимает Subject и делегирует ему текуший объект для добавления в список оповещаемых
     */
    public function __construct(Subject $subject)
    {
        $subject->registerObserver($this);
    }

    /*
     *Определяет внешний вид отображения полученных от Subject данных
     */
    function display($temp_morn, $temp_md, $temp_night)
    {
        $average = ($temp_morn + $temp_md + $temp_night) / 3;               //вычисляет среднюю температуру
        echo __CLASS__."$temp_morn, $temp_md, $temp_night, $average<hr>";   //вводит данные на экран
    }

    /*
     * Этом метод вызываеться, когда Subject получает новые данные
     */
    function update($temp_morn, $temp_md, $temp_night)
    {
        $this->display($temp_morn, $temp_md, $temp_night);
    }

}

class Desktop implements Observer, Display {

    public function __construct(Subject $subject)
    {
        $subject->registerObserver($this);
    }
    function display($temp_morn, $temp_md, $temp_night)

    {
        $average = ($temp_morn + $temp_md + $temp_night) / 3;
        echo __CLASS__."$temp_morn, $temp_md, $temp_night, $average<hr>";
    }

    function update($temp_morn, $temp_md, $temp_night)
    {
        $this->display($temp_morn, $temp_md, $temp_night);
    }

}

class Tablet implements Observer, Display {

    public function __construct(Subject $subject)
    {
        $subject->registerObserver($this);
    }
    function display($temp_morn, $temp_md, $temp_night)

    {
        $average = ($temp_morn + $temp_md + $temp_night) / 3;
        echo __CLASS__."$temp_morn, $temp_md, $temp_night, $average<hr>";
    }

    function update($temp_morn, $temp_md, $temp_night)
    {
        $this->display($temp_morn, $temp_md, $temp_night);
    }

}