<?php
namespace deflou\components\applications\activities;

use deflou\interfaces\applications\activities\IActivitySample;
use deflou\interfaces\applications\IApplication;
use deflou\interfaces\applications\IApplicationRepository;
use extas\components\players\THasOwner;
use extas\components\players\THasPlayer;
use extas\components\samples\Sample;
use extas\components\SystemContainer;
use extas\components\THasClass;
use extas\components\THasType;
use extas\interfaces\repositories\IRepository;

/**
 * Class ActivitySample
 *
 * @package deflou\components\applications\activities
 * @author jeyroik@gmail.com
 */
class ActivitySample extends Sample implements IActivitySample
{
    use THasPlayer;
    use THasType;
    use THasClass;

    /**
     * @return string
     */
    public function getApplicationName(): string
    {
        return $this->config[static::FIELD__APPLICATION_NAME] ?? '';
    }

    /**
     * @return IApplication|null
     */
    public function getApplication(): ?IApplication
    {
        /**
         * @var IRepository $repo
         */
        $repo = SystemContainer::getItem(IApplicationRepository::class);
        return $repo->one([IApplication::FIELD__NAME => $this->getApplicationName()]);
    }

    /**
     * @param string $appName
     * @return $this
     */
    public function setApplicationName(string $appName)
    {
        $this->config[static::FIELD__APPLICATION_NAME] = $appName;

        return $this;
    }
}
