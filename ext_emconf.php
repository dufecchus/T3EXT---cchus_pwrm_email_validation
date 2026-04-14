<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'CchusPwrmEmailValidation',
    'description' => '',
    'category' => 'misc',
    'author' => 'Félix Dumas-Lavoie',
    'author_email' => 'webmestre.tcr05@ssss.gouv.qc.ca',
    'state' => 'alpha',
    'clearCacheOnLoad' => 0,
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.0-11.5.99',
            'powermail' => '10.9.1-10.9.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];

