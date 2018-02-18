<?php
//receivers
class MyOven {
    public function ovenOn() {
        echo "Oven was switched on!<br>";
    }
    public function ovenOff() {
        echo "Oven was switched off!<br>";
    }
}

class MyMicrowave {
    public function microwaveOn() {
        echo "Microwave was turned on!<br>";
    }
    public function microwaveOff() {
        echo "Microwave was turned off!<br>";
    }
}

//invoker
class RemoteControl {
    private $deviceOn = array();
    private $deviceOff = array();
    private $lastAction;

    public function __construct()
    {
        for ($i=0; $i <= 2; $i++) {
            $this->deviceOn[$i] = new DefaultEmpty();
            $this->deviceOff[$i] = new DefaultEmpty();
        }
        $this->lastAction = new DefaultEmpty();
    }

    public function setSlot(int $slotNumber, Commands $commandOn, Commands $commandOff)
    {
        $this->deviceOn[$slotNumber] = $commandOn;
        $this->deviceOff[$slotNumber] = $commandOff;
    }

    public function pressOn(int $slotNumber) {
        $this->deviceOn[$slotNumber]->execute();
        $this->lastAction = $this->deviceOn[$slotNumber];
    }

    public function pressOff(int $slotNumber) {
        $this->deviceOff[$slotNumber]->execute();
        $this->lastAction = $this->deviceOff[$slotNumber];
    }

    public function undoAction() {
        $this->lastAction->undo();
    }
}

//commands

abstract class Commands
{
    abstract function execute();                //делегирует определенные действия получателю
    abstract function undo();                   //делегирует действия получателю, обратные действиям execute()
}

class OvenOn extends Commands {
    public $receiver;

    public function __construct($receiver)
    {
        $this->receiver = $receiver;
    }

    function execute()
    {
        $this->receiver->ovenOn();
    }
    function undo()
    {
        $this->receiver->ovenOff();
    }
}

class OvenOff extends Commands {
    public $receiver;

    public function __construct($receiver)
    {
        $this->receiver = $receiver;
    }

    function execute()
    {
        $this->receiver->ovenOff();
    }
    function undo()
    {
        $this->receiver->ovenOn();
    }
}

class MicrowaveOn extends Commands {
    public $receiver;

    public function __construct($receiver)
    {
        $this->receiver = $receiver;
    }

    function execute()
    {
        $this->receiver->microwaveOn();
    }
    function undo()
    {
        $this->receiver->microwaveOff();
    }
}

class MicrowaveOff extends Commands {
    public $receiver;

    public function __construct($receiver)
    {
        $this->receiver = $receiver;
    }

    function execute()
    {
        $this->receiver->microwaveOff();
    }
    function undo()
    {
        $this->receiver->microwaveOff();
    }
}

class DefaultEmpty extends Commands {
    public function execute() {
        echo  "Just do nothing!<br>";
    }
    function undo()
    {
        echo "Just do nothing!<br>";
    }
}
//client's code
$remoteControl = new RemoteControl();

$ovenOn = new OvenOn($teka);
$ovenOn = new OvenOn($teka);

$remoteControl->setSlot(0, new OvenOn($teka), new ovenOff($teka));
$remoteControl->setSlot(1, new MicrowaveOn($samsung), new MicrowaveOff($samsung));

$remoteControl->pressOn(0);
$remoteControl->pressOff(0);
$remoteControl->pressOn(1);
$remoteControl->undoAction();