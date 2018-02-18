<?php
/*
 * |   Remote Control    |
 * |---------------------|
 * | ButtonOn | ButtonOf |
 * |---------------------|
 * | ButtonOn | ButtonOf |
 * |---------------------|
 * | ButtonOn | ButtonOf |
 * |---------------------|
 * |  Undo Last Action   |
 * |---------------------|
 *
 * Наш пульт(инициатор) состоит из горизонтальных слотов
 */
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

    //Устанавливает команды в конкретный слоты
    public function setSlot(int $slotNumber, Commands $commandOn, Commands $commandOff)
    {
        $this->deviceOn[$slotNumber] = $commandOn;
        $this->deviceOff[$slotNumber] = $commandOff;
    }
    //Нажимает кнопку ВКЛ. конкретного слота
    public function pressOn(int $slotNumber) {
        $this->deviceOn[$slotNumber]->execute();
        $this->lastAction = $this->deviceOn[$slotNumber];
    }
    //Нажимает кнопку ВЫКЛ. конкретного слота
    public function pressOff(int $slotNumber) {
        $this->deviceOff[$slotNumber]->execute();
        $this->lastAction = $this->deviceOff[$slotNumber];
    }
    //Отменяет последнее действие
    public function undoAction() {
        $this->lastAction->undo();
    }

}