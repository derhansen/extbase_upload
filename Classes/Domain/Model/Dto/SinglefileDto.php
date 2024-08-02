<?php

declare(strict_types=1);

namespace Derhansen\ExtbaseUpload\Domain\Model\Dto;

use TYPO3\CMS\Core\Http\UploadedFile;
use TYPO3\CMS\Extbase\Annotation\FileUpload;
use TYPO3\CMS\Extbase\Annotation\Validate;
use TYPO3\CMS\Extbase\Validation\Validator\FileSizeValidator;
use TYPO3\CMS\Extbase\Validation\Validator\MimeTypeValidator;

class SinglefileDto
{
    #[Validate([
        'validator' => 'NotEmpty'
    ])]
    protected string $title = '';

    #[Validate(['validator' => 'NotEmpty'])]
    #[Validate([
        'validator' => MimeTypeValidator::class,
        'options' => [
            'allowedMimeTypes' => ['image/jpeg'],
        ]
    ])]
    #[Validate([
        'validator' => FileSizeValidator::class,
        'options' => [
            'minimum' => '10M',
        ]
    ])]
    protected ?UploadedFile $file = null;

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getFile(): ?UploadedFile
    {
        return $this->file;
    }

    public function setFile(?UploadedFile $file): void
    {
        $this->file = $file;
    }
}
