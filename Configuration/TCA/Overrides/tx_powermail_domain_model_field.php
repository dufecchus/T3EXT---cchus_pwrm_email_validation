<?php
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

ExtensionManagementUtility::addTCAcolumns('tx_powermail_domain_model_field',
    array(
        'validate_twice' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:cchus_pwrm_email_validation/Resources/Private/Language/locallang_db.xlf:tx_powermail_domain_model_field.validate_twice',
            'config' => array(
                'type' => 'check',
            )
        ),
        'validate_twice_label' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:cchus_pwrm_email_validation/Resources/Private/Language/locallang_db.xlf:tx_powermail_domain_model_field.validate_twice_label',
            'config' => array(
                'type' => 'input',
                'size' => 20,
                'eval' => 'trim'
            )
        ),
        'validate_placeholder' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:cchus_pwrm_email_validation/Resources/Private/Language/locallang_db.xlf:tx_powermail_domain_model_field.validate_placeholder',
            'config' => array(
                'type' => 'input',
                'size' => 20,
                'eval' => 'trim'
            )
        ),
        'validate_twice_error' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:cchus_pwrm_email_validation/Resources/Private/Language/locallang_db.xlf:tx_powermail_domain_model_field.validate_twice_error',
            'config' => array(
                'type' => 'input',
                'size' => 20,
                'eval' => 'trim'
            )
        )
    )
);

ExtensionManagementUtility::addToAllTCAtypes(
    'tx_powermail_domain_model_field',
    'validate_twice, validate_twice_label, validate_placeholder, validate_twice_error',
    '0, input, textarea',
    'after:validation'
);

ExtensionManagementUtility::addFieldsToPalette(
    'tx_powermail_domain_model_field',
    '2',
    '--linebreak--, validate_twice, --linebreak--, validate_twice_label, validate_placeholder, validate_twice_error',
    'after:validation'
);