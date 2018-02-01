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

$weatherStationFromDnepr->setValues();