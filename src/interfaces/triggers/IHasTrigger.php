<?php
namespace deflou\interfaces\triggers;

/**
 * Interface IHasTrigger
 *
 * @package deflou\interfaces\triggers
 * @author jeyroik@gmail.com
 */
interface IHasTrigger
{
    public const FIELD__TRIGGER_ID = 'trigger_id';

    /**
     * @return string
     */
    public function getTriggerId(): string;

    /**
     * @return ITrigger|null
     */
    public function getTrigger(): ?ITrigger;

    /**
     * @param string $triggerId
     * @return $this
     */
    public function setTriggerId(string $triggerId);
}
