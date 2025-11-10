<?php

declare(strict_types=1);

namespace Derhansen\ExtbaseUpload\Controller;

use Derhansen\ExtbaseUpload\Domain\Model\Multifile;
use Derhansen\ExtbaseUpload\Domain\Repository\MultifileRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Attribute\IgnoreValidation;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class MultiFileUploadController extends ActionController
{
    public function __construct(protected readonly MultifileRepository $multifileRepository)
    {
    }

    public function listAction(): ResponseInterface
    {
        $this->view->assignMultiple([
            'items' => $this->multifileRepository->findAll(),
        ]);

        return $this->htmlResponse();
    }

    public function newAction(): ResponseInterface
    {
        $this->view->assignMultiple([
            'item' => GeneralUtility::makeInstance(Multifile::class),
        ]);

        return $this->htmlResponse();
    }

    public function createAction(Multifile $item): ResponseInterface
    {
        $item->setPid((int)($this->settings['multiFileUploadPid'] ?? 0));
        $this->multifileRepository->add($item);

        return $this->redirect('list');
    }

    public function showAction(Multifile $item): ResponseInterface
    {
        $this->view->assignMultiple([
            'item' => $item,
        ]);

        return $this->htmlResponse();
    }

    #[IgnoreValidation(['value' => 'item'])]
    public function editAction(Multifile $item): ResponseInterface
    {
        $this->view->assignMultiple([
            'item' => $item,
        ]);

        return $this->htmlResponse();
    }

    public function updateAction(Multifile $item): ResponseInterface
    {
        $this->multifileRepository->update($item);

        return $this->redirect('list');
    }
}
