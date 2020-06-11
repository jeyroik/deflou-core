<?php
namespace deflou\components\triggers;

use deflou\components\applications\activities\THasAction;
use deflou\components\applications\activities\THasEvent;
use deflou\interfaces\applications\activities\IActivitySample;
use deflou\interfaces\applications\IApplication;
use deflou\interfaces\applications\IApplicationSample;
use deflou\interfaces\triggers\ITriggerResponse;
use extas\components\Item;
use extas\components\players\THasPlayer;
use extas\components\THasCreatedAt;
use extas\components\THasId;

/**
 * Class TriggerResponse
 *
 * @method activityRepository()
 * @method applicationRepository()
 * @method activitySampleRepository()
 * @method applicationSampleRepository()
 *
 * @package deflou\components\triggers
 * @author jeyroik@gmail.com
 */
class TriggerResponse extends Item implements ITriggerResponse
{
    use THasCreatedAt;
    use THasPlayer;
    use THasId;
    use THasTrigger;
    use THasAction;
    use THasEvent;

    /**
     * @return string
     */
    public function getEventSampleName(): string
    {
        return $this->config[static::FIELD__EVENT_SAMPLE_NAME] ?? '';
    }

    /**
     * @return IActivitySample|null
     */
    public function getEventSample(): ?IActivitySample
    {
        return $this->activitySampleRepository()->one([IActivitySample::FIELD__NAME => $this->getEventSampleName()]);
    }

    /**
     * @return string
     */
    public function getEventApplicationName(): string
    {
        return $this->config[static::FIELD__EVENT_APPLICATION_NAME] ?? '';
    }

    /**
     * @return IApplication|null
     */
    public function getEventApplication(): ?IApplication
    {
        return $this->applicationRepository()->one([IApplication::FIELD__NAME => $this->getEventApplicationName()]);
    }

    /**
     * @return string
     */
    public function getEventApplicationSampleName(): string
    {
        return $this->config[static::FIELD__EVENT_APPLICATION_SAMPLE_NAME] ?? '';
    }

    /**
     * @return IApplicationSample|null
     */
    public function getEventApplicationSample(): ?IApplicationSample
    {
        return $this->applicationSampleRepository()->one([
            IApplicationSample::FIELD__NAME => $this->getEventApplicationSampleName()
        ]);
    }

    /**
     * @param string $sampleName
     * @return ITriggerResponse
     */
    public function setEventSampleName(string $sampleName): ITriggerResponse
    {
        $this->config[static::FIELD__EVENT_SAMPLE_NAME] = $sampleName;

        return $this;
    }

    /**
     * @param string $applicationName
     * @return ITriggerResponse
     */
    public function setEventApplicationName(string $applicationName): ITriggerResponse
    {
        $this->config[static::FIELD__EVENT_APPLICATION_NAME] = $applicationName;

        return $this;
    }

    /**
     * @param string $applicationSample
     * @return ITriggerResponse
     */
    public function setEventApplicationSampleName(string $applicationSample): ITriggerResponse
    {
        $this->config[static::FIELD__EVENT_APPLICATION_SAMPLE_NAME] = $applicationSample;

        return $this;
    }

    /**
     * @return string
     */
    public function getActionSampleName(): string
    {
        return $this->config[static::FIELD__ACTION_SAMPLE_NAME] ?? '';
    }

    /**
     * @return IActivitySample|null
     */
    public function getActionSample(): ?IActivitySample
    {
        return $this->activitySampleRepository()->one([
            IApplicationSample::FIELD__NAME => $this->getActionSampleName()
        ]);
    }

    /**
     * @return string
     */
    public function getActionApplicationName(): string
    {
        return $this->config[static::FIELD__ACTION_APPLICATION_NAME] ?? '';
    }

    /**
     * @return IApplication|null
     */
    public function getActionApplication(): ?IApplication
    {
        return $this->applicationRepository()->one([IApplication::FIELD__NAME => $this->getActionApplicationName()]);
    }

    /**
     * @return string
     */
    public function getActionApplicationSampleName(): string
    {
        return $this->config[static::FIELD__ACTION_APPLICATION_SAMPLE_NAME] ?? '';
    }

    /**
     * @return IApplicationSample|null
     */
    public function getActionApplicationSample(): ?IApplicationSample
    {
        return $this->applicationSampleRepository()->one([
            IApplicationSample::FIELD__NAME => $this->getActionApplicationSampleName()
        ]);
    }

    /**
     * @param string $sampleName
     * @return ITriggerResponse
     */
    public function setActionSampleName(string $sampleName): ITriggerResponse
    {
        $this->config[static::FIELD__ACTION_SAMPLE_NAME]  = $sampleName;

        return $this;
    }

    /**
     * @param string $applicationName
     * @return ITriggerResponse
     */
    public function setActionApplicationName(string $applicationName): ITriggerResponse
    {
        $this->config[static::FIELD__ACTION_APPLICATION_NAME] = $applicationName;

        return $this;
    }

    /**
     * @param string $applicationSampleName
     * @return ITriggerResponse
     */
    public function setActionApplicationSampleName(string $applicationSampleName): ITriggerResponse
    {
        $this->config[static::FIELD__ACTION_APPLICATION_SAMPLE_NAME] = $applicationSampleName;

        return $this;
    }

    /**
     * @return string
     */
    public function getResponseBody(): string
    {
        return $this->config[static::FIELD__RESPONSE_BODY] ?? '';
    }

    /**
     * @return int
     */
    public function getResponseStatus(): int
    {
        return $this->config[static::FIELD__RESPONSE_STATUS] ?? 0;
    }

    /**
     * @param string $responseBody
     * @return ITriggerResponse
     */
    public function setResponseBody(string $responseBody): ITriggerResponse
    {
        $this->config[static::FIELD__RESPONSE_BODY] = $responseBody;

        return $this;
    }

    /**
     * @param int $status
     * @return ITriggerResponse
     */
    public function setResponseStatus(int $status): ITriggerResponse
    {
        $this->config[static::FIELD__RESPONSE_STATUS] = $status;
        $this->config[static::FIELD__IS_SUCCESS] = $status == static::STATUS__SUCCESS;

        return $this;
    }

    /**
     * @return bool
     */
    public function isSuccess(): bool
    {
        return $this->config[static::FIELD__IS_SUCCESS] ?? false;
    }

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
