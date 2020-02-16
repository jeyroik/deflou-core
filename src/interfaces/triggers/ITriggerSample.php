<?php
namespace deflou\interfaces\triggers;

use deflou\interfaces\applications\activities\IHasAction;
use deflou\interfaces\applications\activities\IHasEvent;
use extas\interfaces\players\IHasOwner;
use extas\interfaces\samples\ISample;
use extas\interfaces\samples\parameters\ISampleParameter;

/**
 * Interface ITriggerSample
 *
 * @package deflou\interfaces\triggers
 * @author jeyroik@gmail.com
 */
interface ITriggerSample extends ISample, IHasOwner, IHasEvent, IHasAction
{
    public const FIELD__EVENT_PARAMETERS = 'event_parameters';
    public const FIELD__ACTION_PARAMETERS = 'action_parameters';

    /**
     * @return ISampleParameter[]
     */
    public function getEventParameters(): array;

    /**
     * @return array
     */
    public function getEventParametersOptions(): array;

    /**
     * @return ISampleParameter[]
     */
    public function getActionParameters(): array;

    /**
     * @return array
     */
    public function getActionParametersOptions(): array;

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
