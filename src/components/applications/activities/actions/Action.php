<?php
namespace deflou\components\applications\activities\actions;

use deflou\interfaces\applications\activities\IActivity;
use deflou\interfaces\triggers\ITrigger;
use deflou\interfaces\triggers\ITriggerResponse;
use extas\components\Item;

/**
 * Class Action
 *
 * @package deflou\components\applications\activities\actions
 * @author jeyroik@gmail.com
 */
abstract class Action extends Item
{
    /**
     * @param ITrigger $trigger
     * @param IActivity $event
     * @return ITriggerResponse
     */
    abstract public function __invoke(ITrigger $trigger, IActivity $event): ITriggerResponse;

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return 'deflou.action';
    }
}
