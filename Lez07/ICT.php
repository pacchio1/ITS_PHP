<?php

use Studente as GlobalStudente;

/**
 * Classe astratta Studente per la gestione di tutti gli studenti dell’ITS Piemonte
 */
abstract class Studente
{
    protected $nome;
    protected $cognome;
    protected $email;
    protected $dataDiNascita;
    protected $corsi = [];

    public function __construct(string $nome, string $cognome, string $email, string $dataDiNascita)
    {
        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->email = $email;
        $this->dataDiNascita = $dataDiNascita;
    }

    public function addCorso(string $corso): void
    {
        if (!isset($this->corsi[$corso])) {
            $this->corsi[$corso] = 0;
        }
    }

    public function addVotoEsame(string $corso, int $voto): void
    {
        if (isset($this->corsi[$corso])) {
            $this->corsi[$corso] = $voto;
        }
    }

    public function getMediaEsami(): ?float
    {
        if (empty($this->corsi)) {
            return null;
        }
        return array_sum($this->corsi) / count($this->corsi);
    }

    abstract public function getTipo(): string;
}

/**
 * Classe ICT che estende la classe Studente per gestire le specificità dei corsi di Informatica
 */
include 'studente.php';
class ICT extends Studente
{
    private $tipo;

    public function __construct(string $nome, string $cognome, string $email, string $dataDiNascita, string $tipo)
    {
        parent::__construct($nome, $cognome, $email, $dataDiNascita);
        $this->tipo = $tipo;
    }

    public function getTipo(): string
    {
        return $this->tipo;
    }
}
