<?php
namespace deflou\interfaces\fields;

use deflou\interfaces\fields\types\IFieldType;
use extas\interfaces\IHasType;
use extas\interfaces\players\IHasOwner;
use extas\interfaces\samples\ISample;

/**
 * Interface IFieldSample
 *
 * @package deflou\interfaces\fields
 * @author jeyroik@gmail.com
 */
interface IFieldSample extends ISample, IHasOwner, IHasType
{
    /**
     * @return IFieldType|null
     */
    public function getTypeObject(): ?IFieldType;
}
