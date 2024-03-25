<?php

declare(strict_types=1);

namespace Derhansen\ExtbaseUpload\Domain\Model\Dto;

use TYPO3\CMS\Core\Http\UploadedFile;
use TYPO3\CMS\Extbase\Annotation\Validate;
use TYPO3\CMS\Extbase\Annotation\FileUpload;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class MultifileDto
{
    #[Validate([
        'validator' => 'NotEmpty'
    ])]
    protected string $title = '';

    #[FileUpload([
        'validation' => [
            'required' => true,
            'maxFiles' => 99,
            'fileSize' => ['minimum' => '100K', 'maximum' => '2M'],
            'allowedMimeTypes' => ['image/jpeg']
        ],
    ])]
    /**
     * @var ObjectStorage<UploadedFile>
     */
    protected ObjectStorage $files;

    public function __construct()
    {
        $this->initializeObject();
    }

    public function initializeObject(): void
    {
        $this->files = new ObjectStorage();
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getFiles(): ObjectStorage
    {
        return $this->files;
    }

    public function setFiles(ObjectStorage $files): void
    {
        $this->files = $files;
    }
}
