<?php
namespace deflou\components\plugins;

use deflou\components\triggers\TriggerSample;
use deflou\interfaces\triggers\ITriggerSampleRepository;
use extas\components\plugins\PluginInstallDefault;

/**
 * Class PluginInstallTriggerSamples
 *
 * @package deflou\components\plugins
 * @author jeyroik@gmail.com
 */
class PluginInstallTriggerSamples extends PluginInstallDefault
{
    protected $selfName = 'trigger sample';
    protected $selfSection = 'trigger_samples';
    protected $selfUID = TriggerSample::FIELD__NAME;
    protected $selfItemClass = TriggerSample::class;
    protected $selfRepositoryClass = ITriggerSampleRepository::class;
}
