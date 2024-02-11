<?php

use Derhansen\ExtbaseUpload\Controller\UploadController;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

ExtensionUtility::configurePlugin(
    'extbase_upload',
    'Pi1',
    [
        UploadController::class => 'list,new,create,show,edit,update',
    ],
    // non-cacheable actions
    [
        UploadController::class => 'list,new,create,show,edit,update',
    ]
);
