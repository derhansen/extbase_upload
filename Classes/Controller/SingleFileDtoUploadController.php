<?php

declare(strict_types=1);

namespace Derhansen\ExtbaseUpload\Controller;

use Derhansen\ExtbaseUpload\Domain\Model\Dto\SinglefileDto;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class SingleFileDtoUploadController extends ActionController
{
    public function indexAction(): ResponseInterface
    {
        return $this->htmlResponse();
    }

    public function newAction(): ResponseInterface
    {
        $this->view->assignMultiple([
            'singlefileDto' => GeneralUtility::makeInstance(SinglefileDto::class),
        ]);

        return $this->htmlResponse();
    }

    public function createAction(SinglefileDto $singlefileDto): ResponseInterface
    {
        return $this->redirect('index');
    }
}
