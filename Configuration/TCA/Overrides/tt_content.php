<?php

defined('TYPO3') or die();

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

ExtensionUtility::registerPlugin(
    'extbase_upload',
    'Pi1',
    'Upload plugin for single file'
);

ExtensionUtility::registerPlugin(
    'extbase_upload',
    'Pi2',
    'Upload plugin for single file with DTO'
);

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['extbaseupload_pi1'] = 'layout,recursive,pages';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['extbaseupload_pi2'] = 'layout,recursive,pages';
