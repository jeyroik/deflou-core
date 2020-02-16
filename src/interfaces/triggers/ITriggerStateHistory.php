<?php
namespace deflou\interfaces\triggers;

use extas\interfaces\IHasCreatedAt;
use extas\interfaces\IItem;
use extas\interfaces\players\IHasOwner;

/**
 * Interface ITriggerStateHistory
 *
 * @package deflou\interfaces\triggers
 * @author jeyroik@gmail.com
 */
interface ITriggerStateHistory extends IItem, IHasCreatedAt, IHasOwner, IHasTrigger
{
    public const SUBJECT = 'deflou.trigger.state.history';

    public const FIELD__STATE_FROM = 'state_from';
    public const FIELD__STATE_TO = 'state_to';

    /**
     * @return string
     */
    public function getStateFrom(): string;

    /**
     * @return string
     */
    public function getStateTo(): string;

    /**
     * @param string $state
     * @return $this
     */
    public function setStateFrom(string $state);

    /**
     * @param string $state
     * @return $this
     */
    public function setStateTo(string $state);
}
