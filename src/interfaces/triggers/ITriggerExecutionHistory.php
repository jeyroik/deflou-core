<?php
namespace deflou\interfaces\triggers;

use deflou\interfaces\applications\activities\IHasAction;
use deflou\interfaces\applications\activities\IHasEvent;
use deflou\interfaces\applications\anchors\IHasAnchor;
use extas\interfaces\IHasCreatedAt;
use extas\interfaces\IHasId;
use extas\interfaces\IItem;

/**
 * Interface ITriggerExecutionHistory
 *
 * @package deflou\interfaces\triggers
 * @author jeyroik <jeyroik@gmail.com>
 */
interface ITriggerExecutionHistory extends
    IItem,
    IHasId,
    IHasCreatedAt,
    IHasTrigger,
    IHasAnchor,
    IHasEvent,
    IHasAction,
    IHasTriggerResponse
{
    public const SUBJECT = 'deflou.trigger.execution.history';
}
