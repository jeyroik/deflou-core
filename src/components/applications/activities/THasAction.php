<?php
namespace deflou\components\applications\activities;

use deflou\interfaces\applications\activities\IActivity;
use deflou\interfaces\applications\activities\IActivityRepository;
use deflou\interfaces\applications\activities\IHasAction;
use extas\components\SystemContainer;

/**
 * Trait THasAction
 *
 * @property $config
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
     * @throws \Exception
     */
    public function getAction(bool $required = false): ?IActivity
    {
        /**
         * @var $repo IActivityRepository
         */
        $repo = SystemContainer::getItem(IActivityRepository::class);

        $action = $repo->one([
            IActivity::FIELD__NAME => $this->getActionName(),
            IActivity::FIELD__TYPE => IActivity::TYPE__ACTION
        ]);

        if ($required and !$action) {
            throw new \Exception('Missed action "' . $this->getActionName() . '"');
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
