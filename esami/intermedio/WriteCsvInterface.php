<?php
interface WriteCsvInterface 
{
    // The file name of the CSV file to write
    public function __construct(string $filename);

    /** 
     * Write an array of rows in a CSV file.
     * Each element of the array is another array containing the column values.
     * Returns true if the operation is successfull, false otherwise.
     */
    public function write(array $rows): bool;

    /**
     * Writes an array of User Objects in a CSV file.
     * Returns true if the operation is successfull, false otherwise.
     */
    public function writeUsers(array $users): bool;
}