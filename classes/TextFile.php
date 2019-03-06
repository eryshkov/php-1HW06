<?php

class TextFile
{
    protected $filePath = '';

    public function __construct($fileName)
    {
        $this->filePath = $fileName;
    }

    public function read(): array
    {
        $resultArray = file($this->filePath, FILE_IGNORE_NEW_LINES);

        if (false !== $resultArray) {
            return $resultArray;
        } else {
            return [];
        }
    }

    public function write($strings): void
    {
        $res = fopen($this->filePath, 'wb');
        fwrite($res, implode(PHP_EOL, $strings));
        fclose($res);
    }
}