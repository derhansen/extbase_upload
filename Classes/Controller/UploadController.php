<?php

declare(strict_types=1);

namespace Derhansen\ExtbaseUpload\Controller;

use Derhansen\ExtbaseUpload\Domain\Model\Singlefile;
use Derhansen\ExtbaseUpload\Domain\Repository\SinglefileRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Annotation\IgnoreValidation;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class UploadController extends ActionController
{
    public function __construct(protected readonly SinglefileRepository $singlefileRepository)
    {
    }

    public function listAction(): ResponseInterface
    {
        $this->view->assignMultiple([
            'singlefiles' => $this->singlefileRepository->findAll(),
        ]);

        return $this->htmlResponse();
    }

    public function newAction(): ResponseInterface
    {
        $this->view->assignMultiple([
            'singlefile' => GeneralUtility::makeInstance(Singlefile::class),
        ]);

        return $this->htmlResponse();
    }

    public function createAction(Singlefile $singlefile): ResponseInterface
    {
        $singlefile->setPid(88);
        $this->singlefileRepository->add($singlefile);

        return $this->redirect('list');
    }

    public function showAction(Singlefile $singlefile): ResponseInterface
    {
        $this->view->assignMultiple([
            'singlefile' => $singlefile,
        ]);

        return $this->htmlResponse();
    }

    /**
     * @IgnoreValidation("singlefile")
     */
    public function editAction(Singlefile $singlefile): ResponseInterface
    {
        $this->view->assignMultiple([
            'singlefile' => $singlefile,
        ]);

        return $this->htmlResponse();
    }

    public function updateAction(Singlefile $singlefile): ResponseInterface
    {
        $this->singlefileRepository->update($singlefile);

        return $this->redirect('list');
    }
}
