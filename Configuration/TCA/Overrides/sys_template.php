<?php

defined('TYPO3') or die();

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

ExtensionManagementUtility::addStaticFile(
    'extbase_upload',
    'Configuration/TypoScript',
    'Extbase Upload development extension'
);
