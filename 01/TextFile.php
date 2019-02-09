<?php

class TextFile
{
    protected $filePath;

    public function read(): array
    {
        $res = fopen($this->filePath, 'rb');
        $resultArray = [];

        while (false !== $str = fgets($res)) {
            $resultArray[] = trim($str);
        }

        fclose($res);

        return $resultArray;
    }

    public function write($strings):void
    {
        $res = fopen($this->filePath, 'wb');
        fwrite($res, implode(PHP_EOL, $strings));
        fclose($res);
    }

    public function __construct($fileName)
    {
        $this->filePath = $fileName;
    }
}