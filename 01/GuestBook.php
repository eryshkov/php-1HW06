<?php

class GuestBook
{
    protected $storage;
    protected $storagePath;

    public function getData():array
    {
        return $this->storage;
    }

    public function append($text):void
    {
        array_unshift($this->storage, $text);
    }

    public function __construct($fileName)
    {
        $this->storagePath = $fileName;
        $this->storage = $this->readGuestBook($fileName);
    }

    protected function readGuestBook($fileName): array
    {
        $res = fopen($fileName, 'rb');
        $resultArray = [];

        while (false !== $str = fgets($res)) {
            $resultArray[] = trim($str);
        }

        fclose($res);

        return $resultArray;
    }
}