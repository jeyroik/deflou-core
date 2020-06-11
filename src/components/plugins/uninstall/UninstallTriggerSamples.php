<?php
namespace deflou\components\plugins\uninstall;

use deflou\components\triggers\TriggerSample;
use extas\components\plugins\uninstall\UninstallSection;

/**
 * Class UninstallTriggerSamples
 *
 * @package deflou\components\plugins\uninstall
 * @author jeyroik@gmail.com
 */
class UninstallTriggerSamples extends UninstallSection
{
    protected string $selfName = 'trigger sample';
    protected string $selfSection = 'trigger_samples';
    protected string $selfUID = TriggerSample::FIELD__NAME;
    protected string $selfItemClass = TriggerSample::class;
    protected string $selfRepositoryClass = 'deflouTriggerSampleRepository';
}
