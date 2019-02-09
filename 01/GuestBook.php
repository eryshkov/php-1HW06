<?php

class GuestBook extends TextFile
{
    protected $storage;

    public function getData():array
    {
        return $this->storage;
    }

    public function append($text):void
    {
        array_unshift($this->storage, $text);
    }

    public function save():void
    {
        $res = fopen($this->filePath, 'wb');
        fwrite($res, implode(PHP_EOL, $this->storage));
        fclose($res);
    }

    public function __construct($fileName)
    {
        parent::__construct($fileName);
        $this->storage = $this->read();
    }
}