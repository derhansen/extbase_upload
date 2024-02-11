<?php

defined('TYPO3') or die();

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

ExtensionUtility::registerPlugin(
    'extbase_upload',
    'Pi1',
    'Upload plugin for single file'
);

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['typo3dev_pi1'] = 'layout,recursive,pages';
