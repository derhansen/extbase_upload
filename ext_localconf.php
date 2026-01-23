<?php

defined('TYPO3') or die();

use Derhansen\ExtbaseUpload\Controller\MultiFileDtoUploadController;
use Derhansen\ExtbaseUpload\Controller\MultiFileUploadController;
use Derhansen\ExtbaseUpload\Controller\MultipleFilesUploadController;
use Derhansen\ExtbaseUpload\Controller\SingleFileDtoUploadController;
use Derhansen\ExtbaseUpload\Controller\SingleFileUploadController;
use Derhansen\ExtbaseUpload\Controller\XClassFileUploadController;
use Derhansen\ExtbaseUpload\Domain\Model\Nofile;
use Derhansen\ExtbaseUpload\Domain\Model\XClassNofile;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
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

ExtensionUtility::configurePlugin(
    'extbase_upload',
    'Pi6',
    [
        XClassFileUploadController::class => 'list,new,create,show,edit,update',
    ],
    // non-cacheable actions
    [
        XClassFileUploadController::class => 'list,new,create,show,edit,update',
    ],
    ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
);

ExtensionManagementUtility::addTypoScript(
    'extbase_upload',
    'setup',
    "@import 'EXT:extbase_upload/Configuration/TypoScript/setup.typoscript'"
);

// xclass nofile domain model
$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][Nofile::class] = [
    'className' => XClassNofile::class
];
