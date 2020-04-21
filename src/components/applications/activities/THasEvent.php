<?php
namespace deflou\components\applications\activities;

use deflou\interfaces\applications\activities\IActivity;
use deflou\interfaces\applications\activities\IActivityRepository;
use deflou\interfaces\applications\activities\IHasEvent;
use extas\components\SystemContainer;

/**
 * Trait THasEvent
 * 
 * @property $config
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
     * @throws \Exception
     */
    public function getEvent(bool $required = false): ?IActivity
    {
        /**
         * @var $repo IActivityRepository
         */
        $repo = SystemContainer::getItem(IActivityRepository::class);
        
        $event = $repo->one([
            IActivity::FIELD__NAME => $this->getEventName(),
            IActivity::FIELD__TYPE => IActivity::TYPE__EVENT
        ]);

        if ($required and !$event) {
            throw new \Exception('Missed event "' . $this->getEventName() . '"');
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
