<?php
namespace deflou\components\plugins;

use deflou\components\applications\ApplicationSample;
use deflou\interfaces\applications\IApplicationSampleRepository;
use extas\components\plugins\PluginInstallDefault;

/**
 * Class PluginInstallApplicationSamples
 * 
 * @package deflou\components\plugins
 * @author jeyroik@gmail.com
 */
class PluginInstallApplicationSamples extends PluginInstallDefault
{
    protected string $selfRepositoryClass = IApplicationSampleRepository::class;
    protected string $selfItemClass = ApplicationSample::class;
    protected string $selfUID = ApplicationSample::FIELD__NAME;
    protected string $selfSection = 'application_samples';
    protected string $selfName = 'application sample';
}
