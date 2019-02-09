<?php

class GuestBook
{
    protected $storage;

    public function getData():array
    {
        return $this->storage;
    }

    public function __construct($fileName)
    {
        $this->storage = $this->readGuestBook($fileName);
    }

    protected function readGuestBook($fileName): array
    {
        $res = fopen($fileName, 'r');
        $resultArray = [];

        while (false !== $str = fgets($res)) {
            $resultArray[] = trim($str);
        }

        fclose($res);

        return $resultArray;
    }
}