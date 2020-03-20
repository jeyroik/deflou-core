<?php
namespace deflou\components\applications\activities\actions;

use deflou\components\triggers\TriggerResponse;
use deflou\interfaces\applications\activities\IActivity;
use deflou\interfaces\triggers\ITrigger;
use deflou\interfaces\triggers\ITriggerResponse;

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
     * @return ITriggerResponse
     */
    public function __invoke(ITrigger $trigger, IActivity $event): ITriggerResponse
    {
        return new TriggerResponse([
            ITriggerResponse::FIELD__STATUS => ITriggerResponse::STATUS__OK,
            ITriggerResponse::FIELD__BODY => 'Nothing done'
        ]);
    }
}
