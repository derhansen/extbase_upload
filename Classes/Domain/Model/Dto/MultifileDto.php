<?php

declare(strict_types=1);

namespace Derhansen\ExtbaseUpload\Domain\Model\Dto;

use TYPO3\CMS\Core\Http\UploadedFile;
use TYPO3\CMS\Extbase\Annotation\Validate;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\CMS\Extbase\Validation\Validator\FileNameValidator;
use TYPO3\CMS\Extbase\Validation\Validator\FileSizeValidator;
use TYPO3\CMS\Extbase\Validation\Validator\MimeTypeValidator;

class MultifileDto
{
    #[Validate([
        'validator' => 'NotEmpty'
    ])]
    protected string $title = '';

    #[Validate(['validator' => 'NotEmpty'])]
    #[Validate([
        'validator' => FileNameValidator::class,
    ])]
    #[Validate([
        'validator' => MimeTypeValidator::class,
        'options' => [
            'allowedMimeTypes' => ['image/jpeg'],
        ]
    ])]
    #[Validate([
        'validator' => FileSizeValidator::class,
        'options' => [
            'minimum' => '1M',
            'maximum' => '20M',
        ]
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
