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
    protected $selfRepositoryClass = IApplicationSampleRepository::class;
    protected $selfItemClass = ApplicationSample::class;
    protected $selfUID = ApplicationSample::FIELD__NAME;
    protected $selfSection = 'application_samples';
    protected $selfName = 'application sample';
}
