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
    protected $selfName = 'application activity sample';
    protected $selfSection = 'application_activity_samples';
    protected $selfUID = ActivitySample::FIELD__NAME;
    protected $selfItemClass = ActivitySample::class;
    protected $selfRepositoryClass = IActivitySampleRepository::class;
}
