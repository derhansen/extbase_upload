<?php

declare(strict_types=1);

namespace Derhansen\ExtbaseUpload\Controller;

use Derhansen\ExtbaseUpload\Domain\Model\Inlinetest;
use Derhansen\ExtbaseUpload\Domain\Repository\InlinetestRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Annotation\IgnoreValidation;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class InlineTestUploadController extends ActionController
{
    public function __construct(protected readonly InlinetestRepository $inlinetestRepository)
    {
    }

    public function listAction(): ResponseInterface
    {
        $this->view->assignMultiple([
            'items' => $this->inlinetestRepository->findAll(),
        ]);

        return $this->htmlResponse();
    }

    public function newAction(): ResponseInterface
    {
        $this->view->assignMultiple([
            'item' => GeneralUtility::makeInstance(Inlinetest::class),
        ]);

        return $this->htmlResponse();
    }

    public function createAction(Inlinetest $item): ResponseInterface
    {
        $item->setPid((int)($this->settings['inlineTestUploadPid'] ?? 0));
        $this->inlinetestRepository->add($item);

        return $this->redirect('list');
    }

    public function showAction(Inlinetest $item): ResponseInterface
    {
        $this->view->assignMultiple([
            'item' => $item,
        ]);

        return $this->htmlResponse();
    }

    /**
     * @IgnoreValidation("item")
     */
    public function editAction(Inlinetest $item): ResponseInterface
    {
        $this->view->assignMultiple([
            'item' => $item,
        ]);

        return $this->htmlResponse();
    }

    public function updateAction(Inlinetest $item): ResponseInterface
    {
        $this->inlinetestRepository->update($item);

        return $this->redirect('list');
    }
}
