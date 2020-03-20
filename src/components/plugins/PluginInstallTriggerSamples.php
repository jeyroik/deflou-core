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
    protected string $selfName = 'trigger sample';
    protected string $selfSection = 'trigger_samples';
    protected string $selfUID = TriggerSample::FIELD__NAME;
    protected string $selfItemClass = TriggerSample::class;
    protected string $selfRepositoryClass = ITriggerSampleRepository::class;
}
