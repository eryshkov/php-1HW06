<?php
include __DIR__ . '/TextFile.php';

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
        $this->write($this->storage);
    }

    public function __construct($fileName)
    {
        parent::__construct($fileName);
        $this->storage = $this->read();
    }
}