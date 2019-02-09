<?php

class TextFile
{
    protected $filePath;

    protected function read(): array
    {
        $res = fopen($this->filePath, 'rb');
        $resultArray = [];

        while (false !== $str = fgets($res)) {
            $resultArray[] = trim($str);
        }

        fclose($res);

        return $resultArray;
    }

    public function __construct($fileName)
    {
        $this->filePath = $fileName;
    }
}