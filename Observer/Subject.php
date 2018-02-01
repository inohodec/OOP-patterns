<?php
/**
 * Created by PhpStorm.
 * User: inohodec
 * Date: 2/1/18
 * Time: 12:36 PM
 */

interface Subject
{
    public function registerObserver(Observer $observer);   //Добавляет "Наблюдателя в массив" $observersList
    public function deleteObserver(Observer $observer);     //Удаляет "Наблюдателя" из массива
    public function notifyObserver();                       //Оповещает "Наблюдателей"
}

class WeatherData implements Subject {
    private $observersList = [];        //Массив в котором содержатся "Наблюдатели"
    private $temp_mrn;                  //температура в определенное время
    private $temp_md;                   //температура в определенное время
    private $temp_ngt;                  //температура в определенное время


    /*
     * Добавляет "Наблюдателя в массив" $observersList
     */
    public function registerObserver(Observer $observer)
    {
        if (!array_search($observer, $this->observersList)) {
            $this->observersList[] = $observer;
        }
    }

    /*
     * Удаляет "Наблюдателя" из массива
     */
    public function deleteObserver(Observer $observer)
    {
        $observerKey = array_search($observer, $this->observersList);
        if ($observerKey !== false) {
            unset($this->observersList[$observerKey]);
        }
    }

    /*
     * Оповещает "Наблюдателей"
     */
    public function notifyObserver()
    {
        foreach ($this->observersList as $observer) {
            $observer->update($this->temp_mrn, $this->temp_md, $this->temp_ngt);
        }
    }

    /*
     * Получает данные от куда-либо(в данном случае генерируем случайным образом) и вызывает метод notifyObserver()
     */
    function setValues() {
        $this->temp_mrn = rand(-20,0);
        $this->temp_md = rand(-20,0);
        $this->temp_ngt = rand(-20,0);
        $this->notifyObserver();
    }
}