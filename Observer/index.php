<?php
/*
 * Паттерн "Наблюдатель" реализует отношение "один-ко-многим" между объектами таким образом, что при изменении состояния
 * одного объекта происходит автоматическое оповещение и обновление всех зависимых объектов
 */

/*
 *
 */

require_once 'Observer.php';
require_once 'Subject.php';


$weatherStationFromDnepr = new WeatherData();

$phone = new Phone($weatherStationFromDnepr);
$pc = new Desktop($weatherStationFromDnepr);
$tablet = new Tablet($weatherStationFromDnepr);

$weatherStationFromDnepr->setValues();

$weatherStationFromDnepr->deleteObserver($phone);

<<<<<<< HEAD
$weatherStationFromDnepr->setValues();

/*
 * OUTPUT
 */

//Phone-19, -2, -12, -11
//Desktop-19, -2, -12, -11
//Tablet-19, -2, -12, -11

//Desktop0, -19, -14, -11
//Tablet0, -19, -14, -11
=======
$weatherStationFromDnepr->setValues();
>>>>>>> 50ffe82ee7ea5537527b945603c144b4bbd839f8
