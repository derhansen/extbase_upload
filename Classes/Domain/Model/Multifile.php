<?php

declare(strict_types=1);

namespace Derhansen\ExtbaseUpload\Domain\Model;

use TYPO3\CMS\Extbase\Annotation\FileUpload;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Annotation\Validate;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class Multifile extends AbstractEntity
{
    #[Validate([
        'validator' => 'NotEmpty'
    ])]
    protected string $title = '';

    #[FileUpload([
        'validation' => [
            'required' => true,
            'fileSize' => ['minimum' => '0K', 'maximum' => '2M'],
            'mimeType' => ['allowedMimeTypes' => ['image/jpeg']],
        ],
        'uploadFolder' => '1:/user_upload/extbase_single_file/'
    ])]
    /**
     * @var ObjectStorage<FileReference>
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
