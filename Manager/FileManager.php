<?php

/*
 * This file is part of the OrkestraApplicationBundle package.
 *
 * Copyright (c) Orkestra Community
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

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
     * @param resource $gdResource  A GD image resource
     * @param string $path          The path (no filename) to save the image
     * @param string $filename      The filename to save the image as
     *
     * @throws \RuntimeException
     * @return \Orkestra\Bundle\ApplicationBundle\Entity\File
     */
    public function saveImageToPng($gdResource, $path = null, $filename = null)
    {
        if (null === $path) {
            $path = $this->basePath;
        }

        $this->ensureDirectoryExists($path);

        if (null === $filename) {
            $filename = md5(uniqid('imagepng', true)) . '.png';
        }

        $fullPath = $path . '/' . $filename;
        $result = imagepng($gdResource, $fullPath, 5);

        if (!$result) {
            throw new \RuntimeException(sprintf('Could not save image to %s', $fullPath));
        }

        $file = new File($fullPath, $filename, 'image/png', filesize($fullPath));

        return $file;
    }

    /**
     * Attempts to create the given directory, throwing an exception if unable to
     *
     * @param string $path
     *
     * @return string            $path
     * @throws \RuntimeException
     */
    private function ensureDirectoryExists($path)
    {
        if (!is_dir($path)) {
            if (!mkdir($path, 0777, true)) {
                throw new \RuntimeException(sprintf('Could not create directory "%s"', $path));
            }
        }

        return $path;
    }
}
