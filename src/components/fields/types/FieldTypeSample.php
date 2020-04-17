<?php
namespace deflou\components\fields\types;

use deflou\interfaces\fields\types\IFieldTypeSample;
use extas\components\players\THasPlayer;
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
    use THasPlayer;
    use THasClass;
}
