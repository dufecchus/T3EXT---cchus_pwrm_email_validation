<?php
defined('TYPO3') || die();

$signalSlotDispatcher = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\SignalSlot\Dispatcher::class);
$signalSlotDispatcher->connect(
    \In2code\Powermail\Controller\FormController::class,
    'formActionBeforeRenderView',
    \CIUSSSECHUS\CchusPwrmEmailValidation\Signals\BeforeRenderView::class,
    'addValidationFields'
);


$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][\In2code\Powermail\Domain\Model\Field::class] = [
    'className' => \CIUSSSECHUS\CchusPwrmEmailValidation\Domain\Model\Field::class,
];

$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][\In2code\Powermail\Domain\Model\Answer::class] = [
    'className' => \CIUSSSECHUS\CchusPwrmEmailValidation\Domain\Model\Answer::class,
];
$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][\In2code\Powermail\Domain\Model\Form::class] = [
    'className' => \CIUSSSECHUS\CchusPwrmEmailValidation\Domain\Model\Form::class,
];

$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][\In2code\Powermail\Domain\Model\Page::class] = [
    'className' => \CIUSSSECHUS\CchusPwrmEmailValidation\Domain\Model\Page::class,
];

$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][\In2code\Powermail\Domain\Repository\AnswerRepository::class] = [
    'className' => \CIUSSSECHUS\CchusPwrmEmailValidation\Domain\Repository\AnswerRepository::class,
];

$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][\In2code\Powermail\Domain\Repository\FieldRepository::class] = [
    'className' => \CIUSSSECHUS\CchusPwrmEmailValidation\Domain\Repository\FieldRepository::class,
];
$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][\In2code\Powermail\Domain\Repository\FormRepository::class] = [
    'className' => \CIUSSSECHUS\CchusPwrmEmailValidation\Domain\Repository\FormRepository::class,
];


$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][\In2code\Powermail\Domain\Repository\PageRepository::class] = [
    'className' => \CIUSSSECHUS\CchusPwrmEmailValidation\Domain\Repository\PageRepository::class,
];

/*
// Register extended registration class (TYPO3 9.5 - 11.5 only, not required for TYPO3 12)
\TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Object\Container\Container::class)
    ->registerImplementation(
        \In2code\Powermail\Domain\Model\Field::class,
        \CIUSSSECHUS\CchusPwrmEmailValidation\Domain\Model\Field::class
    );

// Register extended registration class (TYPO3 9.5 - 11.5 only, not required for TYPO3 12)
\TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Object\Container\Container::class)
->registerImplementation(
    \In2code\Powermail\Domain\Model\Answer::class,
    \CIUSSSECHUS\CchusPwrmEmailValidation\Domain\Model\Answer::class
);
*/