<?php

class Uploader
{
    protected $formFieldName = '';
    protected $savedFile = '';

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
            $this->savedFile = $_FILES[$this->formFieldName];

            $savedImagePath = $this->savedFile['tmp_name'];
            $imageName = $this->savedFile['name'];
            $imageMimeType = $this->savedFile['type'];

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
            $this->savedFile = $_FILES[$this->formFieldName];

            $savedFilePath = $this->savedFile['tmp_name'];
            $fileName = $this->savedFile['name'];

            $destFilePath = __DIR__ . '/../file_storage/' . $fileName;

            $result = move_uploaded_file($savedFilePath, $destFilePath);

            return $result;
        }

        return false;
    }
}