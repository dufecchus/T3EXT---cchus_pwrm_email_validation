<?php
namespace CIUSSSECHUS\CchusPwrmEmailValidation\Signals;

/**
 * @desc Fired before the Powermail form view is rendered. Fields mark as validation twice will be duplicated.
 * @author Daniel Lapointe
 */

use In2code\Powermail\Controller\FormController;
use In2code\Powermail\Domain\Model\Field;
use In2code\Powermail\Domain\Model\Page;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use In2code\Powermail\Domain\Model\Form;

/**
 * Signal received before the view is rendered. So we simulate an additional field that is append to the fields of the forms.
 * Some may call it a hack, others may call it weird, or something else. But this still the easiest way to achieve the needs.
 * And still it's flexible, aka not applicable only for email fields.
 * @author Daniel Lapointe
 */

class BeforeRenderView {
    
    /**
     * Entry point of the signal emitted in BeforeRenderView of the FormController of Powermail.
     * Will add a confirmation field right next to fields marked as validation twice.
     * 
     * @param QueryResultInterface $forms
     * @param FormController $formController
     * @return void
     */
    public function addValidationFields(Form $form, FormController $formController) {
        $pages = $form->getPages();
        $pages->rewind();
        while ($pages->valid()) {
            $fields = $pages->current()->getFields();
            $fields->rewind();
            while ($fields->valid()) {
                $field = $fields->current();
               
           
                if ($this->isMustValidateTwice($field)) 
                {
                    $this->duplicateField($pages->current(), $field);
                }
                $fields->next();
            }
            $pages->next();
        }
    }
    
    /**
     * Is the field must be validated?
     * 
     * @param \CIUSSSECHUS\CchusPwrmEmailValidation\Domain\Model\Field $field Field
     * @return boolean Must be validated or not
     */
    protected function isMustValidateTwice(Field $field) {

        // $field can be of any type.
        if ($field instanceof \CIUSSSECHUS\CchusPwrmEmailValidation\Domain\Model\Field) {

            return $field->isValidateTwice() && ($field->getType() == 'input' || $field->getType() == 'textarea');
        }
        return false;
    }
    
    /**
     * Duplicate the field in the current page
     * 
     * @param \In2code\Powermail\Domain\Model\Page $page Current page
     * @param \CIUSSSECHUS\CchusPwrmEmailValidation\Domain\Model\Field $field Field to duplicate
     * @return void
     */
    protected function duplicateField(Page $page, Field $field) {
        // Will detach all fields next to the one to duplicate and keep 'em in memory
        $subsequentObjects = $this->detachSubsequentFields($page);
        
        // Clone the field and assign some unique values
        $newField = clone $field;
        $newField->setTitle($field->getValidateTwiceLabel());
        $newField->setUid(0);
        $newField->setMarker($field->getMarker().'___cchus_pwrm_email_validation');
        $newField->setPlaceholder($field->getValidatePlaceholder());
        $newField->setValidation(200); // 200 is the validation code associated with the error message. Used in JavaScript.
        $newField->setValidationConfiguration($field->getValidateTwiceError());
        
        // Set the value from its parent. It'll be a real duplicated field.
        $newField->setPrefillValue($this->getValue($field));

        // Add the new field to the page
        $page->addField($newField);
        
        // Add all fields that were detach before
        $page->getFields()->addAll($subsequentObjects);
    }
    
    /**
     * Remove all fields next to the current one in position and return them in an ObjectStorage so method addAll can be easily used.
     * 
     * @param \In2code\Powermail\Domain\Model\Page $page Current page
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<Field> ObjectStorage of fields detach
     */
    protected function detachSubsequentFields(Page $page) {
        $objects = new ObjectStorage();
        if ($page->getFields() && $page->getFields()->valid()) {
            $page->getFields()->next();
            while ($page->getFields()->valid()) {
                $objects->attach($page->getFields()->current());
                $page->getFields()->detach($page->getFields()->current());
                // $page->getFields()->next isn't called because the cursor is moved automatically when detached
            }
        }
        return $objects;
    }
    
    protected function getValue(Field $field) {
        $value = $field->getPrefillValue();
        $gp = GeneralUtility::_GP('tx_powermail_pi1');
        if ($gp && array_key_exists('field', $gp) && array_key_exists($field->getMarker(), $gp['field'])) {
            $value = $gp['field'][$field->getMarker()];
        }
        return $value;
    }
    
}