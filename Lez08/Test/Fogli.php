<?php
/*
○ leggere il file CSV
○ calcolare la media di ogni riga del file
○ calcolare la media di tutti i dati presenti nel file */
class Foglio
{
    private $filename;
    private $data = [];

    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    public function leggiCSV()
    {
        $file = fopen($this->filename, 'r');
        while (($row = fgetcsv($file, null, ';')) !== false
        ) {
            $this->data[] = $row;
        }
        fclose($file);
    }

    public function mediaRighe()
    {
        $mediarighe = [];
        foreach ($this->data as $row) {
            $sum = array_sum($row);
            $count = count($row);
            $media = $sum / $count;
            $mediarighe[] = $media;
        }
        return $mediarighe;
    }

    public function mediaDati()
    {
        $sum = 0;
        $count = 0;
        foreach ($this->data as $row) {
            foreach ($row as $dato) {
                $sum += (int)$dato;
                $count++;
            }
        }
        $media = $sum / $count;
        return $media;
    }
}
