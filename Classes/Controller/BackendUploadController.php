<?php

declare(strict_types=1);

namespace Derhansen\ExtbaseUpload\Controller;

use Derhansen\ExtbaseUpload\Domain\Model\Singlefile;
use Derhansen\ExtbaseUpload\Domain\Repository\SinglefileRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Backend\Template\ModuleTemplate;
use TYPO3\CMS\Backend\Template\ModuleTemplateFactory;
use TYPO3\CMS\Extbase\Annotation\IgnoreValidation;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

class BackendUploadController extends ActionController
{
    protected ModuleTemplate $moduleTemplate;

    public function __construct(
        protected readonly SinglefileRepository $singlefileRepository,
        protected readonly ModuleTemplateFactory $moduleTemplateFactory,
    ) {
    }

    public function initializeAction(): void
    {
        $this->moduleTemplate = $this->moduleTemplateFactory->create($this->request);
        $this->moduleTemplate->setTitle(LocalizationUtility::translate('LLL:EXT:extbase_upload/Resources/Private/Language/Module/locallang_mod.xlf:mlang_tabs_tab'));
        $this->moduleTemplate->setFlashMessageQueue($this->getFlashMessageQueue());
    }

    public function listAction(): ResponseInterface
    {
        $this->moduleTemplate->assignMultiple([
            'items' => $this->singlefileRepository->findAllNotInline(),
        ]);

        return $this->moduleTemplate->renderResponse('BackendUpload/List');
    }

    public function newAction(): ResponseInterface
    {
        $this->moduleTemplate->assignMultiple([
            'item' => GeneralUtility::makeInstance(Singlefile::class),
        ]);

        return $this->moduleTemplate->renderResponse('BackendUpload/New');
    }

    public function createAction(Singlefile $item): ResponseInterface
    {
        $item->setPid((int)($this->settings['singleFileUploadPid'] ?? 0));
        $this->singlefileRepository->add($item);

        return $this->redirect('list');
    }

    public function showAction(Singlefile $item): ResponseInterface
    {
        $this->moduleTemplate->assignMultiple([
            'item' => $item,
        ]);

        return $this->moduleTemplate->renderResponse('BackendUpload/Show');
    }

    /**
     * @IgnoreValidation("item")
     */
    public function editAction(Singlefile $item): ResponseInterface
    {
        $this->moduleTemplate->assignMultiple([
            'item' => $item,
        ]);

        return $this->moduleTemplate->renderResponse('BackendUpload/Edit');
    }

    public function updateAction(Singlefile $item): ResponseInterface
    {
        $this->singlefileRepository->update($item);

        return $this->redirect('list');
    }

    /**
     * Suppress default validation messages
     */
    protected function getErrorFlashMessage(): bool
    {
        return false;
    }
}
