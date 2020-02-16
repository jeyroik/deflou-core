<?php
namespace deflou\components\fields;

use deflou\interfaces\fields\IField;
use extas\components\samples\THasSample;

/**
 * Class Field
 *
 * @package deflou\components\fields
 * @author jeyroik@gmail.com
 */
class Field extends FieldSample implements IField
{
    use THasSample;

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return 'deflou.field';
    }
}
