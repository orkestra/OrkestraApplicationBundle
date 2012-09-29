<?php

namespace Orkestra\Bundle\ApplicationBundle\Manager;

use Orkestra\Bundle\ApplicationBundle\Entity\File;

class FileManager
{
    /**
     * @var string
     */
    protected $basePath;

    /**
     * Constructor
     *
     * @param string $basePath
     */
    public function __construct($basePath)
    {
        $this->basePath = $basePath;
    }

    /**
     * @param string $basePath
     */
    public function setBasePath($basePath)
    {
        $this->basePath = $basePath;
    }

    /**
     * @return string
     */
    public function getBasePath()
    {
        return $this->basePath;
    }

    /**
     * @param resource $gdResource A GD image resource
     * @param string $filename
     *
     * @return \Orkestra\Bundle\ApplicationBundle\Entity\File
     * @throws \RuntimeException
     */
    public function saveImageToPng($gdResource, $filename = null)
    {
        if (empty($filename)) {
            $filename = md5(uniqid('imagepng', true)) . '.png';
        }

        $fullPath = $this->basePath . '/' . $filename;
        $result = imagepng($gdResource, $fullPath, 5);

        if (!$result) {
            throw new \RuntimeException(sprintf('Could not save image to %s', $fullPath));
        }

        $file = new File($fullPath, $filename, 'image/png', filesize($fullPath));

        return $file;
    }
}
