<?php
namespace deflou\components\fields;

use deflou\components\fields\types\FieldTypeSample;
use deflou\interfaces\fields\types\IFieldType;
use extas\components\samples\THasSample;

/**
 * Class FieldType
 * 
 * @package deflou\components\fields
 * @author jeyroik@gmail.com
 */
class FieldType extends FieldTypeSample implements IFieldType
{
    use THasSample;

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return 'deflou.field.type';
    }
}
