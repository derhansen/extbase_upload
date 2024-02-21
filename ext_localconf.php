<?php

use Derhansen\ExtbaseUpload\Controller\SingleFileDtoUploadController;
use Derhansen\ExtbaseUpload\Controller\SingleFileUploadController;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

ExtensionUtility::configurePlugin(
    'extbase_upload',
    'Pi1',
    [
        SingleFileUploadController::class => 'list,new,create,show,edit,update',
    ],
    // non-cacheable actions
    [
        SingleFileUploadController::class => 'list,new,create,show,edit,update',
    ],
    ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
);

ExtensionUtility::configurePlugin(
    'extbase_upload',
    'Pi2',
    [
        SingleFileDtoUploadController::class => 'index,new,create',
    ],
    // non-cacheable actions
    [
        SingleFileDtoUploadController::class => 'index,new,create',
    ],
    ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
);
