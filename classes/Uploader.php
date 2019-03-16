<?php

class Uploader
{
    protected $formFieldName = '';

    public function __construct($formFieldName)
    {
        $this->formFieldName = $formFieldName;
    }

    protected function isUploaded(): bool
    {
        if (isset($_FILES[$this->formFieldName])) {
            $savedFile = $_FILES[$this->formFieldName];

            if (0 === $savedFile['error']) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return bool
     */
    public function uploadImage(): bool
    {
        if ($this->isUploaded()) {
            $savedFile = $_FILES[$this->formFieldName];

            $savedImagePath = $savedFile['tmp_name'];
            $imageName = $savedFile['name'];
            $imageMimeType = $savedFile['type'];

            $isImage = strpos($imageMimeType, 'image') === 0;

            if (true === $isImage) {
                return move_uploaded_file($savedImagePath, __DIR__ . '/../img/' . $imageName);
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
            $savedFile = $_FILES[$this->formFieldName];

            $savedFilePath = $savedFile['tmp_name'];
            $fileName = $savedFile['name'];

            $destFilePath = __DIR__ . '/../file_storage/' . $fileName;

            return move_uploaded_file($savedFilePath, $destFilePath);
        }

        return false;
    }
}