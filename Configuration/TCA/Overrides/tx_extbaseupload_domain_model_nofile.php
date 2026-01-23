<?php
defined('TYPO3') or die();

$fields = [
    'file' => [
        'exclude' => true,
        'label' => 'Single file',
        'config' => [
            'type' => 'file',
            'maxitems' => 1,
            'allowed' => 'common-image-types',
        ],
    ],
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tx_extbaseupload_domain_model_nofile', $fields);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'tx_extbaseupload_domain_model_nofile',
    'file',
    '',
    'after:title'
);
