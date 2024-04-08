<?php

declare(strict_types=1);

namespace Derhansen\ExtbaseUpload\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Annotation\Validate;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class Inlinetest extends AbstractEntity
{
    #[Validate([
        'validator' => 'NotEmpty'
    ])]
    protected string $title = '';

    protected Singlefile $singlefile;

    /**
     * @var ObjectStorage<Singlefile>
     */
    protected ObjectStorage $singlefiles;

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getSinglefile(): Singlefile
    {
        return $this->singlefile;
    }

    public function setSinglefile(Singlefile $singlefile): void
    {
        $this->singlefile = $singlefile;
    }

    public function getSinglefiles(): ObjectStorage
    {
        return $this->singlefiles;
    }

    public function setSinglefiles(ObjectStorage $singlefiles): void
    {
        $this->singlefiles = $singlefiles;
    }
}
