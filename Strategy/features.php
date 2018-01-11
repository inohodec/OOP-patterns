<?php
/**********************************************************************************************
Код для Flying и Shooting
 **********************************************************************************************/

//------------ интерфейс для полетов --------------------//
interface Flying {
    public function fly();
}

# Двигатель для Дредноута
class SubSpaceEngine implements Flying {
    public function fly()
    {
        echo "I always use ".__CLASS__." for flying<br>";
    }
}

# Двигатель для Разведчика
class RapidEngine implements Flying {
    public function fly()
    {
        echo "I always use ".__CLASS__." for extra fast flying<br>";
    }
}

# Двигатель для Игрушки
class ToyEngine implements Flying {
    public function fly()
    {
        echo "I always use ".__CLASS__." for flying<br>";
    }
}



//--------------------интерфейс для стрельбы---------------------//
interface Shooting {
    public function shoot();
}

# Пушка для Дредноута
class Devastator implements Shooting {
    public function shoot()
    {
        echo "I always use ".__CLASS__." for destroying planets<br>";
    }
}

# Пушка для Разведчика
class Laser implements Shooting {
    public function shoot()
    {
        echo "I always use ".__CLASS__." for destroying other ships<br>";
    }
}

# Нестреляющая пушка для игрушки
class Toy implements Shooting {
    public function shoot()
    {
        echo "I can't shoot, because I'm just a toy<br>";
    }
}