<?php
namespace deflou\components\triggers;

use deflou\interfaces\triggers\ITriggerResponse;
use extas\components\Item;

/**
 * Class TriggerResponse
 *
 * @package deflou\components\triggers
 * @author jeyroik <jeyroik@gmail.com>
 */
class TriggerResponse extends Item implements ITriggerResponse
{
    use THasTriggerResponse;

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
