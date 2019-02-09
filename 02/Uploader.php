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

    public function upload(): array
    {
        $result = ['success' => false, 'isImage' => null];

        if ($this->isUploaded()) {
            $savedImagePath = $this->savedImage['tmp_name'];
            $imageName = $this->savedImage['name'];
            $imageMimeType = $this->savedImage['type'];
            $result['isImage'] = strpos($imageMimeType, 'image') === 0;
            if (true === $result['isImage']) {
                $result['success'] = move_uploaded_file($savedImagePath, __DIR__ . '/img/' . $imageName);
            }
        }

        return $result;
    }
}