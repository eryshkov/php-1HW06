<?php

class Uploader
{
    protected $formFieldName;
    protected $savedImage;

    public function __construct($formFieldName)
    {
        $this->formFieldName = $formFieldName;
    }

    protected function isUploaded(): bool
    {
        if (isset($_FILES[$this->formFieldName])) {
            $savedImage = $_FILES[$this->formFieldName];

            if (0 === $savedImage['error']) {
                $this->savedImage = $savedImage;
                return true;
            }
        }

        return false;
    }

    public function upload():void
    {
        if ($this->isUploaded()) {
            $savedImagePath = $this->savedImage['tmp_name'];
            $imageName = $this->savedImage['name'];
            $imageMimeType = $this->savedImage['type'];
            $isImage = strpos($imageMimeType, 'image') === 0;
            if ($isImage) {
                move_uploaded_file($savedImagePath, __DIR__ . '/img/' . $imageName);
            }
        }
    }
}