<?php

declare(strict_types=1);

namespace Derhansen\ExtbaseUpload\Controller;

use Derhansen\ExtbaseUpload\Domain\Model\Nofile;
use Derhansen\ExtbaseUpload\Domain\Repository\NofileRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Attribute\IgnoreValidation;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class XClassFileUploadController extends ActionController
{
    public function __construct(protected readonly NofileRepository $nofileRepository)
    {
    }

    public function listAction(): ResponseInterface
    {
        $this->view->assignMultiple([
            'items' => $this->nofileRepository->findAll(),
        ]);

        return $this->htmlResponse();
    }

    public function newAction(): ResponseInterface
    {
        $this->view->assignMultiple([
            'item' => GeneralUtility::makeInstance(Nofile::class),
        ]);

        return $this->htmlResponse();
    }

    public function createAction(Nofile $item): ResponseInterface
    {
        $item->setPid((int)($this->settings['noFileUploadPid'] ?? 0));
        $this->nofileRepository->add($item);

        return $this->redirect('list');
    }

    public function showAction(Nofile $item): ResponseInterface
    {
        $this->view->assignMultiple([
            'item' => $item,
        ]);

        return $this->htmlResponse();
    }

    #[IgnoreValidation(['value' => 'item'])]
    public function editAction(Nofile $item): ResponseInterface
    {
        $this->view->assignMultiple([
            'item' => $item,
        ]);

        return $this->htmlResponse();
    }

    public function updateAction(Nofile $item): ResponseInterface
    {
        $this->nofileRepository->update($item);

        return $this->redirect('list');
    }
}
