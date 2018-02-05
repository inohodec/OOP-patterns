<?php
/*
 * Паттерн "Наблюдатель" реализует отношение "один-ко-многим" между объектами таким образом, что при изменении состояния
 * одного объекта происходит автоматическое оповещение и обновление всех зависимых объектов
 */


require_once 'Observer.php';
require_once 'Subject.php';


echo "<a href='../index.php'>Back to patterns list</a><hr>";
echo "<p style='text-align: center; margin: 15px;'><img src='Observer'></p>";

$weatherStationFromDnepr = new WeatherData();

$phone = new Phone($weatherStationFromDnepr);
$pc = new Desktop($weatherStationFromDnepr);
$tablet = new Tablet($weatherStationFromDnepr);

$weatherStationFromDnepr->setValues();
$weatherStationFromDnepr->deleteObserver($phone);
$weatherStationFromDnepr->setValues();


// ---------------- OUTPUT ------------------------


//Phone-19, -2, -12, -11
//Desktop-19, -2, -12, -11
//Tablet-19, -2, -12, -11

//Desktop0, -19, -14, -11
//Tablet0, -19, -14, -11

