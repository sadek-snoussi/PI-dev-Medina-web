<?php
/**
 * Created by PhpStorm.
 * User: ASUS I7
 * Date: 18/02/2018
 * Time: 10:49
 */

namespace EventBundle;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use EventBundle\EventListener\UploadImageListener;

class ImageUpload
{
    private $targetDir;
    public function __construct($targetDir)
    {
        $this->targetDir = $targetDir;
    }

    public function upload(UploadedFile $file)
    {
        $fileName = md5(uniqid()).'.'.$file->guessExtension();

        $file->move($this->getTargetDir(), $fileName);

        return $fileName;
    }

    public function getTargetDir()
    {
        return $this->targetDir;
    }

}