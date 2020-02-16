<?php
namespace deflou\interfaces\triggers;

use extas\interfaces\players\IHasOwner;
use extas\interfaces\samples\ISample;
use extas\interfaces\samples\parameters\ISampleParameter;

/**
 * Interface ITriggerSample
 *
 * @package deflou\interfaces\triggers
 * @author jeyroik@gmail.com
 */
interface ITriggerSample extends ISample, IHasOwner
{
    public const FIELD__EVENT_NAME = 'event_name';
    public const FIELD__EVENT_PARAMETERS = 'event_parameters';
    public const FIELD__ACTION_NAME = 'action_name';
    public const FIELD__ACTION_PARAMETERS = 'action_parameters';

    /**
     * @return string
     */
    public function getEventName(): string;

    /**
     * @return ISampleParameter[]
     */
    public function getEventParameters(): array;

    /**
     * @return array
     */
    public function getEventParametersOptions(): array;

    /**
     * @return string
     */
    public function getActionName(): string;

    /**
     * @return ISampleParameter[]
     */
    public function getActionParameters(): array;

    /**
     * @return array
     */
    public function getActionParametersOptions(): array;

    /**
     * @param string $name
     * @return $this
     */
    public function setEventName(string $name);

    /**
     * @param ISampleParameter[] $parameters
     * @return $this
     */
    public function setEventParameters(array $parameters);

    /**
     * @param array $parametersOptions
     * @return $this
     */
    public function setEventParametersOptions(array $parametersOptions);

    /**
     * @param string $name
     * @return $this
     */
    public function setActionName(string $name);

    /**
     * @param ISampleParameter[] $parameters
     * @return $this
     */
    public function setActionParameters(array $parameters);

    /**
     * @param array $parametersOptions
     * @return $this
     */
    public function setActionParametersOptions(array $parametersOptions);
}
