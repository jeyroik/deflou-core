<?php
namespace deflou\interfaces\applications\activities;

use deflou\interfaces\applications\IApplication;
use extas\interfaces\samples\IHasSample;

/**
 * Interface IActivity
 *
 * @package deflou\interfaces\applications\activities
 * @author jeyroik@gmail.com
 */
interface IActivity extends IActivitySample, IHasSample
{
    public const TYPE__EVENT = 'event';
    public const TYPE__ACTION = 'action';
    public const FIELD__APPLICATION_NAME = 'application_name';

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
