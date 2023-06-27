<?php
class Studente implements CorsiInterface,StudenteInterface
{
    //'Studente' does not implement methods 'getMediaCorsi',
    // 'addCorso', 'getCorsi', 'addVoto', 'setNome', 'getNome', 'setCognome',
    // 'getCognome', 'setEmail', 'getEmail', 'setDataDiNascita', 'getDataDiNascita'
    public $nome;
    public $cognome;
    public $email;
    public $dataDiNascita;
    protected $corsi = [];
    public function setNome($nome):bool
    {
        //Method 'Studente::setNome()' is not compatible with method 'StudenteInterface::setNome()'.
        $this->nome=$nome;
        return true;
    }
}