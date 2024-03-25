<?php

defined('TYPO3') or die();

use Derhansen\ExtbaseUpload\Controller\MultiFileDtoUploadController;
use Derhansen\ExtbaseUpload\Controller\MultiFileUploadController;
use Derhansen\ExtbaseUpload\Controller\MultipleFilesUploadController;
use Derhansen\ExtbaseUpload\Controller\SingleFileDtoUploadController;
use Derhansen\ExtbaseUpload\Controller\SingleFileUploadController;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

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

ExtensionUtility::configurePlugin(
    'extbase_upload',
    'Pi3',
    [
        MultiFileDtoUploadController::class => 'index,new,create',
    ],
    // non-cacheable actions
    [
        MultiFileDtoUploadController::class => 'index,new,create',
    ],
    ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
);

ExtensionUtility::configurePlugin(
    'extbase_upload',
    'Pi4',
    [
        MultiFileUploadController::class => 'list,new,create,show,edit,update',
    ],
    // non-cacheable actions
    [
        MultiFileUploadController::class => 'list,new,create,show,edit,update',
    ],
    ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
);

ExtensionUtility::configurePlugin(
    'extbase_upload',
    'Pi5',
    [
        MultipleFilesUploadController::class => 'list,new,create,show,edit,update',
    ],
    // non-cacheable actions
    [
        MultipleFilesUploadController::class => 'list,new,create,show,edit,update',
    ],
    ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
);
