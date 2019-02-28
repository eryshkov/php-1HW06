<?php

class Uploader
{
    protected $formFieldName = '';
    protected $savedImage = '';

    public function __construct($formFieldName)
    {
        $this->formFieldName = $formFieldName;
    }

    protected function isUploaded(): bool
    {
        if (isset($_FILES[$this->formFieldName])) {
            $savedImage = $_FILES[$this->formFieldName];

            if (0 === $savedImage['error']) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return bool
     */
    public function upload(): bool
    {
        if ($this->isUploaded()) {
            $this->savedImage = $_FILES[$this->formFieldName];

            $savedImagePath = $this->savedImage['tmp_name'];
            $imageName = $this->savedImage['name'];

            $imageMimeType = $this->savedImage['type'];
            $isImage = strpos($imageMimeType, 'image') === 0;

            if (true === $isImage) {
                move_uploaded_file($savedImagePath, __DIR__ . '/../img/' . $imageName);
                return true;
            }
        }

        return false;
    }
}