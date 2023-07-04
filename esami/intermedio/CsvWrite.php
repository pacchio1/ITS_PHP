<?php
#Pacchiotti
include 'WriteCsvInterface.php';
class CsvWriter implements WriteCsvInterface
{
    private $filename;

    public function __construct(string $filename)
    {
        $this->filename = $filename;
    }

    public function write(array $righe): bool
    {
        if ($stream = fopen($this->filename, "w") == false) {
            return false;
        }
        $stream = fopen($this->filename, "w");

        foreach ($righe as $riga) {
            fputcsv($stream, $riga, ",");
        }
        fclose($stream);
        return true;
    }

    public function writeUsers(array $users): bool
    {
        $righe = [];

        foreach ($users as $user) {
            $righe[] = [$user->getName(), $user->getEmail(), $user->getPhone()];
        }

        return $this->write($righe);
    }
}











































###
