<?php
namespace deflou\components\fields;

use deflou\interfaces\fields\IFieldSample;
use deflou\interfaces\fields\types\IFieldType;
use deflou\interfaces\fields\types\IFieldTypeRepository;
use extas\components\players\THasPlayer;
use extas\components\samples\Sample;
use extas\components\SystemContainer;
use extas\components\THasType;

/**
 * Class FieldSample
 * 
 * @package deflou\components\fields
 * @author jeyroik@gmail.com
 */
class FieldSample extends Sample implements IFieldSample
{
    use THasPlayer;
    use THasType;

    /**
     * @return IFieldType|null
     */
    public function getTypeObject(): ?IFieldType
    {
        /**
         * @var $repo IFieldTypeRepository
         */
        $repo = SystemContainer::getItem(IFieldTypeRepository::class);
        
        return $repo->one([IFieldType::FIELD__NAME => $this->getType()]);
    }
}
