<?php
interface Subject
{
    public function registerObserver(Observer $observer);
    public function deleteObserver(Observer $observer);
    public function notifyObserver();
}

class WeatherData implements Subject
{
    private $observersList = [];
    private $temp_mrn;
    private $temp_md;
    private $temp_ngt;

    public function registerObserver(Observer $observer)
    {
        if (!array_search($observer, $this->observersList)) {
            $this->observersList[] = $observer;
        }
    }

    public function deleteObserver(Observer $observer)
    {
        $observerKey = array_search($observer, $this->observersList);
        if ($observerKey) {
            unset($this->observersList[$observerKey]);
        }
    }

    public function notifyObserver()
    {
        foreach ($this->observersList as $observer) {
            $observer->update($this->temp_mrn, $this->temp_md, $this->temp_ngt);
        }
    }

    function setValues()
    {
        $this->temp_mrn = rand(-20, 0);
        $this->temp_md = rand(-20, 0);
        $this->temp_ngt = rand(-20, 0);
        $this->notifyObserver();
    }
}

interface Observer
{
    function update($temp_morn, $temp_md, $temp_night);
}

interface Display {
    function display($temp_morn, $temp_md, $temp_night);
}

class Phone implements Observer, Display {

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

$weatherStationFromDnepr = new WeatherData();

$phone = new Phone($weatherStationFromDnepr);
$pc = new Desktop($weatherStationFromDnepr);
$tablet = new Tablet($weatherStationFromDnepr);

$weatherStationFromDnepr->setValues();
$weatherStationFromDnepr->deleteObserver($phone);
$weatherStationFromDnepr->setValues();