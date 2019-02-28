<?php
require_once __DIR__ . '/TextFile.php';

class GuestBook extends TextFile
{
    protected $storage = [];

    public function __construct($fileName)
    {
        parent::__construct($fileName);
        $this->storage = $this->read();
    }

    public function getData(): array
    {
        return $this->storage;
    }

    public function append($text): GuestBook
    {
        $this->storage[] = $text;
        return $this;
    }

    public function save(): GuestBook
    {
        $this->write($this->storage);
        return $this;
    }
}