<?php
namespace deflou\interfaces\triggers;

use deflou\interfaces\applications\activities\IActivity;
use deflou\interfaces\applications\anchors\IAnchor;

/**
 * Interface ITriggerEvent
 *
 * @package deflou\interfaces\triggers
 * @author jeyroik@gmail.com
 */
interface ITriggerEvent
{
    /**
     * @param IActivity $event
     * @param IAnchor $anchor
     * @return IActivity
     */
    public function __invoke(IActivity $event, IAnchor $anchor): IActivity;
}
