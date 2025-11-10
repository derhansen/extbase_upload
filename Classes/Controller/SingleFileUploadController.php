<?php

declare(strict_types=1);

namespace Derhansen\ExtbaseUpload\Controller;

use Derhansen\ExtbaseUpload\Domain\Model\Singlefile;
use Derhansen\ExtbaseUpload\Domain\Repository\SinglefileRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Attribute\IgnoreValidation;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class SingleFileUploadController extends ActionController
{
    public function __construct(protected readonly SinglefileRepository $singlefileRepository)
    {
    }

    public function listAction(): ResponseInterface
    {
        $this->view->assignMultiple([
            'items' => $this->singlefileRepository->findAllNotInline(),
        ]);

        return $this->htmlResponse();
    }

    public function newAction(): ResponseInterface
    {
        $this->view->assignMultiple([
            'item' => GeneralUtility::makeInstance(Singlefile::class),
        ]);

        return $this->htmlResponse();
    }

    public function createAction(Singlefile $item): ResponseInterface
    {
        $item->setPid((int)($this->settings['singleFileUploadPid'] ?? 0));
        $this->singlefileRepository->add($item);

        return $this->redirect('list');
    }

    public function showAction(Singlefile $item): ResponseInterface
    {
        $this->view->assignMultiple([
            'item' => $item,
        ]);

        return $this->htmlResponse();
    }

    #[IgnoreValidation(['value' => 'item'])]
    public function editAction(Singlefile $item): ResponseInterface
    {
        $this->view->assignMultiple([
            'item' => $item,
        ]);

        return $this->htmlResponse();
    }

    public function updateAction(Singlefile $item): ResponseInterface
    {
        $this->singlefileRepository->update($item);

        return $this->redirect('list');
    }
}
