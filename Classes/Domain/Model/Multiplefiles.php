<?php

declare(strict_types=1);

namespace Derhansen\ExtbaseUpload\Domain\Model;

use TYPO3\CMS\Extbase\Annotation\FileUpload;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Annotation\Validate;

class Multiplefiles extends AbstractEntity
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
            'mimeType' => ['allowedMimeTypes' => ['image/jpeg']],
        ],
        'uploadFolder' => '1:/user_upload/extbase_single_file/'
    ])]
    protected ?FileReference $file1 = null;

    #[FileUpload([
        'validation' => [
            'required' => false,
            'maxFiles' => 1,
            'fileSize' => ['minimum' => '0K', 'maximum' => '2M'],
            'mimeType' => ['allowedMimeTypes' => ['image/jpeg']],
        ],
        'uploadFolder' => '1:/user_upload/extbase_single_file/'
    ])]
    protected ?FileReference $file2 = null;

    #[FileUpload([
        'validation' => [
            'required' => false,
            'maxFiles' => 1,
            'fileSize' => ['minimum' => '0K', 'maximum' => '2M'],
            'mimeType' => ['allowedMimeTypes' => ['image/jpeg']],
        ],
        'uploadFolder' => '1:/user_upload/extbase_single_file/'
    ])]
    protected ?FileReference $file3 = null;

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getFile1(): ?FileReference
    {
        return $this->file1;
    }

    public function setFile1(?FileReference $file1): void
    {
        $this->file1 = $file1;
    }

    public function getFile2(): ?FileReference
    {
        return $this->file2;
    }

    public function setFile2(?FileReference $file2): void
    {
        $this->file2 = $file2;
    }

    public function getFile3(): ?FileReference
    {
        return $this->file3;
    }

    public function setFile3(?FileReference $file3): void
    {
        $this->file3 = $file3;
    }
}
