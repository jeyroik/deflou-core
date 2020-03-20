<?php
namespace deflou\components\applications;

use deflou\interfaces\applications\IApplication;
use deflou\interfaces\applications\IApplicationRepository;
use deflou\interfaces\applications\IHasApplication;
use extas\components\SystemContainer;

/**
 * Trait THasApplication
 *
 * @property $config
 *
 * @package deflou\components\applications
 * @author jeyroik <jeyroik@gmail.com>
 */
trait THasApplication
{
    /**
     * @return string
     */
    public function getApplicationName(): string
    {
        return $this->config[IHasApplication::FIELD__APPLICATION_NAME] ?? '';
    }

    /**
     * @return IApplication|null
     */
    public function getApplication(): ?IApplication
    {
        /**
         * @var $repo IApplicationRepository
         */
        $repo = SystemContainer::getItem(IApplicationRepository::class);

        return $repo->one([IApplication::FIELD__NAME => $this->getApplicationName()]);
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setApplicationName(string $name)
    {
        $this->config[IHasApplication::FIELD__APPLICATION_NAME] = $name;

        return $this;
    }
}
