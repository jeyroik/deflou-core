<?php
namespace deflou\interfaces\applications\activities;

use extas\interfaces\IHasClass;
use extas\interfaces\IHasType;
use extas\interfaces\players\IHasOwner;
use extas\interfaces\samples\ISample;

/**
 * Interface IActivitySample
 *
 * @package deflou\interfaces\applications\activities
 * @author jeyroik@gmail.com
 */
interface IActivitySample extends ISample, IHasOwner, IHasClass, IHasType
{
    public const FIELD__APPLICATION_NAME = 'app_name';

    /**
     * @return string
     */
    public function getAppName(): string;

    /**
     * @param string $appName
     * @return $this
     */
    public function setAppName(string $appName);
}
