<?php
namespace deflou\components\plugins\install;

use deflou\components\triggers\TriggerSample;
use extas\components\plugins\install\InstallSection;

/**
 * Class InstallTriggerSamples
 *
 * @package deflou\components\plugins\install
 * @author jeyroik@gmail.com
 */
class InstallTriggerSamples extends InstallSection
{
    protected string $selfName = 'trigger sample';
    protected string $selfSection = 'trigger_samples';
    protected string $selfUID = TriggerSample::FIELD__NAME;
    protected string $selfItemClass = TriggerSample::class;
    protected string $selfRepositoryClass = 'deflouTriggerSampleRepository';
}
