<?php

declare(strict_types=1);

namespace Derhansen\ExtbaseUpload\Domain\Model\Dto;

use TYPO3\CMS\Core\Http\UploadedFile;
use TYPO3\CMS\Extbase\Annotation\Validate;

class SinglefileDto
{
    #[Validate([
        'validator' => 'NotEmpty'
    ])]
    protected string $title = '';

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
