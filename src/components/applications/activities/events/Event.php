<?php
namespace deflou\components\applications\activities\events;

use deflou\interfaces\applications\activities\IActivity;
use extas\components\Item;

/**
 * Class Event
 *
 * @package deflou\components\applications\activities\events
 * @author jeyroik@gmail.com
 */
abstract class Event extends Item
{
    /**
     * @param IActivity $event
     * @return void
     */
    abstract public function __invoke(IActivity &$event);

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return 'deflou.event';
    }
}
