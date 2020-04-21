<?php
namespace deflou\interfaces\applications\activities;

/**
 * Interface IHasAction
 *
 * @package deflou\interfaces\applications\activities
 * @author jeyroik@gmail.com
 */
interface IHasAction
{
    public const FIELD__ACTION_NAME = 'action_name';

    /**
     * @return string
     */
    public function getActionName(): string;

    /**
     * @param bool $required if action is required and missed, than throw an exception
     * @return IActivity|null
     * @throws \Exception
     */
    public function getAction(bool $required = false): ?IActivity;

    /**
     * @param string $actionName
     * @return $this
     */
    public function setActionName(string $actionName);
}
