<?php

class Uploader
{
    protected $formFieldName;

    public function __construct($formFieldName)
    {
        $this->formFieldName = $formFieldName;
    }
}