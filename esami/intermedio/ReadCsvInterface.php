<?php
interface ReadCsvInterface 
{
    // The file name of the CSV file to read
    public function __construct(string $filename);

    /** 
     * Returns an array of array where each element is a row of the CSV file.
     * Each element is an array containing the column values.
     */
    public function read(): array;

    /**
     * Returns an array of User objects.
     * @returns array User[]
     */
    public function readUsers(): array;
}