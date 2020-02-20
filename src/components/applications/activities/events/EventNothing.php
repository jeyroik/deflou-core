<?php
namespace deflou\components\applications\activities\events;

use deflou\interfaces\applications\activities\IActivity;
use extas\components\samples\parameters\SampleParameter;

/**
 * Class EventNothing
 *
 * @package deflou\components\applications\activities\events
 * @author jeyroik@gmail.com
 */
class EventNothing extends Event
{
    /**
     * @param IActivity $event
     */
    public function __invoke(IActivity &$event)
    {
        $event->addParameters([
            'current_date' => new SampleParameter([
                SampleParameter::FIELD__NAME => 'current_date',
                SampleParameter::FIELD__VALUE => time()
            ])
        ]);
    }
}
