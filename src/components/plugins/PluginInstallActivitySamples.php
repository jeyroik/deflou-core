<?php
namespace deflou\components\plugins;

use deflou\components\applications\activities\ActivitySample;
use deflou\interfaces\applications\activities\IActivitySampleRepository;
use extas\components\plugins\PluginInstallDefault;

/**
 * Class PluginInstallActivitySamples
 *
 * @package deflou\components\plugins
 * @author jeyroik@gmail.com
 */
class PluginInstallActivitySamples extends PluginInstallDefault
{
    protected string $selfName = 'application activity sample';
    protected string $selfSection = 'application_activity_samples';
    protected string $selfUID = ActivitySample::FIELD__NAME;
    protected string $selfItemClass = ActivitySample::class;
    protected string $selfRepositoryClass = IActivitySampleRepository::class;
}
