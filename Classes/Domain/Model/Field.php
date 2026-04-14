<?php
namespace CIUSSSECHUS\CchusPwrmEmailValidation\Domain\Model;

/**
 * New model to override the current Field model to add the new field
 * @author Daniel Lapointe
 */

class Field extends \In2code\Powermail\Domain\Model\Field {
    
    /**
     * validateTwice
     * 
     * @var boolean
     */
    protected $validateTwice = false;
    
    /**
     * validateTwiceLabel
     * 
     * @var string
     */
    protected $validateTwiceLabel;
    
    /**
     * validateTwiceError
     * 
     * @var string
     */
    protected $validateTwiceError;
    
    /**
     * validatePlaceholder
     * 
     * @var string
     */
    protected $validatePlaceholder;
    
    /**
     * Sets the uid
     *
     * @param int $uid
     * @return void
     */
    public function setUid($uid) {
        $this->uid = $uid;
    }
    
    /**
     * Returns the validateTwice
     * 
     * @return boolean
     */
    public function isValidateTwice()
    {
        return $this->validateTwice;
    }

    /**
     * Sets the validateTwice
     * 
     * @param boolean $validateTwice
     * @return void
     */
    public function setValidateTwice($validateTwice)
    {
        $this->validateTwice = $validateTwice;
    }
    
    /**
     * Returns the validateTwiceLabel
     * 
     * @return string
     */
    public function getValidateTwiceLabel()
    {
        return $this->validateTwiceLabel;
    }
    
    /**
     * Sets the validateTwiceLabel
     * 
     * @param string $validateTwiceLabel
     * @return void
     */
    public function setValidateTwiceLabel($validateTwiceLabel)
    {
        $this->validateTwiceLabel = $validateTwiceLabel;
    }

    /**
     * Returns the validateTwiceError
     * 
     * @return string
     */
    public function getValidateTwiceError()
    {
        return $this->validateTwiceError;
    }

    /**
     * Sets the validateTwiceError
     * 
     * @param string $validateTwiceError
     * @return void
     */
    public function setValidateTwiceError($validateTwiceError)
    {
        $this->validateTwiceError = $validateTwiceError;
    }
    
    /**
     * Returns the validatePlaceholder
     * 
     * @return string
     */
    public function getValidatePlaceholder()
    {
        return $this->validatePlaceholder;
    }

    /**
     * Sets the validatePlaceholder
     * 
     * @param string $validatePlaceholder
     * @return void
     */
    public function setValidatePlaceholder($validatePlaceholder)
    {
        $this->validatePlaceholder = $validatePlaceholder;
    }
    
}