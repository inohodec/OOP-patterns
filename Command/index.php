<?php
require_once 'Commands.php';
require_once 'Receivers.php';
require_once 'Invoker.php';

echo "<a href='../index.php'>Back to patterns list</a><hr>";
echo "<p style='text-align: center; margin: 15px;'><img src='Command'></p>";

//Клиентом выступит наш клиентский код, который рандомно будет нажимать кнопки пульта

$teka = new MyOven();                       //Создаем получателя (наша духовка)
$samsung = new MyMicrowave();               //Создаем получателя (наша микроволновка)

$remoteControl = new RemoteControl();       //Создаем объект инициатора(invoker) - наш пульт ДУ

//программируем пульт. Клиент(клиентский код) создает объекты команды и помещает в них получателя
//также получателя можно получать например внутри метода execute() от фабрики объектов
//типа $receiver = Fabric::getObject($obj_name)

$ovenOn = new OvenOn($teka);
$ovenOn = new OvenOn($teka);


$remoteControl->setSlot(0, new OvenOn($teka), new ovenOff($teka));
$remoteControl->setSlot(1, new MicrowaveOn($samsung), new MicrowaveOff($samsung));

//третий слот остался "пустым", точнее с объектами "заглушками"

$remoteControl->pressOn(0);
$remoteControl->pressOff(0);
$remoteControl->pressOn(1);
$remoteControl->undoAction();


