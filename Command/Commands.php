<?php
/**
    Объект команды должен содержать один ОБЯЗАТЕЛЬНЫЙ метод execute(), а также ссылку на получателя -
 * объект который будет выполнять действия метода execute() "команды" (регистрация пользователя, фидбэки и т.д.)
 *
 */

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

//класс заглушка для пульта - вызывает пустое "действие", при создании инициатора(нашего пульта) изначально
//присваиваем всем кнопкам этот объект, для того чтобы не проверять перед нажатием
//присвоена ли нажатой кнопке какая-либо команда или нет(что-бы не вызвать ошибку при нажатии на "пустую" кнопку)
class DefaultEmpty extends Commands {
    public function execute() {
        echo  "Just do nothing!<br>";
    }
    function undo()
    {
        echo "Just do nothing!<br>";
    }
}