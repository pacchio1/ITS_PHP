<?php
class Studente implements CorsiInterface, StudenteInterface
{
    private $nome;
    private $cognome;
    private $email;
    private $dataDiNascita;
    private $corsi = [];

    public function setNome(string $nome): bool
    {
        $this->nome = $nome;
        return true;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setCognome(string $cognome): bool
    {
        $this->cognome = $cognome;
        return true;
    }

    public function getCognome(): string
    {
        return $this->cognome;
    }

    public function setEmail(string $email): bool
    {
        $this->email = $email;
        return true;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setDataDiNascita(int $giorno, int $mese, int $anno): bool
    {
        $data = sprintf("%02d/%02d/%04d", $giorno, $mese, $anno);
        $this->dataDiNascita = $data;
        return true;
    }

    public function getDataDiNascita(): string
    {
        return $this->dataDiNascita;
    }

    public function addCorso(string $corso): bool
    {
        if (!in_array($corso, $this->corsi)) {
            $this->corsi[] = $corso;
            return true;
        }
        return false;
    }

    public function getCorsi(): array
    {
        return $this->corsi;
    }

    public function addVoto(string $corso, int $voto): bool
    {
        foreach ($this->corsi as &$c) {
            if ($c['name'] === $corso) {
                $c['mark'] = $voto;
                return true;
            }
        }
        return false;
    }

    public function getMediaCorsi(): float
    {
        if (empty($this->corsi)) {
            return 0.0;
        }

        $media = 0.0;
        foreach ($this->corsi as $c) {
            $media += $c['mark'];
        }

        return $media / count($this->corsi);
    }
}
