<?php
namespace deflou\components\fields\types;

use deflou\interfaces\fields\types\IFieldTypeSample;
use extas\components\players\THasOwner;
use extas\components\samples\Sample;
use extas\components\THasClass;

/**
 * Class FieldTypeSample
 * 
 * @package deflou\components\fields\types
 * @author jeyroik@gmail.com
 */
class FieldTypeSample extends Sample implements IFieldTypeSample
{
    use THasOwner;
    use THasClass;
}
