<?php

declare(strict_types=1);

namespace Derhansen\ExtbaseUpload\Controller;

use Derhansen\ExtbaseUpload\Domain\Model\Multiplefiles;
use Derhansen\ExtbaseUpload\Domain\Repository\MultipleFilesRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Annotation\IgnoreValidation;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class MultipleFilesUploadController extends ActionController
{
    public function __construct(protected readonly MultipleFilesRepository $multipleFilesRepository)
    {
    }

    public function listAction(): ResponseInterface
    {
        $this->view->assignMultiple([
            'items' => $this->multipleFilesRepository->findAll(),
        ]);

        return $this->htmlResponse();
    }

    public function newAction(): ResponseInterface
    {
        $this->view->assignMultiple([
            'item' => GeneralUtility::makeInstance(Multiplefiles::class),
        ]);

        return $this->htmlResponse();
    }

    public function createAction(Multiplefiles $item): ResponseInterface
    {
        $item->setPid(93);
        $this->multipleFilesRepository->add($item);

        return $this->redirect('list');
    }

    public function showAction(Multiplefiles $item): ResponseInterface
    {
        $this->view->assignMultiple([
            'item' => $item,
        ]);

        return $this->htmlResponse();
    }

    /**
     * @IgnoreValidation("item")
     */
    public function editAction(Multiplefiles $item): ResponseInterface
    {
        $this->view->assignMultiple([
            'item' => $item,
        ]);

        return $this->htmlResponse();
    }

    public function updateAction(Multiplefiles $item): ResponseInterface
    {
        $this->multipleFilesRepository->update($item);

        return $this->redirect('list');
    }
}
