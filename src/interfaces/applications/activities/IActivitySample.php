<?php
namespace deflou\interfaces\applications\activities;

use deflou\interfaces\applications\IApplication;
use extas\interfaces\IHasClass;
use extas\interfaces\IHasType;
use extas\interfaces\players\IHasPlayer;
use extas\interfaces\samples\ISample;

/**
 * Interface IActivitySample
 *
 * @package deflou\interfaces\applications\activities
 * @author jeyroik@gmail.com
 */
interface IActivitySample extends ISample, IHasPlayer, IHasClass, IHasType
{
    public const FIELD__APPLICATION_NAME = 'app_name';

    /**
     * @return string
     */
    public function getApplicationName(): string;

    /**
     * @return IApplication|null
     */
    public function getApplication(): ?IApplication;

    /**
     * @param string $appName
     * @return $this
     */
    public function setApplicationName(string $appName);
}
