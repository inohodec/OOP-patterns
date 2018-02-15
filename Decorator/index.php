<?php
/*
 * Паттерн декоратор динамически наделяет объект новыми возможностями и является гибкой альтернативой субклассированию
 * в области расширения функциональности
 * **********************************************************************************************************
 * Декоратор имеет одинаковый тип с декорируемым объектом
 * -------------------------------------------------
 * Можно завернуть объект в один или несколько декораторов
 * --------------------------------------------------
 * Т.к. декоратор относится к одному супертипу что и декорируемый объект, мы можем передать декорированный
 * объект вместо исходного
 * ----------------------------------------------------
 * ВАЖНО: Декоратор добавляет свое поведение до и(или) после делегирования операций декорируемому объекту,
 * выполняющему остальную работу
 * -----------------------------------------------------
 * Объект может быть декорирован в любой момент времени, так что мы можем декорироватьобъекты динамически и с произвольным кол-вом декораторов
 *
 */


echo "<a href='../index.php'>Back to patterns list</a><hr>";
echo "<p style='text-align: center; margin: 15px;'><img src='Decorator'></p>";

require_once 'CarComponent.php';
require_once 'ConcreteCarComponent.php';
require_once 'Decorator.php';

$car1 = new SedanCarComponent();
$car1 = new SpoilerDecorator($car1);
$car1 = new AntiFogLigthsDecorator($car1);
$car1 = new MetalBumperDecorator($car1);

echo $car1->getDescription()."<br>";
echo $car1->cost()."<hr>";


$car2= new HatchbackCarComponent();
//Мы как бы заворачиваем нашу машину в каждый декоратор, а тот заворачиваем в новый и так можно до бесконечности
//(важно чтобы конкретная реалищация CarComponent заворачивалась первой)
$car2 = new MetalBumperDecorator(new AntiFogLigthsDecorator(new SpoilerDecorator(new HatchbackCarComponent())));

echo $car2->getDescription()."<br>";
echo $car2->cost()."<hr>";