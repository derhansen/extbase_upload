<?php

use Derhansen\ExtbaseUpload\Controller\BackendUploadController;

return [
    'web_extbasefileupload' => [
        'parent' => 'web',
        'position' => ['after' => 'web_info'],
        'access' => 'user',
        'workspaces' => 'live',
        'path' => '/module/development/extbase-fileupload',
        'iconIdentifier' => 'module-about',
        'labels' => 'LLL:EXT:extbase_upload/Resources/Private/Language/Module/locallang_mod.xlf',
        'extensionName' => 'ExtbaseUpload',
        'controllerActions' => [
            BackendUploadController::class => [
                'list', 'new', 'create', 'show', 'edit', 'update'
            ],
        ],
    ],
];
