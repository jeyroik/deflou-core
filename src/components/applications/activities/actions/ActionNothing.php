<?php
namespace deflou\components\applications\activities\actions;

use deflou\interfaces\applications\activities\IActivity;
use deflou\interfaces\triggers\ITrigger;

/**
 * Class ActionNothing
 *
 * @package deflou\components\applications\activities\actions
 * @author jeyroik@gmail.com
 */
class ActionNothing extends Action
{
    /**
     * @param ITrigger $trigger
     * @param IActivity $event
     * @param array $responseData
     */
    public function __invoke(ITrigger $trigger, IActivity $event, array &$responseData)
    {
        $responseData[$trigger->getName()] = [
            'status' => 200,
            'body' => 'Nothing done'
        ];
    }
}
