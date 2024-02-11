<?php

declare(strict_types=1);

namespace Derhansen\ExtbaseUpload\Domain\Model;

use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\CMS\Extbase\Annotation\Validate;

class Singlefile extends AbstractEntity
{
    #[Validate([
        'validator' => 'NotEmpty'
    ])]
    protected string $title = '';

    protected ?FileReference $file = null;

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getFile(): ?FileReference
    {
        return $this->file;
    }

    public function setFile(?FileReference $file): void
    {
        $this->file = $file;
    }
}
