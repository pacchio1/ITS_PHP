<?php
#Pacchiotti
include 'ReadCsvInterface.php';
class CsvReader implements ReadCsvInterface
{
    private $filename;

    public function __construct(string $filename)
    {
        $this->filename = $filename;
    }

    public function read(): array
    {
        $righe = [];

        $stream = fopen($this->filename, "r");
        $dati = fgetcsv($stream, null, ",");
        while ($dati = fgetcsv($stream, null, ",")) {
            $righe[] = $dati;
        }
        fclose($stream);

        return $righe;
    }

    public function readUsers(): array
    {
        $righe = $this->read();
        $users = [];

        foreach ($righe as $dati) {
            $user = new User($dati[0], $dati[1], $dati[2]);
            $users[] = $user;
        }

        return $users;
    }
}
