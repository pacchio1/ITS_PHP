<?php

class Board
{
    private $tabella;


    public function __construct()
    {
        $this->tabella = array(
            array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
            array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
            array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
            array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
            array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
            array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
            array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
            array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
            array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
            array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O')
        );
    }
    public function tabella()
    {
        return $this->tabella;
    }
}
