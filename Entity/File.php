<?php

/*
 * This file is part of the OrkestraApplicationBundle package.
 *
 * Copyright (c) Orkestra Community
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Orkestra\Bundle\ApplicationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\Exception\UploadException;
use Orkestra\Common\Entity\AbstractEntity;
use Orkestra\Common\Type\DateTime;

/**
 * File Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="orkestra_files")
 * @ORM\HasLifecycleCallbacks
 */
class File extends AbstractEntity
{
    /**
     * Create From Uploaded File
     *
     * @param \Symfony\Component\HttpFoundation\File\UploadedFile $upload
     * @param string                                              $uploadPath The directory to save the uploaded file to
     * @param string                                              $filename
     *
     * @throws \Symfony\Component\HttpFoundation\File\Exception\UploadException
     * @return \Orkestra\Bundle\ApplicationBundle\Entity\File
     */
    public static function createFromUploadedFile(UploadedFile $upload, $uploadPath, $filename = null)
    {
        if (!$upload->isValid()) {
            throw new UploadException(sprintf('An error occurred during file upload. Error code: %s', $upload->getError()));
        } elseif (($uploadPath = realpath($uploadPath . '/')) === false) {
            throw new UploadException('An error occurred during file upload. The specified upload path is invalid.');
        }

        if (!$filename) {
            $fullPath = sprintf(
                '%s%s%s.%s',
                rtrim($uploadPath, DIRECTORY_SEPARATOR),
                DIRECTORY_SEPARATOR,
                uniqid(),
                ($upload->getExtension() ?: ($upload->guessExtension() ?: 'file'))
            );
        } else {
            $fullPath = rtrim($uploadPath, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . $filename;
        }

        $file = new self($fullPath, $upload->getClientOriginalName(), $upload->getMimeType(), $upload->getClientSize(), md5_file($upload->getRealPath()));
        $file->_uploadedFile = $upload;

        return $file;
    }

    /**
     * @var \Symfony\Component\HttpFoundation\File\UploadedFile
     */
    private $_uploadedFile = null;

    /**
     * @var string $path The full filesystem path to the file
     *
     * @ORM\Column(name="path", type="string", unique=true)
     */
    protected $path;

    /**
     * @var string $filename
     *
     * @ORM\Column(name="filename", type="string")
     */
    protected $filename;

    /**
     * @var string $mimeType
     *
     * @ORM\Column(name="mime_type", type="string")
     */
    protected $mimeType = '';

    /**
     * @ORM\ManyToMany(targetEntity="Orkestra\Bundle\ApplicationBundle\Entity\Group", fetch="EAGER")
     * @ORM\JoinTable(name="orkestra_file_groups",
     *     joinColumns={@ORM\JoinColumn(name="file_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")}
     * )
     */
    protected $groups;

    /**
     * @var string $user
     *
     * @ORM\ManyToOne(targetEntity="Orkestra\Bundle\ApplicationBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    protected $user;

    /**
     * @var integer $fileSize
     *
     * @ORM\Column(name="file_size", type="integer")
     */
    protected $fileSize = 0;

    /**
     * @var string $md5
     *
     * @ORM\Column(name="md5_hash", type="string")
     */
    protected $md5 = '';

    /**
     * Constructor
     */
    public function __construct($path, $filename, $mimeType = '', $fileSize = 0, $md5 = '')
    {
        $this->path = $path;
        if (!empty($md5)) {
            $this->md5 = $md5;
        } elseif (file_exists($path)) {
            $this->md5 = md5_file($path);
        }

        $this->filename = $filename;
        $this->mimeType = $mimeType ?: '';
        $this->fileSize = $fileSize ?: 0;

        $this->groups = new ArrayCollection();
    }

    /**
     * Set Filename
     *
     * @param string $filename
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;
    }

    /**
     * Get Filename
     *
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Get Path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Get Mime Type
     *
     * @return string
     */
    public function getMimeType()
    {
        return $this->mimeType;
    }

    /**
     * Get File Size
     *
     * @return float
     */
    public function getFileSize()
    {
        return $this->fileSize;
    }

    /**
     * Get MD5 hash of the file
     *
     * @return string
     */
    public function getMd5()
    {
        return $this->md5;
    }

    /**
     * Get Content
     *
     * Returns the content of the file, unaltered
     *
     * @return mixed
     */
    public function getContent()
    {
        return file_get_contents($this->path);
    }

    /**
     * Add Group
     *
     * @param \Orkestra\Bundle\ApplicationBundle\Entity\Group $group
     */
    public function addGroup(Group $group)
    {
        $this->groups[] = $group;
    }

    /**
     * Remove Group
     *
     * @param \Orkestra\Bundle\ApplicationBundle\Entity\Group $group
     */
    public function removeGroup(Group $group)
    {
        foreach ($this->groups as $index => $existingGroup) {
            if ($existingGroup === $group) {
                unset($this->groups[$index]);

                return;
            }
        }
    }

    /**
     * Get Groups
     *
     * @return \Doctrine\Common\Collections\Collection|\Orkestra\Bundle\ApplicationBundle\Entity\Group[]
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * Set User
     *
     * @param \Orkestra\Bundle\ApplicationBundle\Entity\User
     */
    public function setUser(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get User
     *
     * @return \Orkestra\Bundle\ApplicationBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Move Uploaded File
     *
     * If the file was uploaded, then this method will move the uploaded file from the temporary
     * directory to its new path.
     *
     * This is usually automatically handled as this method is a prePersist lifecycle callback.
     *
     * @ORM\PrePersist
     */
    public function moveUploadedFile()
    {
        $this->dateCreated = new DateTime();

        if (null === $this->_uploadedFile) {
            return;
        }

        $this->_uploadedFile->move(dirname($this->path), basename($this->path));
    }

    /**
     * Delete
     *
     * Unlinks the file. This does not do anything about the database side of things.
     *
     * This is usually automatically handled as this method is a postRemove lifecycle callback.
     *
     * @ORM\PostRemove
     */
    public function delete()
    {
        unlink($this->path);
    }
}
