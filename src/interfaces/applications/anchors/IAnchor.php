<?php
namespace deflou\interfaces\applications\anchors;

use deflou\interfaces\applications\activities\IActivity;
use extas\interfaces\IHasCreatedAt;
use extas\interfaces\IHasType;
use extas\interfaces\IItem;

/**
 * Interface IAnchor
 *
 * Default types: general, player, trigger
 *
 * @package deflou\interfaces\applications\anchors
 * @author jeyroik@gmail.com
 */
interface IAnchor extends IItem, IHasType, IHasCreatedAt
{
    public const SUBJECT = 'deflou.app.anchor';

    public const FIELD__EVENT_NAME = 'event_name';
    public const FIELD__CALLS_NUMBER = 'calls_number';
    public const FIELD__LAST_CALL_TIME = 'last_call_time';

    /**
     * @return string
     */
    public function getEventName(): string;

    /**
     * @return IActivity|null
     */
    public function getEvent(): ?IActivity;

    /**
     * @return int
     */
    public function getCallsNumber(): int;

    /**
     * @return int
     */
    public function getLastCallTime(): int;

    /**
     * @param string $eventName
     * @return IAnchor
     */
    public function setEventName(string $eventName): IAnchor;

    /**
     * @param int $callsNumber
     * @return IAnchor
     */
    public function setCallsNumber(int $callsNumber): IAnchor;

    /**
     * @return IAnchor
     */
    public function incCallsNumber(): IAnchor;

    /**
     * @param int $lastCallTime
     * @return IAnchor
     */
    public function setLastCallTime(int $lastCallTime): IAnchor;
}
