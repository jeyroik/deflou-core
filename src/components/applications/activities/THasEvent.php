<?php
namespace deflou\components\applications\activities;

use deflou\interfaces\applications\activities\IActivity;
use deflou\interfaces\applications\activities\IHasEvent;
use extas\components\exceptions\MissedOrUnknown;
use extas\interfaces\repositories\IRepository;

/**
 * Trait THasEvent
 * 
 * @property $config
 * @method IRepository deflouActivityRepository()
 * 
 * @package deflou\components\applications\activities
 * @author jeyroik@gmail.com
 */
trait THasEvent
{
    /**
     * @return string
     */
    public function getEventName(): string
    {
        return $this->config[IHasEvent::FIELD__EVENT_NAME] ?? '';
    }

    /**
     * @param bool $required if event is required and missed, than an exception is thrown
     * @return IActivity|null
     * @throws MissedOrUnknown
     */
    public function getEvent(bool $required = false): ?IActivity
    {
        $event = $this->deflouActivityRepository()->one([
            IActivity::FIELD__NAME => $this->getEventName(),
            IActivity::FIELD__TYPE => IActivity::TYPE__EVENT
        ]);

        if ($required and !$event) {
            throw new MissedOrUnknown('event ' . $this->getEventName());
        }

        return $event;
    }

    /**
     * @param string $eventName
     * @return $this
     */
    public function setEventName(string $eventName)
    {
        $this->config[IHasEvent::FIELD__EVENT_NAME] = $eventName;
        
        return $this;
    }
}
