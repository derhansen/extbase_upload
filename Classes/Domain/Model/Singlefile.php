<?php

declare(strict_types=1);

namespace Derhansen\ExtbaseUpload\Domain\Model;

use TYPO3\CMS\Core\Resource\Enum\DuplicationBehavior;
use TYPO3\CMS\Extbase\Annotation\FileUpload;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Annotation\Validate;

class Singlefile extends AbstractEntity
{
    #[Validate([
        'validator' => 'NotEmpty'
    ])]
    protected string $title = '';

    #[FileUpload([
        'validation' => [
            'required' => true,
            'maxFiles' => 1,
            'fileSize' => ['minimum' => '0K', 'maximum' => '2M'],
            'allowedMimeTypes' => ['image/jpeg']
        ],
        'uploadFolder' => '1:/user_upload/extbase_single_file/',
        'addRandomPostfix' => false,
        'duplicationBehavior' => DuplicationBehavior::RENAME,
    ])]
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
