<?php
/*
Creare una classe denominata Collezione per gestire gli oggetti Foglio:
○ calcolare la media di tutti i fogli
*/
class Collezione
{
    private $fogli = [];

    public function aggiungiFoglio($foglio)
    {
        $this->fogli[] = $foglio;
    }

    public function mediaTuttiFogli()
    {
        $sum = 0;
        $count = 0;
        foreach ($this->fogli as $foglio) {
            $foglio->leggiCSV();
            $sum += $foglio->mediaDati();
            $count++;
        }
        $media = $sum / $count;
        return $media;
    }
}
