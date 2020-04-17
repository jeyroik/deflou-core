<?php
namespace deflou\interfaces\triggers;

use deflou\interfaces\applications\activities\IActivity;
use deflou\interfaces\applications\anchors\IAnchor;

/**
 * Interface ITriggerAction
 *
 * @package deflou\interfaces\triggers
 * @author jeyroik@gmail.com
 */
interface ITriggerAction
{
    public const SUBJECT = 'deflou.trigger.action';

    /**
     * @param IActivity $action
     * @param IActivity $event
     * @param ITrigger $trigger
     * @param IAnchor $anchor
     * @return ITriggerResponse
     */
    public function __invoke(IActivity $action, IActivity $event, ITrigger $trigger, IAnchor $anchor): ITriggerResponse;
}
