<?php
namespace deflou\interfaces\applications\activities;

/**
 * Interface IHasEvent
 * 
 * @package deflou\interfaces\applications\activities
 * @author jeyroik@gmail.com
 */
interface IHasEvent
{
    public const FIELD__EVENT_NAME = 'event_name';

    /**
     * @return string
     */
    public function getEventName(): string;

    /**
     * @param bool $required if event is required and missed, than an exception is thrown
     * @return IActivity|null
     * @throws \Exception
     */
    public function getEvent(bool $required = false): ?IActivity;

    /**
     * @param string $eventName
     * @return $this
     */
    public function setEventName(string $eventName);
}
