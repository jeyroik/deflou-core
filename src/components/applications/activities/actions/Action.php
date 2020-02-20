<?php
namespace deflou\components\applications\activities\actions;

use deflou\interfaces\applications\activities\IActivity;
use deflou\interfaces\triggers\ITrigger;
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
     * @param array $responseData
     * @return void
     */
    abstract public function __invoke(ITrigger $trigger, IActivity $event, array &$responseData);

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return 'deflou.action';
    }
}
