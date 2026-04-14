<?php

declare(strict_types=1);


 
return [
    \In2code\Powermail\Domain\Model\Field::class => [
        'subclasses' => [
            1 => \CIUSSSECHUS\CchusPwrmEmailValidation\Domain\Model\Field::class,
        ],
    ],
    \In2code\Powermail\Domain\Model\Answer::class => [
        'subclasses' => [
            1 => \CIUSSSECHUS\CchusPwrmEmailValidation\Domain\Model\Answer::class,
        ],
    ],
    \In2code\Powermail\Domain\Model\Form::class => [
        'subclasses' => [
            1 => \CIUSSSECHUS\CchusPwrmEmailValidation\Domain\Model\Form::class,
        ],
    ],
    \In2code\Powermail\Domain\Model\Page::class => [
        'subclasses' => [
            1 => \CIUSSSECHUS\CchusPwrmEmailValidation\Domain\Model\Page::class,
        ],
    ],
    \CIUSSSECHUS\CchusPwrmEmailValidation\Domain\Model\Field::class => [
        'tableName' => 'tx_powermail_domain_model_field',
        
    ],

    \CIUSSSECHUS\CchusPwrmEmailValidation\Domain\Model\Answer::class => [
        'tableName' => 'tx_powermail_domain_model_answer',
    ],
    \CIUSSSECHUS\CchusPwrmEmailValidation\Domain\Model\Form::class => [
        'tableName' => 'tx_powermail_domain_model_form',
    ],
    \CIUSSSECHUS\CchusPwrmEmailValidation\Domain\Model\Page::class => [
        'tableName' => 'tx_powermail_domain_model_page',
    ],
];
 