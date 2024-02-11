<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Extbase Upload development extension',
    'description' => 'TYPO3 Extbase Upload extension for testing purposes only',
    'category' => 'plugin',
    'author' => 'Torben Hansen',
    'author_email' => 'derhansen@gmail.com',
    'state' => 'alpha',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'version' => '0.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '13.0.0-13.5.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
