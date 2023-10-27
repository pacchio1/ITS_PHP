<?php

class Nave
{

    public $lunghezza;
    public $posizione = [];

    public function posiziona($x, $y, $direzione)
    {
        $this->posizione = [$x, $y, $direzione];
    }


    public function affonda()
    {
    }
}


class Cacciatorpediniere extends Nave
{

    public function __construct()
    {
        $this->lunghezza = 2;
    }
}

class Sottomarino extends Nave
{

    public function __construct()
    {
        $this->lunghezza = 3;
    }
}
class Incrociatore extends Nave
{

    public function __construct()
    {
        $this->lunghezza = 4;
    }
}

class Corazzata extends Nave
{

    public function __construct()
    {
        $this->lunghezza = 5;
    }
}

class Portaerei extends Nave
{

    public function __construct()
    {
        $this->lunghezza = 6;
    }
}
