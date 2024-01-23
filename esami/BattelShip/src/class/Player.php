<?php
class Player
{
    private $nickname;
    private $turno;
    private $tabella;
    public function __construct($nickname, $turno)
    {
        $this->nickname = $nickname;
        $this->turno = $turno;
        $this->tabella
            = array(
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
    public function getNickname()
    {
        return $this->nickname;
    }
    public function getTurno()
    {
        return $this->turno;
    }
    public function getTabella()
    {
        return $this->tabella;
    }
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;
    }
    public function setTurno($turno)
    {
        $this->turno = $turno;
    }
    public function setTabella($tabella)
    {
        $this->tabella = $tabella;
    }
}
