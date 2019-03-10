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
        if ($this->upload()) {
            if (!isset($this->savedFile['moved_name'])) {
                return false;
            }

            $movedFilePath = $this->savedFile['moved_name'];
            $fileName = $this->savedFile['name'];

            $imageMimeType = $this->savedFile['type'];
            $isImage = strpos($imageMimeType, 'image') === 0;

            if (true === $isImage) {
                $destFilePath = __DIR__ . '/../img/' . $fileName;
                $result = rename($movedFilePath, $destFilePath);
                return $result;
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
            if ($result) {
                $this->savedFile['moved_name'] = $destFilePath;
            } else {
                $this->savedFile['moved_name'] = null;
            }
            return $result;
        }

        return false;
    }
}