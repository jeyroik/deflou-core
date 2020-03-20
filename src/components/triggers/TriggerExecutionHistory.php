<?php
namespace deflou\components\triggers;

use deflou\components\applications\activities\THasAction;
use deflou\components\applications\activities\THasEvent;
use deflou\components\applications\anchors\THasAnchor;
use deflou\interfaces\triggers\ITriggerExecutionHistory;
use extas\components\Item;
use extas\components\THasCreatedAt;
use extas\components\THasId;

/**
 * Class TriggerExecutionHistory
 *
 * @package deflou\components\triggers
 * @author jeyroik <jeyroik@gmail.com>
 */
class TriggerExecutionHistory extends Item implements ITriggerExecutionHistory
{
    use THasId;
    use THasTrigger;
    use THasEvent;
    use THasAction;
    use THasAnchor;
    use THasCreatedAt;
    use THasTriggerResponse;

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
