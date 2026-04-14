<?php
namespace CIUSSSECHUS\CchusPwrmEmailValidation\Domain\Model;

//use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class Page extends \In2code\Powermail\Domain\Model\Page {
    
    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CIUSSSECHUS\CchusPwrmEmailValidation\Domain\Model\Field>
     */
    protected $fields = null;

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    /*
    public function getFields(): ObjectStorage
    {
        return $this->fields;
    }
    */
}