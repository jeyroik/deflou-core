<?php
namespace deflou\components\applications\activities;

use deflou\interfaces\applications\activities\IActivity;
use deflou\interfaces\applications\activities\IHasAction;
use extas\components\exceptions\MissedOrUnknown;
use extas\interfaces\repositories\IRepository;

/**
 * Trait THasAction
 *
 * @property $config
 * @method IRepository deflouActivityRepository()
 *
 * @package deflou\components\applications\activities
 * @author jeyroik@gmail.com
 */
trait THasAction
{
    /**
     * @return string
     */
    public function getActionName(): string
    {
        return $this->config[IHasAction::FIELD__ACTION_NAME] ?? '';
    }

    /**
     * @param bool $required if action is required and missed, than throw an exception
     * @return IActivity|null
     * @throws MissedOrUnknown
     */
    public function getAction(bool $required = false): ?IActivity
    {
        $action = $this->deflouActivityRepository()->one([
            IActivity::FIELD__NAME => $this->getActionName(),
            IActivity::FIELD__TYPE => IActivity::TYPE__ACTION
        ]);

        if ($required and !$action) {
            throw new MissedOrUnknown('action ' . $this->getActionName());
        }

        return $action;
    }

    /**
     * @param string $actionName
     * @return $this
     */
    public function setActionName(string $actionName)
    {
        $this->config[IHasAction::FIELD__ACTION_NAME] = $actionName;

        return $this;
    }
}
