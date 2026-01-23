<?php

defined('TYPO3') or die();

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

ExtensionUtility::registerPlugin(
    'extbase_upload',
    'Pi1',
    'Upload plugin for single file property in a domain object'
);

ExtensionUtility::registerPlugin(
    'extbase_upload',
    'Pi2',
    'Upload plugin for single file with DTO'
);

ExtensionUtility::registerPlugin(
    'extbase_upload',
    'Pi3',
    'Upload plugin for multi file with DTO'
);
ExtensionUtility::registerPlugin(
    'extbase_upload',
    'Pi4',
    'Upload plugin for multifile uploaf file property in a domain object'
);
ExtensionUtility::registerPlugin(
    'extbase_upload',
    'Pi5',
    'Upload plugin for multiple file properties in a domain object'
);
ExtensionUtility::registerPlugin(
    'extbase_upload',
    'Pi6',
    'Upload plugin for xclassed single file upload'
);
