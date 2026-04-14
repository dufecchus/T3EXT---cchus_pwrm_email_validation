<?php
namespace CIUSSSECHUS\CchusPwrmEmailValidation\Domain\Model;

/*use CIUSSSECHUS\CchusPwrmEmailValidation\Domain\Repository\FormRepository;
use In2code\Powermail\Utility\ConfigurationUtility;*/

class Form extends \In2code\Powermail\Domain\Model\Form {
    
    
    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CIUSSSECHUS\CchusPwrmEmailValidation\Domain\Model\Page>
     */
    protected $pages;

    
    /**
     * @return ObjectStorage|array
     * @throws ExtensionConfigurationExtensionNotConfiguredException
     * @throws ExtensionConfigurationPathDoesNotExistException
     */
    /*
    public function getPages()
    {
        // if elementbrowser instead of IRRE (sorting workarround)
        if (ConfigurationUtility::isReplaceIrreWithElementBrowserActive()) {
            $formRepository = GeneralUtility::makeInstance(FormRepository::class);
            $formSorting = GeneralUtility::trimExplode(',', $formRepository->getPagesValue($this->uid), true);
            $formSorting = array_flip($formSorting);
            $pageArray = [];
            foreach ($this->pages as $page) {
                $pageArray[$formSorting[$page->getUid()]] = $page;
            }
            ksort($pageArray);
            return $pageArray;
        }

        return $this->pages;
    }
    */
}