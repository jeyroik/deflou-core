<?php
namespace deflou\interfaces\triggers;

use deflou\interfaces\applications\activities\IActivity;
use deflou\interfaces\applications\activities\IActivitySample;
use deflou\interfaces\applications\activities\IHasAction;
use deflou\interfaces\applications\activities\IHasEvent;
use deflou\interfaces\applications\IApplication;
use deflou\interfaces\applications\IApplicationSample;

use extas\interfaces\IHasCreatedAt;
use extas\interfaces\IHasId;
use extas\interfaces\players\IHasPlayer;
use extas\interfaces\players\IPlayer;
use extas\interfaces\IItem;

/**
 * Interface ITriggerLog
 *
 * @package df\interfaces\triggers
 * @author aivanov@fix.ru
 */
interface ITriggerResponse extends IItem, IHasCreatedAt, IHasId, IHasTrigger, IHasAction, IHasEvent, IHasPlayer
{
    public const SUBJECT = 'df.trigger.response';

    public const FIELD__EVENT_APPLICATION_NAME = 'event_application_name';
    public const FIELD__EVENT_APPLICATION_SAMPLE_NAME = 'event_application_sample_name';
    public const FIELD__EVENT_SAMPLE_NAME = 'event_sample_name';
    public const FIELD__ACTION_APPLICATION_NAME = 'action_application_name';
    public const FIELD__ACTION_APPLICATION_SAMPLE_NAME = 'action_application_sample_name';
    public const FIELD__ACTION_SAMPLE_NAME = 'action_sample_name';
    public const FIELD__IS_SUCCESS = 'is_success';
    public const FIELD__RESPONSE_STATUS = 'response_status';
    public const FIELD__RESPONSE_BODY = 'response_body';

    /**
     * @return string
     */
    public function getEventApplicationName(): string;

    /**
     * @param string $applicationName
     *
     * @return $this
     */
    public function setEventApplicationName(string $applicationName): ITriggerResponse;

    /**
     * @return null|IApplication
     */
    public function getEventApplication(): ?IApplication;

    /**
     * @return string
     */
    public function getEventApplicationSampleName(): string;

    /**
     * @param string $applicationSample
     *
     * @return $this
     */
    public function setEventApplicationSampleName(string $applicationSample): ITriggerResponse;

    /**
     * @return IApplicationSample|null
     */
    public function getEventApplicationSample(): ?IApplicationSample;

    /**
     * @return string
     */
    public function getEventSampleName(): string;

    /**
     * @param string $sampleName
     *
     * @return $this
     */
    public function setEventSampleName(string $sampleName): ITriggerResponse;

    /**
     * @return IActivitySample|null
     */
    public function getEventSample(): ?IActivitySample;

    /**
     * @return string
     */
    public function getActionApplicationName(): string;

    /**
     * @param string $applicationName
     *
     * @return $this
     */
    public function setActionApplicationName(string $applicationName): ITriggerResponse;

    /**
     * @return null|IApplication
     */
    public function getActionApplication(): ?IApplication;

    /**
     * @return string
     */
    public function getActionApplicationSampleName(): string;

    /**
     * @param string $applicationSampleName
     *
     * @return $this
     */
    public function setActionApplicationSampleName(string $applicationSampleName): ITriggerResponse;

    /**
     * @return null|IApplicationSample
     */
    public function getActionApplicationSample(): ?IApplicationSample;

    /**
     * @return string
     */
    public function getActionSampleName(): string;

    /**
     * @param string $sampleName
     *
     * @return $this
     */
    public function setActionSampleName(string $sampleName): ITriggerResponse;

    /**
     * @return IActivitySample|null
     */
    public function getActionSample(): ?IActivitySample;

    /**
     * @return string
     */
    public function getPlayerName(): string;

    /**
     * @param string $playerName
     *
     * @return $this
     */
    public function setPlayerName(string $playerName): ITriggerResponse;

    /**
     * @return null|IPlayer
     */
    public function getPlayer(): ?IPlayer;

    /**
     * @return int
     */
    public function getResponseStatus(): int;

    /**
     * @param int $status
     *
     * @return $this
     */
    public function setResponseStatus(int $status): ITriggerResponse;

    /**
     * @return string
     */
    public function getResponseBody(): string;

    /**
     * @param string $responseBody
     *
     * @return $this
     */
    public function setResponseBody(string $responseBody): ITriggerResponse;
}
