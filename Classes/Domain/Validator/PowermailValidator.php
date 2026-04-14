<?php
namespace CIUSSSECHUS\CchusPwrmEmailValidation\Domain\Validator;

use CIUSSSECHUS\CchusPwrmEmailValidation\Domain\Model\Answer;
use CIUSSSECHUS\CchusPwrmEmailValidation\Domain\Model\Field;
use In2code\Powermail\Domain\Model\Mail;
use In2code\Powermail\Domain\Validator\AbstractValidator;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Error\Error;
use TYPO3\CMS\Extbase\Error\Result;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * @desc Validate fields before next step
 * @author lapd2964
 */

class PowermailValidator extends AbstractValidator {
    
    /**
     * {@inheritDoc}
     * @see \TYPO3\CMS\Extbase\Validation\Validator\AbstractValidator::validate()
     */
    public function validate($oMail) {
        $result = new Result();
        
        if ($oMail->getAnswers() && $oMail->getAnswers() instanceof ObjectStorage && $oMail->getAnswers()->count()) {
            $oMail->getAnswers()->rewind();
            while ($oMail->getAnswers()->valid()) {
                $answer = $oMail->getAnswers()->current();
                if ($answer->getField() instanceof Field && $this->isValidateTwice($answer->getField())) {
                    if (!$this->valid($answer)) {
                        $result->addError(new Error($answer->getField()->getValidateTwiceError(), $answer->getField()->getMarker()));
                    }
                }
                $oMail->getAnswers()->next();
            }
        }
        
        return $result;
    }
    
    /**
     * Check if the field must be validated.
     * 
     * @param Field $field The field
     * @return boolean If the field must be validated
     */
    protected function isValidateTwice(Field $field) {
        return (($field->getType() == 'input' || $field->getType() == 'textarea') && $field->isValidateTwice());
    }
    
    /**
     * Check if both values are identical.
     * 
     * @param Answer $answer The answer
     * @return boolean Values are identical or not
     */
    protected function valid(Answer $answer) {
        $val = $this->getValidationFieldValue($answer->getField());
        return ($val === null || $answer->getValue() == $val);
    }
    
    /**
     * Gets the validation field value from POST.
     * 
     * @param Field $field The field
     * @return string|NULL POSTed field value, or null if it doesn't exist.
     */
    protected function getValidationFieldValue(Field $field) {
        if ($field && $field->getMarker()) {
            $postVal = GeneralUtility::_GP('tx_powermail_pi1');
            if (is_array($postVal) && count($postVal) && array_key_exists('field', $postVal) && array_key_exists($field->getMarker().'___cchus_pwrm_email_validation', $postVal['field'])) {
                return $postVal['field'][$field->getMarker().'___cchus_pwrm_email_validation'];
            }
        }
        return null;
    }
    
}