<?php
/**
 * Created by PhpStorm.
 * User: inohodec
 * Date: 2/5/18
 * Time: 12:04 PM
 */



abstract class CarComponent
{
    public $description = 'Unknown CAR';

    function getDescription() {
        return $this->description;
    }

    abstract function cost();
}


